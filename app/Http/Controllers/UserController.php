<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Models\InvoiceItem;
use App\Models\DocumentReview;
use App\Models\Document;
use App\Models\Download;
use App\Models\Invoice;
use App\Models\Lawyer;
use App\Models\Event;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;

class UserController extends Controller
{
    //
    public function index()
    {
    	return view('index')->with([
    		'documents' => Document::leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
    						->select([
    							'categories.name as category',
    							'documents.unique_id as unique_id',
    							'documents.name as name',
    							'documents.access_type as access_type',
    							'documents.previous_price as previous_price',
    							'documents.current_price as current_price',
    							'documents.format as format',
    							'documents.description as description',
    							'documents.thumbnail as thumbnail'
    						])
    						->orderBy("documents.id", "desc")
    						->limit(20)
    						->get(),
    		'events' => Event::orderBy("id", "desc")->get()
    	]);
    }

    //
    public function auth()
    {
    	return view('auth');
    }

    //
    public function login(Request $request)
    {

        try{
            $user = User::where("email", $request->email)->first();

            if(!$user){
                $body = 'email or username does not exist';
                toast('error', $body);
                return redirect()->back()->withInput();
            }

            if(!\Hash::check($request->password, $user->password)){
                $body = 'Incorrect password, please try again';
                toast('error', $body);
                return redirect()->back()->withInput();
            }

            \Auth::guard('web')->login($user);

            toast("success", "signin successful");
            return redirect()->route($request->route ?? 'index');
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:repeat_password'
        ]);

