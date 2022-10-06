<?php

/**
 * This is my custom helper function
 * Laravel keeps resetting it's global helper file
 * So I opened a new file of my own, damn you Laravel!
 */

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Utilities\RandomGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\EventRegistration;
use App\Models\InvoiceItem;
use App\Models\Invoice;
use App\Models\Download;
use App\Models\Category;
use App\Models\User;

if (! function_exists('generate_random_string')) {
    /**
     * @param $length
     * @return string
     */
    function generate_random_string($length)
    {
        return RandomGenerator::generate_random_string($length);
    }
}

if (! function_exists('generate_random_numbers')) {
    /**
     * @param $length
     * @return string
     */
    function generate_random_numbers($length)
    {
        return RandomGenerator::generate_random_numbers($length);
    }
}

if(! function_exists('toast')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function toast($type, $body)
    {
        session()->flash('message', [
            'type' => $type,
            'body' => $body
        ]);
    }
}

if (! function_exists('user')) {
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user()
    {
        return \Auth::user();
    }
}

if(! function_exists('current_route')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function current_route()
    {
        return \Request::route()->getName();
    }
}

if(! function_exists('app_url')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_url()
    {
        return 'http://appylaw.com';
    }
}

if(! function_exists('app_name')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_name($check = NULL)
    {
        return $check ? 'Appy Law' : 'AppyLaw';
    }
}

if(! function_exists('app_email')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_email()
    {
        return 'support@appylaw.com';
    }
}

if(! function_exists('app_phone')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_phone()
    {
        return '2347035691707';
    }
}

if(! function_exists('app_address')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_address()
    {
        return '6A, Sule Abuka Crescent, Opebi Allen Avenue, Ikeja, Lagos State';
    }
}

if(! function_exists('app_public_key')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_public_key()
    {
        return 'pk_live_afe2d7ada767b6761f08c12ad953c948ae9820a5';
    }
}

if(! function_exists('app_secret_key')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function app_secret_key()
    {
        return 'sk_live_947def9657e399e53f978961407e06b4864f0d07';
    }
}

if(! function_exists('image_url')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function image_url($avatar)
    {
        return app_url().'/storage/'.$avatar.'?'.generate_random_string(20);
    }
}

if(! function_exists('daily_earning')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function daily_earning()
    {
        $invoice = Invoice::where("updated_at", ">=", Carbon::now()->startOfDay())->where("updated_at", "<=", Carbon::now()->endOfDay())->where('is_paid', "!=", NULL)->sum("amount");
        $event = EventRegistration::where("updated_at", ">=", Carbon::now()->startOfDay())
                    ->where("updated_at", "<=", Carbon::now()->endOfDay())
                    ->where('is_paid', "!=", NULL)
                    ->sum("price");
        return $invoice + $event;
    }
}

if(! function_exists('weekly_earning')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function weekly_earning()
    {
        $invoice = Invoice::where("updated_at", ">=", Carbon::now()->startOfWeek())->where("updated_at", "<=", Carbon::now()->endOfWeek())->where('is_paid', "!=", NULL)->sum("amount");
        $event = EventRegistration::where("updated_at", ">=", Carbon::now()->startOfWeek())
                    ->where("updated_at", "<=", Carbon::now()->endOfWeek())
                    ->where('is_paid', "!=", NULL)
                    ->sum("price");
        return $invoice + $event;
    }
}

if(! function_exists('monthly_earning')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function monthly_earning()
    {
        $invoice = Invoice::where("updated_at", ">=", Carbon::now()->startOfMonth())->where("updated_at", "<=", Carbon::now()->endOfMonth())->where('is_paid', "!=", NULL)->sum("amount");
        $event = EventRegistration::where("updated_at", ">=", Carbon::now()->startOfMonth())
                    ->where("updated_at", "<=", Carbon::now()->endOfMonth())
                    ->where('is_paid', "!=", NULL)
                    ->sum("price");
        return $invoice + $event;
    }
}

