<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    

    
    
     <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">My Campaigns</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
	
	
	
	
	
	
	
	
	
	<section class="probootstrap-section">
        <div class="container">



        <div class="row">
        
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
	 
     </div>



            	

                <div class="row">
        <div class="col-md-3">
            @include('profile_menu')
        </div>
       

                	<div class="col-md-9">
    
    
			<div id="page-inner"> 
                  <div class="row">
                  <?php if($settings[0]->commission_mode=="fixed") { $data_cmt = $settings[0]->commission_amt.' '.$settings[0]->site_currency; }
				  
                  if($settings[0]->commission_mode=="percentage") { $data_cmt = $settings[0]->commission_amt.'%'; }
				  ?>
                    <div>
                    * Site Owner / Admin Commission is : <?php echo $data_cmt;?> ( per every donation )
                    </div>
                        
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="balance_heading">
                                            <th>SNo</th>
                                            <th>Image</th>
											<th width="10%">Title</th>
											<th>Category</th>
                                            <th>Funds Raised</th>
											<th>Goal</th>
                                            <th>Date</th>
											
											<th>Status</th>
                                            <th>Actions</th>
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
											<td><?php echo $category_data;?></td>
                                            <td><?php echo $user_raised;?> <?php echo $settings[0]->site_currency;?></td>	
											<td><?php echo $row->camp_goal;?> <?php echo $settings[0]->site_currency;?></td>	
											<td><?php echo date('d M,Y', strtotime($row->camp_date));?></td>	
                                               
											<td style="color:<?php echo $color;?>; font-weight:bold;"><?php echo $status;?></td>											
											<td>
                                            <?php if($row->camp_finish==0){?>
                                            <a href="<?php echo $url;?>/edit-campaign/<?php echo base64_encode($row->camp_id);?>"><img src="<?php echo $url;?>/local/images/edit.png" border="0" alt="edit" /></a>
                                            <?php if(empty($raised)){?>
                                            <a href="<?php echo $url;?>/campaigns/status/<?php echo base64_encode($row->camp_id);?>/<?php echo base64_encode($raised);?>" onClick="return confirm('Are you sure you want to delete');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a>
                                            <?php } ?>
                                            <?php } if($row->camp_finish==1 && $raised!=0){ ?>
                                            <a href="<?php echo $url;?>/campaigns/status/<?php echo base64_encode($row->camp_id);?>/withdraw/<?php echo base64_encode($user_raised);?>" class="btn btn-success">Make Withdraw</a>
                                            <?php } if(empty($raised) && $row->camp_finish){ ?>
                                            <span class="bold">Finalized</span>
                                            <?php } if($row->camp_finish==2 && $row->camp_status==2){ ?>
                                            <span class="theme_color bold">Pending to pay</span>
                                            <?php } ?>
                                            
                                             <?php  if($row->camp_finish==3 && $row->camp_status==2){ ?>
                                            <span class="green bold">Paid</span>
                                            <?php } ?>
                                            </td>
										</tr>
										<?php $sno++; } } ?>		
									</tbody>
															
                                </table>
                            </div>
                        
                   
                    <!--End Advanced Tables -->
               
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
        
        
        </div>
        
        
        
	
    
    
	</div>
	
	
	

     </section>
    

      @include('footer')
</body>
</html>