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

class PortfolioController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $portfolio = DB::table('portfolio')
		                ->orderBy('id','desc')
					   ->get();

        return view('admin.portfolio', ['portfolio' => $portfolio]);
    }
	
	
	public function destroy($id) {
		
		$image = DB::table('portfolio')->where('id', $id)->first();
		$orginalfile=$image->photo;
		$photo="/media/";
       $path = base_path('images'.$photo.$orginalfile);
	  File::delete($path);
      DB::delete('delete from portfolio where id = ?',[$id]);
	   
      return back();
      
   }
   
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $portid = $data['portid'];
	   
	   foreach($portid as $pid)
	   {
   
   
		  $image = DB::table('portfolio')->where('id', $pid)->get();
			$orginalfile=$image[0]->photo;
			$userphoto="/media/";
		   $path = base_path('images'.$userphoto.$orginalfile);
		  File::delete($path);
		  
		  
		  
		  DB::delete('delete from portfolio where id = ?',[$pid]);
		   
		  
      
        }
   return back();
   }
   
   
	
}