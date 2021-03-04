<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EditportfolioController extends Controller
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
    
	
	public function showform($id) {
      $portfolio = DB::select('select * from portfolio where id = ?',[$id]);
      return view('admin.edit-portfolio',['portfolio'=>$portfolio]);
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
            'slide_title' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	 
	 public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}  
	 
    protected function portfoliodata(Request $request)
    {
       
	   
	   $data = $request->all();
	   
	   
	   $this->validate($request, [

        		'title' => 'required'

        		
				
				

        	]);
         
		 
				
		
       
	    $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $imgtype=$settings[0]->image_type;
	   
		
		$rules = array(
		
		'title' => 'required',
		
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
		 

		
		$currentphoto=$data['currentphoto'];
	
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
			 $namef=$currentphoto;
		 }
	
	
	
	
	
	
	
		  

			
		
		
		
		
		
		
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
		
		$id=$data['id'];
		
		
		
			
			
		
		DB::update('update portfolio set title="'.$title.'",post_slug="'.$this->clean($title).'",content="'.$content.'",client="'.$client.'",site_url="'.$site_url.'",photo="'.$namef.'",submit_date="'.$site_date.'" where id = ?', [$id]);
		
			return back()->with('success', 'Portfolio has been updated');
		
		
			
			
			
        }
		
		
	   
	   
		
		
    }
}
