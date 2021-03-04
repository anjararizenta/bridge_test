<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;
use Carbon\Carbon;


class SuccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
	
	
	public function paypal_success($cid) {
		
		
		 $checkoutupdate = DB::table('checkout')
						->where('purchase_token', '=', $cid)
						->where('payment_status', '=', 'pending')
						->update(['payment_status' => 'completed']);
		
		
				
				
		$get_details = DB::table('checkout')
              
			       ->where('purchase_token', '=', $cid)
			   
                   ->get();				
						
				$order_id = $cid;
				$name = $get_details[0]->fullname;
				$email = $get_details[0]->email;
				$phone = $get_details[0]->phone;			
				$amount = $get_details[0]->amount;
				$msg = $get_details[0]->write_comment;
				$camp_date = $get_details[0]->payment_date;
				
				
				$campaign = DB::table('campaigns')
		        ->where('camp_id', '=' , $get_details[0]->camp_id)
				->get(); 
		
		$camp_name = $campaign[0]->camp_title;
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$currency = $setts[0]->site_currency;
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		
		
		
		$datas = [
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'order_id' => $order_id, 'camp_name' => $camp_name, 'camp_date' => $camp_date, 'currency' => $currency
        ];
		
		
		Mail::send('payment_adminmail', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
		
		
		
		Mail::send('payment_usermail', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Details');
			
            $message->from($admin_email, 'Admin');

            $message->to($email);

        }); 
		
		
		
		
		
		
	 
	  $data = array('cid' => $cid);
     return view('success')->with($data);
	  
   }
   
   
   
  
	
	
	
	
	
	
}