if(! function_exists('yearly_earning')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function yearly_earning()
    {
        $invoice = Invoice::where("updated_at", ">=", Carbon::now()->startOfYear())->where("updated_at", "<=", Carbon::now()->endOfYear())->where('is_paid', "!=", NULL)->sum("amount");
        $event = EventRegistration::where("updated_at", ">=", Carbon::now()->startOfYear())
                    ->where("updated_at", "<=", Carbon::now()->endOfYear())
                    ->where('is_paid', "!=", NULL)
                    ->sum("price");
        return $invoice + $event;
    }
}

if(! function_exists('daily_earning_document')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function daily_earning_document($unique_id)
    {
        $invoice = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                    ->where("invoice_items.document_id", $unique_id)
                    ->where("invoice_items.updated_at", ">=", Carbon::now()->startOfDay())
                    ->where("invoice_items.updated_at", "<=", Carbon::now()->endOfDay())
                    ->where('invoices.is_paid', "!=", NULL)
                    ->sum("invoice_items.item_price");
        return $invoice;
    }
}

if(! function_exists('weekly_earning_document')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function weekly_earning_document($unique_id)
    {
        $invoice = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                    ->where("invoice_items.document_id", $unique_id)
                    ->where("invoice_items.updated_at", ">=", Carbon::now()->startOfWeek())
                    ->where("invoice_items.updated_at", "<=", Carbon::now()->endOfWeek())
                    ->where('invoices.is_paid', "!=", NULL)
                    ->sum("invoice_items.item_price");
        return $invoice;
    }
}

if(! function_exists('monthly_earning_document')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function monthly_earning_document($unique_id)
    {
        $invoice = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                    ->where("invoice_items.document_id", $unique_id)
                    ->where("invoice_items.updated_at", ">=", Carbon::now()->startOfMonth())
                    ->where("invoice_items.updated_at", "<=", Carbon::now()->endOfMonth())
                    ->where('invoices.is_paid', "!=", NULL)
                    ->sum("invoice_items.item_price");
        return $invoice;
    }
}

if(! function_exists('yearly_earning_document')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function yearly_earning_document($unique_id)
    {
        $invoice = InvoiceItem::leftJoin("invoices", "invoices.unique_id", "=", "invoice_items.invoice_id")
                    ->where("invoice_items.document_id", $unique_id)
                    ->where("invoice_items.updated_at", ">=", Carbon::now()->startOfYear())
                    ->where("invoice_items.updated_at", "<=", Carbon::now()->endOfYear())
                    ->where('invoices.is_paid', "!=", NULL)
                    ->sum("invoice_items.item_price");
        return $invoice;
    }
}

if(! function_exists('daily_download')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function daily_download($access_type)
    {
        $total = Download::where("access_type", $access_type)->where("updated_at", ">=", Carbon::now()->startOfDay())->where("updated_at", "<=", Carbon::now()->endOfDay())->get()->count();
        return $total;
    }
}

if(! function_exists('weekly_download')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function weekly_download($access_type)
    {
        $total = Download::where("access_type", $access_type)->where("updated_at", ">=", Carbon::now()->startOfWeek())->where("updated_at", "<=", Carbon::now()->endOfWeek())->get()->count();
        return $total;
    }
}

if(! function_exists('monthly_download')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function monthly_download($access_type)
    {
        $total = Download::where("access_type", $access_type)->where("updated_at", ">=", Carbon::now()->startOfMonth())->where("updated_at", "<=", Carbon::now()->endOfMonth())->get()->count();
        return $total;
    }
}

if(! function_exists('yearly_download')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function yearly_download($access_type)
    {
        $total = Download::where("access_type", $access_type)->where("updated_at", ">=", Carbon::now()->startOfYear())->where("updated_at", "<=", Carbon::now()->endOfYear())->get()->count();
        return $total;
    }
}

if(! function_exists('monthly_download_limit')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function monthly_download_limit()
    {
        return 100;
    }
}

