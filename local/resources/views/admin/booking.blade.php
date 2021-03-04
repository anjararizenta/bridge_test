<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
    @include('admin.table-style')
    
  </head>

  <body>
  @include('admin.top')

@include('admin.menu')
<?php $url = URL::to("/"); ?>
  
  
  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb">  </div>
    <h1>Booking History</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
      @if(Session::has('error'))
      <div class="alert alert-error">
              <button class="close" data-dismiss="alert"><i class="icon-off"></i></button>
              {{ Session::get('error') }}
              </div>
      @endif
      
      @if(Session::has('success'))

	           
        <div class="alert alert-success">
              <button class="close" data-dismiss="alert"><i class="icon-off"></i></button>
               {{ Session::get('success') }}
              </div>

	@endif


<form action="{{ route('admin.booking') }}" method="post">
                 
                 {{ csrf_field() }}
                 <div align="right">
                  <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
				 
                 </div>
<div class="widget-box">
           

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Booking History</h5>
          </div>
          
          
          <div style="overflow-x:scroll !important; width:100% !important;">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                          <th>
          <input type="checkbox" id="selectAll" class="main"></th>
                        
                          <th>Sno</th>
                          
                          <th>Shop Name</th>
						  
                          <th>Service Name</th>
                          
                          <th>Booking Date</th>
                          
                                                 
                          <th>Booking Time</th>
                          
                          <th>User Phone No</th>
                          
                          <th>Username</th>
                          
                          <th>Email</th>
                          
                           <th>Address</th>
                           
                            <th>City</th>
                            
                            <th>Pin Code</th>
                            
                             <th>Total Amount <span style="color:#0033CC;">(without commission)</span></th>
                             
                              <th>Payment Type</th>
                          
                           <th>Payment Approval?</th>
                          
                          
                          
						  <th>Status</th>
                          
                          
                          
                          <th>Action</th>
                          
                         </tr>
                         
                         
                         
                         
              </thead>
              <tbody>
            <?php 
					  $sn=1;
					  foreach ($booking as $viewbook) {
						  
					$booking_time=$viewbook->book_time;
							if($booking_time>12)
							{
								$final_time=$booking_time-12;
								$final_time=$final_time."PM";
							}
							else
							{
								$final_time=$booking_time."AM";
							}


					$ser_id=$viewbook->services_id;
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
			
			$bookid= $viewbook->book_id;
			$newbook = DB::table('booking')
								 ->where('book_id', '=', $bookid)
								 ->get();
								 
			$user_detail = DB::table('users')
								 ->where('id', '=', $viewbook->book_user_id)
								 ->get();					 

					  ?>
    
                      
                      <tr  class="gradeX">
                        
                        <td><input type="checkbox" name="nid[]" value="<?php echo $viewbook->book_id;?>"/></td>
                        
						 <td><?php echo $sn; ?></td>
						 
                          <td><?php echo $viewbook->name;?></td>
                         
                          <td><?php echo $ser_name;?></td>
                          
                          <td><?php echo $viewbook->book_date;?></td>
						 
						  
                          <td><?php echo $final_time;?></td>
                          
                          <td><?php echo $viewbook->phone;?></td>
                          
                           <td><?php echo $user_detail[0]->name;?></td>
                           
                           
                           <td><?php echo $viewbook->book_email;?></td>
                           
                            <td><?php echo $viewbook->book_address;?></td>
                          
                          
						<td><?php echo $viewbook->book_city;?></td>
						   
						   <td><?php echo $viewbook->book_pincode;?></td>
						   
						   
						   <td><?php echo $viewbook->total_amount.' '.$setting[0]->site_currency;?></td>
						   
						   <td><?php echo $viewbook->payment_type;?></td>
                           
                           
                           <td><?php if($viewbook->payment_approval==2){?><a href="<?php echo $url;?>/admin/booking/action/{{ $viewbook->book_id }}/<?php echo $viewbook->book_user_id;?>" class="btn btn-primary"> Yes</a><?php } ?>
                           
                           <?php if($viewbook->payment_approval==1){?><span style="cursor:default;color:#009900;font-weight:bold;">Approved</span><?php } ?>
                           
                           
                           </td>
                           
                        
                         <?php if($newbook[0]->payment_status=="pending"){ $color="btn btn-danger";  } else if($newbook[0]->payment_status=="paid")  { $color="btn btn-success"; }?> 
						   <td style="color:<?php echo $color;?>;">
						   <?php if($newbook[0]->payment_status=="pending"){?>
                           <a href="<?php echo $url;?>/admin/booking/action/{{ $viewbook->book_id }}" class="<?php echo $color;?>"> <?php echo $newbook[0]->payment_status;?></a>
                           <?php } else {?>
						   <span style="cursor:default;color:#009900;font-weight:bold;"><?php echo $newbook[0]->payment_status;?></span><?php } ?></td>
                        
                        
                        
                        
                        
                          
                          <td>
                          
                          
						  
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/booking/{{ $viewbook->book_id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						  
				  <?php $sn++;} ?>
						  </td>
                        </tr>
                      
                      
                    
                <?php $sn++; } ?>
                                
              </tbody>
            </table>
           
          </div>
          
        </div>
   </form>
  
  
  
   
		 </div>
         </div>
         </div>
         
         
         </div>
  
  
    
	@include('admin.footer')
  </body>
</html>