        try{
            $user = User::create([
                'unique_id' => generate_random_numbers(10),
                'tenant_id' => 3,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if($request->route){
            	\Auth::guard('web')->login($user);
	            toast("success", "account created successfully");
	            return redirect()->route($request->route);
            }

            toast("success", "account created successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function logout()
    {
        \Auth::guard('web')->logout();
        return redirect()->route('auth');
    }
    //
    public function resource_center()
    {
        return view('resource_center')->with([
            'documents' => Document::leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
                            ->select([
                                'categories.name as category',
                                'documents.unique_id as unique_id',
                                'documents.name as name',
                                'documents.access_type as access_type',
                                'documents.previous_price as previous_price',
                                'documents.current_price as current_price',
                                'documents.format as format',
                                'documents.description as description',
                                'documents.thumbnail as thumbnail'
                            ])
                            ->orderBy("documents.id", "desc")
                            ->limit(10)
                            ->get(),
            'events' => Event::orderBy("id", "desc")->get()
        ]);
    }

    //
    public function store(Request $request)
    {
    	return view('store')->with([
    		'items' => Document::leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
    						->select([
    							'categories.name as category',
    							'documents.unique_id as unique_id',
    							'documents.name as name',
    							'documents.access_type as access_type',
    							'documents.previous_price as previous_price',
    							'documents.current_price as current_price',
    							'documents.format as format',
    							'documents.description as description',
    							'documents.thumbnail as thumbnail'
    						])
    						->where("categories.name", "like", "%" . $request->search . "%")
    						->orWhere("categories.unique_id", "like", "%" . $request->search . "%")
                            ->orWhere("documents.name", "like", "%" . $request->search . "%")
    						->orWhere("documents.tags", "like", "%" . $request->search . "%")
    						->orderBy("documents.id", "desc")
    						->paginate(20)
    	]);
    }

    //
    public function store_details(Request $request)
    {
		$item = Document::leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
						->select([
							'categories.name as category',
							'documents.unique_id as unique_id',
							'documents.name as name',
							'documents.access_type as access_type',
							'documents.previous_price as previous_price',
							'documents.current_price as current_price',
							'documents.format as format',
                            'documents.description as description',
							'documents.tags as tags',
							'documents.thumbnail as thumbnail'
						])
						->where("documents.unique_id", $request->unique_id)
						->first();
		if(!$item){
			toast("error", "item not found");
			return redirect()->back();
		}

        $reviews = DocumentReview::where("document_id", $request->unique_id)->get();
        $item_reviews = count($reviews);
        $item_total_ratings = $reviews->sum("rating");

    	return view('store_details')->with([
    		'item' => $item,
            'item_reviews' => $item_reviews,
            'item_ratings' => $item_reviews < 1 ? 0 : floor($item_total_ratings / $item_reviews)
    	]);
    }

    //
    public function store_item_review(Request $request)
    {
        try{
            //check if the user has bought the book
            $bought = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                            ->where("invoices.is_paid", "!=", NULL)
                            ->where("invoice_items.document_id", $request->document_id)
                            ->where("invoice_items.user_id", user()->unique_id)
                            ->orderBy("invoice_items.id", "desc")
                            ->first();
            if(!$bought){
                toast("error", "sorry, you cannot comment on item you have not bought");
                return redirect()->back();
            }

            $previous = DocumentReview::where("user_id", user()->unique_id)->where("document_id", $request->document_id)->first();

            if($previous){
                $previous->update([
                    'rating' => $request->rating ?? $previous->rating,
                    'comment' => $request->comment ?? $previous->comment,
                ]);
                
                toast("success", "review recorded successfully");
                return redirect()->back();
            }

            DocumentReview::create([
                'unique_id' => generate_random_numbers(10),
                'user_id' => user()->unique_id,
                'document_id' => $request->document_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);

            toast("success", "review recorded successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back();
        }
    }

    //
    public function cart()
    {
        return view('cart');
    }

    //
    public function checkout()
    {
    	return view('checkout');
    }

    //
    public function report_sale(Request $request)
    {
    	try{
    		//add invoice
    		$invoice = Invoice::create([
    			'unique_id' => generate_random_numbers(10),
    			'user_id' => user()->unique_id,
    			'reference' => $request->reference,
                'amount' => $request->amount,
    			'is_paid' => $request->amount == 0 ? 'yes' : NULL,
    		]);

    		for($i = 0; $i < count($request->cart); $i++){
	    		//add item invoices
	    		InvoiceItem::create([
	    			'unique_id' => generate_random_numbers(10),
	    			'user_id' => user()->unique_id,
	    			'invoice_id' => $invoice->unique_id,
                    'item_price' => $request->cart[$i]['price'],
                    'document_id' => $request->cart[$i]['unique_id'],
	    		]);
    		}

    		//update user
    		user()->update([
    			'name' => $request->name ?? user()->name,
    			'phone' => $request->phone ?? user()->phone,
    			'address' => $request->address ?? user()->address
    		]);

    		return response()->json([
    			'type' => 'success',
    			'message' => 'purchase details submitted successfully, once your payment is confirmed, you will receive download links to the documents you purchased',
    		]);

    	}
    	catch(\Throwable $e){
    		return response()->json([
    			'type' => 'error',
    			'message' => $e->getMessage()
    		]);
    	}
    }

    //
    public function legal_event(Request $request)
    {
    	return view('legal_event')->with([
    		'events' => Event::orderBy("id", "desc")->paginate(9),
    	]);
    }

    //
    public function legal_event_details(Request $request)
    {
		$event = Event::where("unique_id", $request->unique_id)->first();

		if(!$event){
			toast("error", "event not found");
			return redirect()->back();
		}

    	return view('legal_event_details')->with([
    		'event' => $event
    	]);
    }

    //
    public function legal_event_register(Request $request)
    {
    	try{
			$event = Event::where("unique_id", $request->unique_id)->first();

			if(!$event){
				return response()->json([
					'type' => 'error',
					'message' => 'event not found'
				]);
			}

			$previous = EventRegistration::where("reference", $request->reference)
							->orWhere([
                                ["user_id", "=", user()->unique_id],
								["is_paid", "!=", NULL],
								["event_id", "=", $event->unique_id]
							])->first();

			if($previous){
				return response()->json([
					'type' => 'info',
					'message' => 'you have already submitted registration for this event'
				]);
			}

			EventRegistration::create([
    			'unique_id' => generate_random_numbers(10),
    			'user_id' => user()->unique_id,
                'event_id' => $event->unique_id,
    			'price' => $event->price,
    			'reference' => $request->reference ?? $event->unique_id,
    			'is_paid' => $event->access_type == 'Free' ? 'yes' : NULL,
			]);

			return response()->json([
				'type' => 'success',
				'message' => 'event registration submitted successfully'
			]);
    	}
    	catch(\Throwable $e){
			return response()->json([
				'type' => 'error',
				'message' => $e->getMessage()
			]);
    	}
    }

    //
    public function account()
    {
    	return view('account');
    }

    //
    public function account_update(Request $request)
    {
    	$request->validate([
    		'password' => 'same:repeat_password'
    	]);

    	try{
    		//update user
    		user()->update([
    			'name' => $request->name ?? user()->name,
    			'phone' => $request->phone ?? user()->phone,
    			'address' => $request->address ?? user()->address,
    			'password' => $request->password ? bcrypt($request->password) : user()->password
    		]);

    		toast("success", "account updated successfully");
    		return redirect()->back();

    	}
    	catch(\Throwable $e){
    		return response()->json([
    			'type' => 'error',
    			'message' => $e->getMessage()
    		]);
    	}
    }

    //
    public function get_items(Request $request)
    {
    	try{
    		//add invoice
    		$items = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
    					->leftJoin("documents", "documents.unique_id", "=", "invoice_items.document_id")
    					->leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
    					->select([
    						'categories.name as category',
    						'documents.name as name',
    						'invoices.is_paid as is_paid',
    						'invoice_items.unique_id as unique_id',
    						'invoice_items.download_count as download_count',
    						'invoice_items.created_at as created_at',
    					])
    					->orderBy("invoice_items.id", "desc")
    					->where("invoice_items.user_id", user()->unique_id)
    					->paginate(10);

    		return response()->json([
    			'type' => 'success',
    			'message' => 'operation successful',
    			'items' => $items
    		]);

    	}
    	catch(\Throwable $e){
    		return response()->json([
    			'type' => 'error',
    			'message' => $e->getMessage(),
    			'items' => NULL
    		]);
    	}
    }

    //
    public function get_events(Request $request)
    {
    	try{
    		//events
    		$events = EventRegistration::leftJoin("events", "events.unique_id", "=", "event_registrations.event_id")
    					->select([
    						'events.title as title',
    						'events.start_date as start_date',
    						'events.end_date as end_date',
    						'event_registrations.unique_id as unique_id',
    						'event_registrations.is_paid as is_paid',
    					])
    					->orderBy("event_registrations.id", "desc")
    					->where("event_registrations.user_id", user()->unique_id)
    					->paginate(10);

    		return response()->json([
    			'type' => 'success',
    			'message' => 'operation successful',
    			'events' => $events
    		]);

    	}
    	catch(\Throwable $e){
    		return response()->json([
    			'type' => 'error',
    			'message' => $e->getMessage(),
    			'events' => NULL
    		]);
    	}
    }

    //
    public function download_item(Request $request)
    {
    	try{
    		//add invoice
    		$item = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
    					->leftJoin("documents", "documents.unique_id", "=", "invoice_items.document_id")
    					->leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
    					->select([
    						'categories.name as category',
    						'documents.name as name',
                            'documents.content as content',
    						'documents.access_type as access_type',
    						'documents.maximum_download_count as maximum_download_count',
    						'invoices.is_paid as is_paid',
    						'invoice_items.unique_id as unique_id',
    						'invoice_items.download_count as download_count',
    						'invoice_items.created_at as created_at',
    					])
    					->where("invoice_items.unique_id", $request->unique_id)
    					->where("invoice_items.user_id", user()->unique_id)
    					->first();

    		if(!$item){
	            toast("error", "item not found");
	            return redirect()->back();
    		}

    		if(!$item->is_paid && $item->access_type == "Paid"){
	            toast("error", "payment has not been confirmed for this item, please excercise patient");
	            return redirect()->back();
    		}

    		if($item->maximum_download_count <= $item->download_count){
	            toast("error", "you have exhausted the download limit for this item, please make another purchase to download");
	            return redirect()->back();
    		}
            
            $real_path = public_path('storage/'.$item->content);
            
            if($real_path)
            {
                Download::create([
                    'unique_id' => generate_random_numbers(10),
                    'user_id' => user()->unique_id,
                    'invoice_items_id' => $item->unique_id,
                ]);

                $item_uploaded = InvoiceItem::where("unique_id", $request->unique_id)->first();

                $item_uploaded->update([
                	'download_count' => $item->download_count + 1
                ]);

                toast("success", "Item downloaded successfully");
                return response()->download($real_path, str_replace(" ", "", $item->name) . '.' . explode('.', $item->content)[1]);
            }
            
            toast("error", "item not found");
            return redirect()->back();
    	}
    	catch(\Throwable $e){
    		toast("error", $e->getMessage());
    		return redirect()->back();
    	}
    }

    //
    public function contact()
    {
    	return view('contact');
    }

    //
    public function find_lawyer(Request $request)
    {
    	return view('find_lawyer')->with([
    		'lawyers' => Lawyer::orderBy("id", "desc")
    							->where("name", "like", "%" . $request->search . "%")
    							->orWhere("practice_city", "like", "%" . $request->search . "%")
    							->orWhere("practice_state", "like", "%" . $request->search . "%")
    							->paginate(12),
    	]);
    }

    //
    public function find_lawyer_details(Request $request)
    {
		$lawyer = Lawyer::where("unique_id", $request->unique_id)->first();

		if(!$lawyer){
			toast("error", "lawyer not found");
			return redirect()->back();
		}

    	return view('find_lawyer_details')->with([
    		'lawyer' => $lawyer
    	]);
    }
     
    //
    public function blog(Request $request)
    {
        return view('blog')->with([
            'search' => $request->search,
            'blogs' => Blog::where("title", "like", "%" . $request->search . "%")->orderBy("id", "desc")->paginate(10),
            'recent_blogs' => Blog::orderBy("id", "desc")->limit(10)->get()
        ]);
    }
     
    //
    public function blog_details(Request $request)
    {
        $blog = Blog::where("url", $request->url)->first();

        if(!$blog){
            $body = 'Blog not found';
            toast('error', $body);
            return redirect()->back();
        }

        return view('blog_details')->with([
            'blog' => $blog,
            'comment_count' => count(Comment::where("blog_id", $blog->unique_id)->get()),
            'recent_blogs' => Blog::orderBy("id", "desc")->limit(6)->get(),
        ]);
    }
     
    //
    public function blog_comment_get(Request $request)
    {
        $comments = Comment::leftJoin("users", "users.unique_id", "=", "comments.user_id")
                    ->select([
                        'comments.unique_id as unique_id',
                        'comments.user_id as user_id',
                        'comments.comment as comment',
                        'comments.created_at as created_at',
                        'users.name as user_name',
                        'users.email as user_email'
                    ])
                    ->where("comments.blog_id", $request->blog_id)->get();
        $replies = Reply::leftJoin("users", "users.unique_id", "=", "replies.user_id")
                    ->select([
                        'replies.unique_id as unique_id',
                        'replies.user_id as user_id',
                        'replies.comment_id as comment_id',
                        'replies.reply as reply',
                        'replies.created_at as created_at',
                        'users.name as user_name',
                        'users.email as user_email'
                    ])
                    ->where("replies.blog_id", $request->blog_id)->get();

        return response()->json(array(
            'comments' => $comments,
            'replies' => $replies
            
        ), 200);
    }
     
    //
    public function blog_comment(Request $request)
    {
        $blog = Blog::where("unique_id", $request->blog_id)->first();

        if(!$blog){
            $body = "Blog not found";
            return response()->json(array(
                'type' => 'error',
                'body' => $body
                
            ), 200);
        }

        if($request->type == "comment"){
            Comment::create([
                'unique_id' => generate_random_numbers(20),
                'blog_id' => $request->blog_id,
                'user_id' => user()->unique_id,
                'comment' => $request->comment
            ]);
        }

        if($request->type == "reply"){
            Reply::create([
                'unique_id' => generate_random_numbers(20),
                'blog_id' => $request->blog_id,
                'comment_id' => $request->comment_id,
                'user_id' => user()->unique_id,
                'reply' => $request->comment
            ]);
        }

        $body = "Comment Posted Successfuly";
        return response()->json(array(
            'type' => 'success',
            'body' => $body
            
        ), 200);
    }
}
