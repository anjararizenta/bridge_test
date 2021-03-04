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
    <h1>Campaigns</h1>
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



                
<div class="widget-box">
           

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Campaigns</h5>
          </div>
          
          
          <div class="widget-content nopadding">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                         
                        
                        <th>SNo</th>
                                            <th>Image</th>
											<th>Title</th>
                                            <th>Username</th>
											<th>Category</th>
                                            <th>Funds Raised</th>
											<th>Goal</th>
                                            <th>Date</th>
											
											<th>Status</th>
                                            <?php /* ?><th>Actions</th><?php */?>
                          
                         </tr>
                         
                         
                         
                         
                         
                         
              </thead>
              <tbody>
             <?php
									if(!empty($campaigns_count))
									{
										$sno=1;
										
										foreach($campaigns as $row)
										{
											
											
											if($row->camp_status==1){ $status = "Active"; $color ="#0DB053"; } else if($row->camp_status==0){  $status = "InActive"; $color ="#CB2027"; } else if($row->camp_status==2){ $status = "Finalized"; $color = "#0465E3"; }
										
										
										$category_cnt = DB::table('category')
		        									->where('id', '=' , $row->camp_category)	
									 			    ->count();	
										
										if(!empty($category_cnt))
										{
										$category_view = DB::table('category')
		        									->where('id', '=' , $row->camp_category)	
									 			    ->get();			
										$category_data = $category_view[0]->cat_name;
										}
										else
										{
										 $category_data = "";
										}
										
										
										
										
										$campid = $row->camp_id;
										$check_count = DB::table('checkout')
												 ->where('camp_id', '=', $campid)
												 ->where('payment_status','=','completed')
												 ->count();
												 
										if(!empty($check_count))
										{
											$checkr = DB::table('checkout')
												 ->where('camp_id', '=', $campid)
												 ->where('payment_status','=','completed')
												 ->get();
											$percent_value = 0;
											$user_percent = 0;	 
											foreach($checkr as $value){  
											$percent_value += $value->amount;
											$user_percent += $value->user_amount;
											 }
											$raised = $percent_value;
											$user_raised = $user_percent;
												 
										}
										else
										{
										   $raised = 0;
										   $user_raised = 0;
										}	
										
										$x = $raised;
										$total = $row->camp_goal;
										$percentage = ($x*100)/$total;	 
										$percentage_value = round($percentage,2);
										
										
										$user_count = DB::table('users')
												 ->where('id', '=', $row->camp_user_id)
												 
												 ->count();
										if(!empty($user_count))
										{
										
										$user_details = DB::table('users')
												 ->where('id', '=', $row->camp_user_id)
												 
												 ->get();
												 
										$username = $user_details[0]->name;		 
										
										}
										else
										{
										 $username = "";
										}
										
										
										?> 					
										<tr>
											<td><?php echo $sno; ?></td>
                                            <td>
											<?php if(!empty($row->camp_image)){?>
                                            <a href="<?php echo $url;?>/campaign/<?php echo $row->camp_id;?>/<?php echo $row->camp_slug;?>"><img src="<?php echo $url;?>/local/images/media/<?php echo $row->camp_image;?>" border="0" width="50"></a>
                                            <?php } else {?>
                                            <a href="<?php echo $url;?>/campaign/<?php echo $row->camp_id;?>/<?php echo $row->camp_slug;?>"><img src="<?php echo $url;?>/local/images/noimage_box.jpg" width="50" border="0"></a>
                                            <?php } ?>
											</td>
											<td><a href="<?php echo $url;?>/campaign/<?php echo $row->camp_id;?>/<?php echo $row->camp_slug;?>"><?php echo $row->camp_title;?></a></td>
                                            
                                            <td><?php echo $username;?></td>
                                            
											<td><?php echo $category_data;?></td>
                                            <td><?php echo $user_raised;?> <?php echo $settings[0]->site_currency;?></td>	
											<td><?php echo $row->camp_goal;?> <?php echo $settings[0]->site_currency;?></td>	
											<td><?php echo date('d M,Y', strtotime($row->camp_date));?></td>	
                                               
											<td style="color:<?php echo $color;?>; font-weight:bold;"><?php echo $status;?></td>											
											<?php /*?><td>
                                            <?php if($row->camp_finish==0){?>
                                            <a href="<?php echo $url;?>/edit-campaign/<?php echo base64_encode($row->camp_id);?>"><img src="<?php echo $url;?>/local/images/edit.png" border="0" alt="edit" /></a>
                                            <?php if(empty($raised)){?>
                                            <a href="<?php echo $url;?>/campaigns/status/<?php echo base64_encode($row->camp_id);?>/<?php echo base64_encode($raised);?>" onClick="return confirm('Are you sure you want to delete');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a>
                                            <?php } ?>
                                            <?php } if($row->camp_finish==1 && $raised!=0){ ?>
                                            <a href="<?php echo $url;?>/campaigns/status/<?php echo base64_encode($row->camp_id);?>/withdraw/<?php echo base64_encode($user_raised);?>" class="btn btn-success">Make Withdraw</a>
                                            <?php } if(empty($raised)){ ?>
                                            Finalized
                                            <?php } if($row->camp_finish==2 && $row->camp_status==2){ ?>
                                            <span class="theme_color">Waiting for approval</span>
                                            <?php } ?>
                                            </td><?php */?>
										</tr>
										<?php $sno++; } } ?>	
                                
              </tbody>
            </table>
           
          </div>
          
        </div>
   
  
  
  
   
		 </div>
         </div>
         </div>
         
         
         </div>
    
    
    
    
    

    
	@include('admin.footer')
  </body>
</html>
