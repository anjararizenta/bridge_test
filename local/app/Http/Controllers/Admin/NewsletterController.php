<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $newsletters = DB::table('newsletter')
		         ->orderBy('id','desc')
				 ->get();

        return view('admin.newsletter', ['newsletters' => $newsletters]);
    }
	
	
	 public function status($status,$id,$sid) {
	 
	 DB::update('update newsletter set activated="'.$sid.'" where id = ?',[$id]);
	 return back();
	 }
	
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $nid = $data['nid'];
	   
	   foreach($nid as $pid)
	   {
	   
           DB::delete('delete from newsletter where id = ?',[$pid]);
	   
      	   
	   
	   }
	   return back();
	   
	 }
	
	
	
	
	public function destroy($id) {
		
		
	  
		
	 
	  
      DB::delete('delete from newsletter where id = ?',[$id]);
	   
      return back();
      
   }
	
}