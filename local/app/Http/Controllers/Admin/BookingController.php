<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mail;
use URL;
use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    
    public function index()
    {
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
        $booking = DB::table('booking')
		           ->leftJoin('users', 'users.id', '=', 'booking.book_user_id')
				   ->leftJoin('shop', 'shop.shop_id', '=', 'booking.shop_id')
				   ->orderBy('booking.book_id','desc')
				 ->get();
		
		$data=array('booking' => $booking, 'setting' => $setting);

        return view('admin.booking')->with($data);
    }
	
	
	
	public function approval_status($action,$book_id,$book_user_id) 
	{
		
		DB::update('update booking set payment_approval="1" where payment_status="paid" and book_id = ?', [$book_id]);
		
		$view_book = DB::table('booking')
					 ->where('book_id','=',$book_id)
					 ->get();
		$view_book_cnt = DB::table('booking')
					 ->where('book_id','=',$book_id)
                     ->count();
					 
		$user = DB::table('users')
		       ->where('id','=',$view_book[0]->book_user_id)
			   ->get();		 
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		$shop_id = $view_book[0]->shop_id;
		$shop_details = DB::table('shop')
		         ->where('shop_id', '=', $shop_id)
		         ->get();
				 
		$getslug = $shop_details[0]->user_id;	
		
		$postuser = DB::table('users')
		       ->where('id','=',$getslug)
			   ->get();	
			   
			   
		$admin_details = DB::table('users')
		       ->where('id','=',1)
			   ->get();		   
			   
		$post_slug = $postuser[0]->post_slug;	   
			 
		if($view_book[0]->stripe_token!="")
		{		 
		$reference_id = $view_book[0]->stripe_token;
		}
		else
		{
		$reference_id = $view_book[0]->book_id;
		}
		$username = $user[0]->name;
		$useremail = $user[0]->email;
		$title = $shop_details[0]->name;
		
		$commission_mode = $setts[0]->commission_mode;
		$commission_amt = $setts[0]->commission_amt;
		if($commission_mode=="percentage")
				   {
					   $commission_amount = ($commission_amt * $view_book[0]->total_amount) / 100;
				   }
				   if($commission_mode=="fixed")
				   {
					    if($view_book[0]->total_amount < $commission_amt)
						{
							$commission_amount = 0;
						}
						else
						{
							$commission_amount = $commission_amt;
						}
				   }
				   
		$sum =$view_book[0]->total_amount - $commission_amount;
				   
				   	   
		
		$admin_email = $admin_details[0]->email;
		
		$get_price = $sum;
		$payment_date = $view_book[0]->submit_date;
		$payment_type = $view_book[0]->payment_type;
		
		Mail::send('admin.payment_approval_email', ['shop_id' => $shop_id, 'reference_id' => $reference_id, 'username' => $username,
		'title' => $title, 'get_price' => $get_price, 'payment_date' => $payment_date, 'payment_type' => $payment_type,
		'site_logo' => $site_logo, 'site_name' => $site_name, 'url' => $url, 'post_slug' => $post_slug], function ($message) use ($useremail,$admin_email)
        {
            $message->subject('Your Payment Approved Successfully');
			
            $message->from($admin_email, 'Admin');

            $message->to($useremail);

        }); 
		
		
		
		
			return back();
		
	}
	
	
	
	
	
	protected function delete_all(Request $request)
    {
	
	
	      $data = $request->all();
	   $nid = $data['nid'];
	   
	   foreach($nid as $pid)
	   {
			DB::delete('delete from booking where book_id = ?',[$pid]);
	    }
		return back();
	
	}
	
	
	
	
	public function destroy($id) {
		
		
	  
      DB::delete('delete from booking where book_id = ?',[$id]);
	   
      return back();
      
   }
   
   
   
   public function confirm($action,$booker)
   {
       
	   $viewbook = DB::table('booking')
		           ->where('book_id','=',$booker)
				    ->get();
	   
	   
	   $booking_time=$viewbook[0]->book_time;
							if($booking_time>12)
							{
								$final_time=$booking_time-12;
								$final_time=$final_time."PM";
							}
							else
							{
								$final_time=$booking_time."AM";
							}


					$ser_id=$viewbook[0]->services_id;
			$selected=explode("," , $ser_id);
			$level=count($selected);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$level;$i++)
			{
				$id=$selected[$i];	
                
				
				
				$fet1 = DB::table('subservices')
								 ->where('subid', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->subname.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}		
			
			$bookid= $viewbook[0]->book_id;
			$newbook = DB::table('shop')
								 ->where('shop_id', '=', $viewbook[0]->shop_id)
								 ->get();
								 
			$user_detail = DB::table('users')
								 ->where('id', '=', $viewbook[0]->book_user_id)
								 ->get();					 

	   
	   $shop_name = $newbook[0]->name;
	   $book_date = $viewbook[0]->book_date;
	   $book_time = $viewbook[0]->book_time;
	   
	   $book_email = $viewbook[0]->book_email;
	   $book_address = $viewbook[0]->book_address;
	   $book_city = $viewbook[0]->book_city;
	   $book_pincode = $viewbook[0]->book_pincode;
	   $total_amount = $viewbook[0]->total_amount;
	   $submit_date = $viewbook[0]->submit_date;
	   
	   $toaddress = $viewbook[0]->book_email;
	   
	   
	   $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	   
	   $url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
	   
	   
	   if($booker!="")
		{
			
			
			DB::update('update booking set payment_status="paid" where book_id = ?', [$booker]);
			
					
						
						
				        
						Mail::send('admin/book_mail', ['shop_name' => $shop_name, 'ser_name' => $ser_name, 'book_date' => $book_date, 'book_time' => $book_time, 'book_email' => $book_email,'book_address' => $book_address, 'book_city' => $book_city, 'book_pincode' => $book_pincode, 'total_amount' => $total_amount, 'submit_date'=> $submit_date, 'site_logo' => $site_logo, 'site_name' => $site_name], function ($message) use ($toaddress)
					{
						$message->subject('Your payment approved successfully');
						
						$message->from(Auth::user()->email, 'Admin');

						$message->to($toaddress);

					});
						
			
					
			
		}
		
		
	   
	   
	   
   }
   
   
   
   
   
   
   
   
	
}