<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Models\InvoiceItem;
use App\Models\DocumentReview;
use App\Models\Download;
use App\Models\Category;
use App\Models\Document;
use App\Models\Lawyer;
use App\Models\Event;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
    	return view('dashboard');
    }

    //
    public function app_login()
    {
    	return view('app_login');
    }

    //
    public function app_login_post(Request $request)
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

            toast("success", "login successful");
            return redirect()->route('dashboard');
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function app_logout()
    {
        \Auth::guard('web')->logout();
        return redirect()->route('app_login');
    }

    //
    public function profile()
    {
    	return view('profile');
    }

    //
    public function profile_post(Request $request)
    {
        $request->validate([
            'password' => 'same:confirm_password',
        ]);

        try{
            $user = User::where("unique_id", user()->unique_id)->first();

            $user->update([
                'name' => $request->name ?? $user->name,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
            ]);

            toast("success", "profile updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function admins()
    {
        return view('admins')->with([
            'admins' => User::orderBy("name")->where("tenant_id", 2)->paginate(10)
        ]);
    }

    //
    public function admins_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'same:confirm_password',
        ]);

        try{

            User::create([
                'unique_id' => generate_random_numbers(10),
                'tenant_id' => 2,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            toast("success", "user added successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function admins_update(Request $request)
    {
        $request->validate([
            'password' => 'same:confirm_password',
        ]);

        try{
            $admin = User::where("unique_id", $request->unique_id)->first();

            if(!$admin){
                toast("error", "admin not found");
                return redirect()->back();
            }

            $admin->update([
                'name' => $request->name ?? $admin->name,
                'password' => $request->password ? bcrypt($request->password) : $admin->password,
            ]);

            toast("success", "admin updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function admins_delete(Request $request)
    {
        try{
            $admin = User::where("unique_id", $request->unique_id)->first();

            $admin->delete();

            toast("success", "admin deleted successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function users()
    {
        return view('users')->with([
            'users' => User::orderBy("name")->where("tenant_id", 3)->paginate(10)
        ]);
    }

    //
    public function users_sub(Request $request)
    {
        $request->validate([
            'sub_expiry' => 'required'
        ]);

        try{

            $user = User::where("unique_id", $request->unique_id)->first();

            if(!$user){
                toast("error", "user was not found");
                return redirect()->back();
            }

            $user->update([
                'sub_expiry' => Carbon::parse($request->sub_expiry)
            ]);

            toast("success", "subscription updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function users_mail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        try{

            $user = User::where("unique_id", $request->unique_id)->first();

            if(!$user){
                toast("error", "user was not found");
                return redirect()->back();
            }

            /*$data = array(
                'message_body' => $request->message
            );

            $subject = $request->subject;

            $mail = $user->email;
            
            Mail::send('mails.single', $data, function($message) use ($mail, $subject) {
                $message->to($mail);
                $message->subject($subject);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });*/
            
            toast("success", "mail sent successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function category()
    {
    	return view('category')->with([
            'categories' => Category::orderBy("name")->paginate(10)
        ]);
    }

    //
    public function add_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{

            Category::create([
                'unique_id' => generate_random_numbers(10),
                'name' => $request->name,
                'description' => $request->description,
            ]);

            toast("success", "category added successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function edit_category(Request $request)
    {
        try{
            $category = Category::where("unique_id", $request->unique_id)->first();

            if(!$category){
                toast("error", "category was not found");
                return redirect()->back();
            }

            $category->update([
                'name' => $request->name ?? $user->name,
                'description' => $request->description ?? $user->description,
            ]);

            toast("success", "category updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function delete_category(Request $request)
    {
        try{
            $category = Category::where("unique_id", $request->unique_id)->first();

            if(!$category){
                toast("error", "category was not found");
                return redirect()->back();
            }

            //dont delete a category that has a documents
            $child = Document::where("category_id", $category->unique_id)->first();

            if($child){
                toast("error", "sorry you cannot delete a category that has a documents atteched to it");
                return redirect()->back();
            }

            $category->delete();

            toast("success", "category deleted successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function document(Request $request)
    {
    	return view('document')->with([
            'categories' => Category::orderBy("name")->get(),
            'documents' => Document::orderBy("name")->where("name", "like", "%". $request->search ."%")->paginate(10),
        ]);
    }

    //
    public function add_document(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'access_type' => 'required',
            'maximum_download_count' => 'required',
            'format' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        try{
            $thumbnail = Storage::disk('public')->put('thumbnails', $request->file('thumbnail'));
            $content = Storage::disk('public')->put('documents', $request->file('content'));

            Document::create([
                'unique_id' => generate_random_numbers(10),
                'category_id' => $request->category_id,
                'name' => $request->name,
                'access_type' => $request->access_type,
                'maximum_download_count' => $request->maximum_download_count,
                'previous_price' => $request->previous_price,
                'current_price' => $request->current_price,
                'format' => $request->format,
                'description' => $request->description,
                'thumbnail' => $thumbnail,
                'content' => $content,
                'tags' => $request->tags,
            ]);

            toast("success", "document added successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function edit_document(Request $request)
    {
        try{
            $document = Document::where("unique_id", $request->unique_id)->first();

            if(!$document){
                toast("error", "document was not found");
                return redirect()->back();
            }

            if($document->thumbnail){
                $thumbnail = $request->file('thumbnail') ? Storage::disk('public')->putFileAs(NULL, $request->file('thumbnail'), $document->thumbnail) : $document->thumbnail;
            }
            else{
                $thumbnail = $request->file('thumbnail') ? Storage::disk('public')->put('thumbnails', $request->file('thumbnail')) : $document->thumbnail;
            }

            if($document->content){
                $content = $request->file('content') ? Storage::disk('public')->putFileAs(NULL, $request->file('content'), $document->content) : $document->content;
            }
            else{
                $content = $request->file('content') ? Storage::disk('public')->put('documents', $request->file('content')) : $document->content;
            }

            $document->update([
                'category_id' => $request->category_id ?? $document->category_id,
                'name' => $request->name ?? $document->name,
                'access_type' => $request->access_type ?? $document->access_type,
                'maximum_download_count' => $request->maximum_download_count ?? $document->maximum_download_count,
                'previous_price' => $request->previous_price ?? $document->previous_price,
                'current_price' => $request->current_price ?? $document->current_price,
                'format' => $request->format ?? $document->format,
                'description' => $request->description ?? $document->description,
                'thumbnail' => $thumbnail,
                'content' => $content,
                'tags' => $request->tags ?? $document->tags,
            ]);

            toast("success", "document updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function delete_document(Request $request)
    {
        try{
            $document = Document::where("unique_id", $request->unique_id)->first();

            if(!$document){
                toast("error", "document was not found");
                return redirect()->back();
            }

            $document->delete();

            toast("success", "document deleted successfully");
            return redirect()->route('document');
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function document_details(Request $request)
    {

        $reviews = DocumentReview::where("document_id", $request->unique_id)->get();
        $document_reviews = count($reviews);
        $document_total_ratings = $reviews->sum("rating");

    	return view('document_details')->with([
            'categories' => Category::orderBy("name")->get(),
            'document' => Document::where("unique_id", $request->unique_id)->first(),
            'document_reviews' => $document_reviews,
            'document_ratings' => $document_reviews < 1 ? 0 : round(($document_total_ratings / $document_reviews), 1)
        ]);
    }

    //
    public function document_download(Request $request)
    {
        try{
            $document = Document::where("unique_id", $request->unique_id)->first();

            if(!$document){
                toast("error", "document was not found");
                return redirect()->back();
            }

            if(!can_download()){
                toast("error", "sorry your subscription has expired or you have exhausted your monthly download limit, if you find this to be an error, kindly contact support for assistance");
                return redirect()->back();
            }
            
            $real_path = public_path('storage/'.$document->document);
            
            if($real_path)
            {
                Download::create([
                    'unique_id' => generate_random_numbers(10),
                    'user_id' => user()->unique_id,
                    'document_id' => $document->unique_id,
                    'access_type' => $document->access_type,
                ]);

                toast("success", "Document downloaded successfully");
                return response()->download($real_path, str_replace(" ", "", $document->name) . '.' . explode('.', $document->document)[1]);
            }
            
            toast("error", "Document not found");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back();
        }
    }

    //
    public function document_sales(Request $request)
    {
        return view('document_sales')->with([
            'categories' => Category::orderBy("name")->get(),
            'document' => Document::where("unique_id", $request->unique_id)->first(),
            'invoice_items' => InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                                ->leftJoin("documents", "documents.unique_id", "=", "invoice_items.document_id")
                                ->leftJoin("categories", "categories.unique_id", "=", "documents.category_id")
                                ->leftJoin("users", "users.unique_id", "=", "invoice_items.user_id")
                                ->select([
                                    'users.name as user',
                                    'categories.name as category',
                                    'documents.name as document',
                                    'invoices.is_paid as is_paid',
                                    'invoice_items.unique_id as unique_id',
                                    'invoice_items.item_price as item_price',
                                ])
                                ->where("invoice_items.document_id", $request->unique_id)
                                ->paginate(10),
        ]);
    }

    //
    public function document_update(Request $request)
    {
        return view('document_update')->with([
            'categories' => Category::orderBy("name")->get(),
            'document' => Document::where("unique_id", $request->unique_id)->first(),
        ]);
    }
    
    //
    public function event()
    {
    	return view('event')->with([
            'events' => Event::orderBy("id", "desc")->paginate(10),
        ]);
    }

    //
    public function add_event(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'access_type' => 'required',
            'price' => 'required',
            'body' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'avatar' => 'required',
        ]);

        try{
            $avatar = Storage::disk('public')->put('events', $request->file('avatar'));
            
            Event::create([
                'unique_id' => generate_random_numbers(10),
                'title' => $request->title,
                'access_type' => $request->access_type,
                'price' => $request->price,
                'body' => $request->body,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'avatar' => $avatar,
            ]);

            toast("success", "event added successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function event_details(Request $request)
    {
        return view('event_details')->with([
            'event' => Event::where("unique_id", $request->unique_id)->first(),
        ]);
    }

    //
    public function event_sub(Request $request)
    {
        return view('event_sub')->with([
            'event' => Event::where("unique_id", $request->unique_id)->first(),
            'event_subs' => EventRegistration::leftJoin("users", "users.unique_id", "=", "event_registrations.user_id")
                                ->select([
                                    'users.name as user',
                                    'event_registrations.is_paid as is_paid',
                                    'event_registrations.unique_id as unique_id',
                                    'event_registrations.updated_at as updated_at',
                                ])
                                ->where("event_registrations.event_id", $request->unique_id)
                                ->paginate(10),
        ]);
    }

    //
    public function event_sub_manual(Request $request)
    {
        try{
            $user = User::where("email", $request->email)->first();

            if(!$user){
                toast("error", "user not found");
                return redirect()->back();
            }

            $previous = EventRegistration::where("event_id", $request->event_id)
                            ->where("user_id", $user->unique_id)
                            ->first();

            if($previous){
                toast("info", "this user has already registered for this event");
                return redirect()->back();
            }

            EventRegistration::create([
                'unique_id' => generate_random_numbers(10),
                'user_id' => $user->unique_id,
                'event_id' => $request->event_id,
                'reference' => generate_random_numbers(16),
                'is_paid' => 'yes',
            ]);

            toast("success", "user registrered successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back();
        }
    }

    //
    public function event_sub_delete(Request $request)
    {
        try{
            $event_sub = EventRegistration::where("unique_id", $request->unique_id)->first();

            if(!$event_sub){
                toast("error", "event registration not found");
                return redirect()->back();
            }

            $event_sub->delete();

            toast("success", "registration deleted successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back();
        }
    }

    //
    public function event_update(Request $request)
    {
        return view('event_update')->with([
            'event' => Event::where("unique_id", $request->unique_id)->first(),
        ]);
    }

    //
    public function edit_event(Request $request)
    {
        try{
            $event = Event::where("unique_id", $request->unique_id)->first();

            if(!$event){
                toast("error", "event was not found");
                return redirect()->back();
            }

            if($event->avatar){
                $avatar = $request->file('avatar') ? Storage::disk('public')->putFileAs(NULL, $request->file('avatar'), $event->avatar) : $event->avatar;
            }
            else{
                $avatar = $request->file('avatar') ? Storage::disk('public')->put('events', $request->file('avatar')) : $event->avatar;
            }

            $event->update([
                'title' => $request->title ?? $event->title,
                'access_type' => $request->access_type ?? $event->access_type,
                'price' => $request->price ?? $event->price,
                'body' => $request->body ?? $event->body,
                'start_date' => $request->start_date ?? $event->start_date,
                'end_date' => $request->end_date ?? $event->end_date,
                'avatar' => $avatar,
            ]);

            toast("success", "event updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function delete_event(Request $request)
    {
        try{
            $event = Event::where("unique_id", $request->unique_id)->first();

            if(!$event){
                toast("error", "event was not found");
                return redirect()->back();
            }

            //do not delete event that has a subscriber
            $event->delete();

            toast("success", "event deleted successfully");
            return redirect()->route('event');
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    
    //
    public function lawyer()
    {
        return view('lawyer')->with([
            'lawyers' => Lawyer::orderBy("id", "desc")->paginate(10),
        ]);
    }

    //
    public function add_lawyer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year_of_call' => 'required',
            'practice_city' => 'required',
            'practice_state' => 'required',
            'office_address' => 'required',
            'avatar' => 'required',
        ]);

        try{
            $avatar = Storage::disk('public')->put('lawyers', $request->file('avatar'));
            
            Lawyer::create([
                'unique_id' => generate_random_numbers(10),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'year_of_call' => $request->year_of_call,
                'practice_city' => $request->practice_city,
                'practice_state' => $request->practice_state,
                'office_address' => $request->office_address,
                'practice_areas' => $request->practice_areas,
                'schools_attended' => $request->schools_attended,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'avatar' => $avatar,
            ]);

            toast("success", "lawyer added successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function lawyer_details(Request $request)
    {
        return view('lawyer_details')->with([
            'lawyer' => Lawyer::where("unique_id", $request->unique_id)->first(),
        ]);
    }

    //
    public function lawyer_update(Request $request)
    {
        return view('lawyer_update')->with([
            'lawyer' => Lawyer::where("unique_id", $request->unique_id)->first(),
        ]);
    }

    //
    public function edit_lawyer(Request $request)
    {
        try{
            $lawyer = Lawyer::where("unique_id", $request->unique_id)->first();

            if(!$lawyer){
                toast("error", "lawyer was not found");
                return redirect()->back();
            }

            if($lawyer->avatar){
                $avatar = $request->file('avatar') ? Storage::disk('public')->putFileAs(NULL, $request->file('avatar'), $lawyer->avatar) : $lawyer->avatar;
            }
            else{
                $avatar = $request->file('avatar') ? Storage::disk('public')->put('lawyers', $request->file('avatar')) : $lawyer->avatar;
            }

            $lawyer->update([
                'name' => $request->name ?? $lawyer->name,
                'email' => $request->email ?? $lawyer->email,
                'phone' => $request->phone ?? $lawyer->phone,
                'year_of_call' => $request->year_of_call ?? $lawyer->year_of_call,
                'practice_city' => $request->practice_city ?? $lawyer->practice_city,
                'practice_state' => $request->practice_state ?? $lawyer->practice_state,
                'office_address' => $request->office_address ?? $lawyer->office_address,
                'practice_areas' => $request->practice_areas ?? $lawyer->practice_areas,
                'schools_attended' => $request->schools_attended ?? $lawyer->schools_attended,
                'facebook' => $request->facebook ?? $lawyer->facebook,
                'twitter' => $request->twitter ?? $lawyer->twitter,
                'linkedin' => $request->linkedin ?? $lawyer->linkedin,
                'avatar' => $avatar,
            ]);

            toast("success", "lawyer updated successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //
    public function delete_lawyer(Request $request)
    {
        try{
            $lawyer = Lawyer::where("unique_id", $request->unique_id)->first();

            if(!$lawyer){
                toast("error", "lawyer was not found");
                return redirect()->back();
            }

            $lawyer->delete();

            toast("success", "lawyer deleted successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    
    //
    public function mailer()
    {
        return view('mailer');
    }

    //
    public function mailer_post(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'message' => 'required',
        ]);

        try{

            $data = array(
                'message_body' => $request->message
            );

            $subject = $request->subject;

            $mails = json_decode('[]', TRUE);

            if($request->category == 3){
                $users = User::where("sub_expiry", "<=", Carbon::now())->get();
            }
            elseif($request->category == 2){
                $users = User::where("sub_expiry", ">", Carbon::now())->get();
            }
            else{
                $users = User::orderBy("id")->get();
            }

            foreach($users as $user){
                $user->email ? $mails[] = $user->email : null;
            }
            
            /*Mail::send('mails.bulk', $data, function($message) use ($mails, $subject) {
                $message->bcc($mails)->subject($subject);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });*/

            toast("success", "message sent successfully");
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("success", $e->getMessage());
            return redirect()->back();
        }
    }

    /*
     *
     */
    public function blogs(Request $request)
    {
        return view('blogs')->with([
            'blogs' => Blog::orderBy("id", "desc")->paginate(10),
        ]);
    }

    /*
     *
     */
    public function blogs_create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
            'body' => 'required',
            'file' => 'required|max:10240',
        ]);

        try{
            $image = Storage::disk('public')->put('blogs', $request->file('file'));

            Blog::create([
                'title' => $request->title,
                'url' => $request->url,
                'description' => $request->description,
                'body' => $request->body,
                'unique_id' => generate_random_numbers(10),
                'image' => $image
            ]);

            $body = 'Blog Added Successfully';
            toast('success', $body);
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("success", $e->getMessage());
            return redirect()->back();
        }
    }

    /*
     *
     */
    public function blogs_update(Request $request)
    {
        if($request->file('file')){
            $request->validate([
                'file' => 'max:10240'
            ]);
        }

        try{
            $blog = Blog::where("unique_id", $request->unique_id)->first();

            if(!$blog){
                $body = 'Blog Not Found';
                toast('error', $body);
                return redirect()->back();
            }

            if($request->file('file')){
                if($blog->image){
                    $image = Storage::disk('public')->putFileAs(NULL, $request->file('file'), $blog->image);
                }
                else{
                    $image = Storage::disk('public')->put('blogs', $request->file('file'));
                }
            }
            else{
                $image = $blog->image;
            }

            $blog->update([
                'title' => $request->title ?? $blog->title,
                'url' => $request->url ?? $blog->url,
                'description' => $request->description ?? $blog->description,
                'body' => $request->body ?? $blog->body,
                'image' =>  $image
            ]);

            $body = 'Blog Updated Successfully';
            toast('success', $body);
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("success", $e->getMessage());
            return redirect()->back();
        }
    }

    /*
     *
     */
    public function blogs_delete(Request $request)
    {
        try{
            $blog = Blog::where("unique_id", $request->unique_id)->first();

            if(!$blog){
                $body = 'Blog Not Found';
                toast('error', $body);
                return redirect()->back();
            }

            Storage::disk('public')->delete($blog->image);

            $blog->delete();

            $body = 'Blog Deleted Successfully';
            toast('success', $body);
            return redirect()->back();
        }
        catch(\Throwable $e){
            toast("success", $e->getMessage());
            return redirect()->back();
        }
    }
}
