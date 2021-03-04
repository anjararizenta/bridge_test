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
    <h1>Donations</h1>
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
            <h5>Donations</h5>
          </div>
          
          
          <div class="widget-content nopadding">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                         
                        
                         <th>SNo</th>
                                            <th>Campaign</th>
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
                                            
                                            <a href="<?php echo $url;?>/campaign/<?php echo $campp_id;?>/<?php echo $campp_slug;?>" target="_blank" style="color:#0033FF;"><?php echo $camp_title;?></a>
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
          
        </div>
   
  
  
  
   
		 </div>
         </div>
         </div>
         
         
         </div>
    
    
    
    
    

    
	@include('admin.footer')
  </body>
</html>
