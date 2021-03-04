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
    <h1>Withdrawals</h1>
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
            <h5>Withdrawals</h5>
          </div>
          
          
          <div class="widget-content nopadding">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                         
                        
                         <th>SNo</th>
                                            <th>Campaign</th>
                                            <th>Username</th>
											
											<th>Email</th>
                                            <th>Amount</th>
											<th>Date</th>
                                            <th>Payment Type</th>
                                             <th>Payment ID</th>
											
											<th>Payment Status</th>
                          
                         </tr>
                         
                         
                         
                         
                         
                         
              </thead>
              <tbody>
            <?php
									if(!empty($withdrawal_count))
									{
									
									    $withdrawal = DB::table('withdrawal')
		                                              ->get();
										$sno=1;
										
										foreach($withdrawal as $row)
										{
											
											
										$userdetails_count = DB::table('users')
													   ->where('id','=',$row->user_id)
													   ->count();
													   
										if(!empty($userdetails_count))
										{			   
										$userdetails = DB::table('users')
													   ->where('id','=',$row->user_id)
													   ->get();	
													   
										$name = $userdetails[0]->name;
										$email = $userdetails[0]->email;			   
										}
										else
										{
										$name = "";
										$email = "";
										}			   
													   
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
											<td><?php echo $name;?></td>
                                            <td><?php echo $email;?></td>	
											<td><?php echo $row->amount;?> <?php echo $settings[0]->site_currency;?></td>	
                                            
											<td><?php echo date('d M,Y', strtotime($row->withdraw_date));?></td>	
                                            <td><?php echo $row->withdraw_payment_type;?></td>
                                            <td><?php echo $row->withdraw_payment_id;?></td>
											<td>
                                            <?php if($row->withdraw_status=="pending"){?>
                                            
											 <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-success">Make as complete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/withdrawals/{{ $row->wid }}/{{ $row->camp_id }}" class="btn btn-success">Make as complete</a>
						  
				  <?php } ?>
                                    <?php } if($row->withdraw_status=="completed"){ ?>
                                    <span style="color:#009900;">Completed</span>
											<?php } ?>
											</td>											
											
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
