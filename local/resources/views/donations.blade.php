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
                <h1 class="probootstrap-heading probootstrap-animate">My Donations</h1>
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
                    
                        
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="balance_heading">
                                            <th>SNo</th>
                                            <th width="10%">Campaign</th>
                                            <th>Fullname</th>
											
											<th>Email</th>
                                            <th>Donation</th>
											<th>Payment Type</th>
                                            <th>Date</th>
											
											<th>Payment Status</th>
                                           
                                        </tr>
                                    </thead>
									<tbody>
									<?php
									if(!empty($checkout_count))
									{
										$sno=1;
										
										foreach($checkout as $row)
										{
											
											
											
										$campaigns_count = DB::table('campaigns')
																								
													->where('camp_id','=', $row->camp_id)
													
													
													->count();
										
										if(!empty($campaigns_count))
										{
										$campaigns = DB::table('campaigns')
																								
													->where('camp_id','=', $row->camp_id)
													
													
													->get();
													
										$campp_id = $row->camp_id;
										$campp_slug = $campaigns[0]->camp_slug;
										$camp_title = $campaigns[0]->camp_title;			
										
										}
										else
										{
										$campp_id = 0;
										$campp_slug = "";
										$camp_title = "";
										}
										
										if($row->payment_status=="completed"){ $status = "Completed"; $color ="#0DB053"; } else if($row->payment_status=="pending"){  $status = "Pending"; $color ="#CB2027"; } 
										
										?> 					
										<tr>
											<td><?php echo $sno; ?></td>
                                            
											<td>
                                            
                                            <?php if(!empty($campp_id)){?>
                                            
                                            <a href="<?php echo $url;?>/campaign/<?php echo $campp_id;?>/<?php echo $campp_slug;?>"><?php echo $camp_title;?></a>
                                            <?php } else { ?>
                                            <?php echo $camp_title;?>
                                            <?php } ?>
                                            
                                            </td>
											<td><?php echo $row->fullname;?></td>
                                            <td><?php echo $row->email;?></td>	
											<td><?php echo $row->amount;?> <?php echo $settings[0]->site_currency;?></td>	
                                            <td><?php echo $row->payment_type;?></td>
											<td><?php echo date('d M,Y', strtotime($row->payment_date));?></td>	
                                               
											<td style="color:<?php echo $color;?>; font-weight:bold;"><?php echo $status;?></td>											
											
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