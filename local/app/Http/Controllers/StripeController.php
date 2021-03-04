<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use URL;
use Stripe;
use Stripe_Charge;

class StripeController extends Controller
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
    
	
	
	
   
   
   
  
	
	public function avigher_stripe(Request $request) 
	{
		$data = $request->all();
		$cid = $data['cid'];
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		if($setts[0]->stripe_mode=="test") 
		{
			$secretkey = $setts[0]->test_secret_key;
		}
		else if($setts[0]->stripe_mode=="live")
		{
			$secretkey = $setts[0]->live_secret_key;
		}
		
		try {	
		
		include(app_path() . '/Stripe/lib/Stripe.php');
		Stripe::setApiKey($secretkey); //Replace with your Secret Key
		
		$charge = Stripe_Charge::create(array(
			"amount" => $_POST['amount'],
			"currency" => $_POST['currency_code'],
			"card" => $_POST['stripeToken'],
			"description" => $_POST['item_name']
		));
		
		
		
		$stripe_token = $_POST['stripeToken'];
		}

		catch(Stripe_CardError $e) {
			
		}



		catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API

		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)

		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		} catch (Stripe_Error $e) {

		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		} catch (Exception $e) {

		  // Something else happened, completely unrelated to Stripe
		}
		
		
		
		
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
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
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
		
		
		
		
		
		
	 
	  
		
		
		
		$data = array('stripe_token' => $stripe_token, 'cid' => $cid);
		return view('stripe-success')->with($data);
		
	}
	
	
	
	
	
	
	
	
}
