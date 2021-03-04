<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Mail;
use Illuminate\Support\Facades\DB;

class AddnewsletterController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function formview()

    {
       
	   $set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->get();
		
		$data=array('setting' => $setting, 'admindetails' => $admindetails);
	   
        return view('admin.sendupdates')->with($data);

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	 
    protected function addupdatedata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'nsubject' => 'required'

        		

        		
				
				

        	]);
         
		 
				
		
		
		$input['nsubject'] = Input::get('nsubject');
      
		
		 $data = $request->all();
		$rules = array(
        
       
		
       
		
        );
		
		
		$messages = array(
            
            
			
        );

		
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{ 
		
		
		
		

		$nsubject=$data['nsubject'];
		$msg=$data['message'];
		$admin_email = $data['admin_email'];
		$site_logo = $data['site_logo'];
		$site_url = $data['site_url'];
		$site_name = $data['site_name'];
		
		
		$newsletter = DB::table('newsletter')->where('activated', '=', '1')->get();	
		
		foreach($newsletter as $letter)
		{	
		$to_address = $letter->email;
		
		$datas = [
            'nsubject' => $nsubject, 'msg' => $msg, 'site_logo' => $site_logo, 'site_url' => $site_url, 'site_name' => $site_name
        ];
		
		
		
		
		Mail::send('admin.newsletteremail', $datas , function ($message) use ($admin_email,$to_address)
        {
            $message->subject('Newsletter Subscription');
			
            $message->from($admin_email, 'Admin');

            $message->to($to_address);

        }); 
		
		
		
		}
		
		
			
			
			return redirect()->back()->with('success', 'Email has been sent successfully');
        }
		
		
		
		
    }
}