if(! function_exists('can_download')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function can_download($unique_id = NULL)
    {
        $user = User::where("unique_id", $unique_id ?? user()->unique_id)->first();

        if(Carbon::parse($user->sub_expiry) > Carbon::now()){
            if($user->tenant_id == 1){
                return true;
            }
            else{
                $downloads = Download::where("user_id", $user->unique_id)->where("updated_at", ">=", Carbon::now()->startOfMonth())->where("updated_at", "<=", Carbon::now()->endOfMonth())->get()->count();
                
                return $downloads > monthly_download_limit() ? false : true;
            }
        }
        else{
            return false;
        }
    }
}

if(! function_exists('get_event_sub')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function get_event_sub($unique_id)
    {
        return count(EventRegistration::where("event_id", $unique_id)->where("is_paid", "!=", NULL)->get());
    }
}

if(! function_exists('get_event_earnings')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function get_event_earnings($unique_id)
    {
        return EventRegistration::where("event_id", $unique_id)->where("is_paid", "!=", NULL)->sum("price");
    }
}

if(! function_exists('get_percentage_discount')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function get_percentage_discount($current_price, $previous_price)
    {
        try{
            $percentage = (int)((($previous_price - $current_price) / $previous_price) * 100);
            return $percentage;
        }
        catch(\Throwable $e){
            return 0;
        }
    }
}

if(! function_exists('categories')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function categories()
    {
        return Category::orderBy("name")->get();
    }
}

if(! function_exists('verify_invoice')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function verify_invoice()
    {
        try{
            $invoices = Invoice::where("is_paid", NULL)->where("is_not_paid", NULL)->limit(100)->get();

            foreach($invoices as $invoice){
                //check each invoice and mark as paid if it has been paid
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . app_secret_key()
                ])->get('https://api.paystack.co/transaction/verify/' . $invoice->reference);

                if($response->object() && $response->object()->status){
                    $data = $response->object()->data;
                    
                    if($data && $data->status == "success"){
                        //then give value
                        $invoice->update([
                            'is_paid' => 'yes'
                        ]);
                    }
                    else{
                        //check if the payment is an hour old and mark as unpaid
                        if(Carbon::parse($invoice->created_at) < (Carbon::now()->subHours(1))){
                            $invoice->update([
                                'is_not_paid' => 'yes'
                            ]);
                        }
                    }
                }
                else{
                    //check if the payment is an hour old and mark as unpaid
                    if(Carbon::parse($invoice->created_at) < (Carbon::now()->subHours(1))){
                        $invoice->update([
                            'is_not_paid' => 'yes'
                        ]);
                    }
                }
            }
        }
        catch(\Throwable $e){
            Log::debug($e);
        }
    }
}

if(! function_exists('verify_event')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function verify_event()
    {
        try{
            $events = EventRegistration::where("is_paid", NULL)->where("is_not_paid", NULL)->limit(100)->get();

            foreach($events as $event){
                //check each event and mark as paid if it has been paid
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . app_secret_key()
                ])->get('https://api.paystack.co/transaction/verify/' . $event->reference);

                if($response->object() && $response->object()->status){
                    $data = $response->object()->data;
                    
                    if($data && $data->status == "success"){
                        //then give value
                        $event->update([
                            'is_paid' => 'yes'
                        ]);
                    }
                    else{
                        //check if the payment is an hour old and mark as unpaid
                        if(Carbon::parse($event->created_at) < (Carbon::now()->subHours(1))){
                            $event->update([
                                'is_not_paid' => 'yes'
                            ]);
                        }
                    }
                }
                else{
                    //check if the payment is an hour old and mark as unpaid
                    if(Carbon::parse($event->created_at) < (Carbon::now()->subHours(1))){
                        $event->update([
                            'is_not_paid' => 'yes'
                        ]);
                    }
                }
            }
        }
        catch(\Throwable $e){
            Log::debug($e);
        }
    }
}

if(! function_exists('check_even')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function check_even($value)
    {
        if($value % 2 == 0){
            return true; 
        }
        else{
            return false;
        }
    }
}

if(! function_exists('truncate')) {
    /**
     * @param $title
     * @param $type
     * @param $body
     */
    function truncate($string, $length)
    {
        return Str::limit($string, $length, '...');
    }
}