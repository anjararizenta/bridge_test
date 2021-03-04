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
use Illuminate\Support\Facades\DB;

class AddportfolioController extends Controller
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

        return view('admin.add-portfolio');

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
	 
	 /* protected $fillable = ['name', 'email','password','phone']; */
	 
	 
	 public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	 
	 
	 
	 
    protected function addportfoliodata(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'title' => 'required'

        		
				
				

        	]);
         
		 
				
		
       
	    $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $imgtype=$settings[0]->image_type;
	   
		
		$rules = array(
		
		'title' => 'unique:portfolio,title',
		
		'photo' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
		
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
		 

		
	
	
	     $image = Input::file('photo');
		 if($image!="")
		 {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $photo="/media/";
            $path = base_path('images'.$photo.$filename);
			$destinationPath=base_path('images'.$photo);
 
        
               /*Image::make($image->getRealPath())->resize(1600, 1200)->save($path);*/
				 Input::file('photo')->move($destinationPath, $filename);
               /* $user->image = $filename;
                $user->save();*/
				$namef=$filename;
		 }
		 else
		 {
			 $namef="";
		 }
	
	
	
	
	
	
	
		  $data = $request->all();

			
		
		
		
		
		
		
		if(!empty($data['title']))
		{
		   $title = $data['title'];
		}
		else
		{
		   $title = "";
		}
		
		if(!empty($data['content']))
		{
		   $content = $data['content'];
		}
		else
		{
		   $content = "";
		}
		
		if(!empty($data['client']))
		{
		   $client = $data['client'];
		}
		else
		{
		   $client = "";
		}
		
		
		if(!empty($data['site_url']))
		{
		   $site_url = $data['site_url'];
		}
		else
		{
		   $site_url = "";
		}
		
		
		if(!empty($data['site_date']))
		{
		   $site_date = $data['site_date'];
		}
		else
		{
		   $site_date = "";
		}
		
		$status = 1;
		
		
		DB::insert('insert into portfolio (	title, post_slug, content, client, site_url, photo, submit_date, status) values (?, ? ,?, ?, ?, ?, ?, ?)', [$title,$this->clean($title),$content,$client,$site_url,$namef,$site_date,$status]);
		
		
			return back()->with('success', 'Portfolio has been created');
        }
		
		
		
		
    }
}
