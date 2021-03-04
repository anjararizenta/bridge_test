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
    <h1>Completed Withdraw</h1>
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


<form action="" method="post">
                 
                 {{ csrf_field() }}
                 
<div class="widget-box">
           

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Completed Withdraw</h5>
          </div>
          
          
          <div style="overflow-x:scroll !important; width:100% !important;">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                          
                        
                           <th>SNo</th>
                           <th>Shop Name</th>
                           <th>Username</th>
                           
											<th>Amount</th>
											<th>Payment Type</th>
											<th>Paypal Id</th>
                                            <th>Stripe Id</th>
                                            <th>Bank Account No</th>
                                            <th>Bank Info</th>
                                            <th>IFSC Code</th>
                                            <th>Status</th>
                          
                          
                          
                          
                          
                         </tr>
                         
                         
                         
                         
              </thead>
              <tbody>
            <?php if(!empty($complete_withdraw_cnt)){?>
                      
                        
                        
                        
                        
                                        <?php 
										$i=1;
										foreach($complete_withdraw as $view_withdraw){
										
										$userdetails = DB::table('users')
													   ->where('id','=',$view_withdraw->user_id)
													   ->get();
										$shopdetails = DB::table('shop')
													   ->where('shop_id','=',$view_withdraw->shop_id)
													   ->get();			   
													   
										?>								
										<tr  class="gradeX">
											<td><?php echo $i;?></td>
                                            <td><?php echo $shopdetails[0]->name;?></td>
                                            <td><?php echo $userdetails[0]->name;?></td>
											<td><?php echo $setting[0]->site_currency.$view_withdraw->withdraw_amount;?></td>
											<td><?php echo $view_withdraw->withdraw_payment_type;?></td>	
											<td><?php echo $view_withdraw->paypal_id;?></td>	
												
											<td><?php echo $view_withdraw->stripe_id;?></td>											
											<td><?php echo $view_withdraw->bank_account_no;?></td>
                                            <td><?php echo $view_withdraw->bank_info;?></td>
                                            <td><?php echo $view_withdraw->bank_ifsc;?></td>
                                            <td style="color:#1BC91B; font-weight:bold;"><?php echo $view_withdraw->withdraw_status;?></td>
                                            
                   
										</tr>
                                     <?php $i++; } ?>  
									<?php } ?>		
                        
                        
                          
                         
                      
                      
                    
               
                                
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
