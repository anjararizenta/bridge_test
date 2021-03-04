<!DOCTYPE html>
<html lang="en">
<head>

   

   @include('style')
	




</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

    

	
    
	<section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Withdrawal Settings</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
	
	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	 
	 
	 <section class="probootstrap-section">
        <div class="container">
        
        
        
        
        
        
        <div class="col-md-12">
        
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
        <div class="col-md-9 well admin-content" id="account_settings">
            
            <form class="form-horizontal" role="form" method="POST" action="{{ route('withdrawal-settings') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="height20"></div>
                        
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Select Payment Method</label>

                            <div class="col-md-6">
                               <select name="payment_type" id="withdraw_payment_type" class="form-control validate[required] text-input radiusoff">
							  
							  <option value="">Select</option>
							   <option value="paypal" <?php if($edit_users[0]->withdraw_payment_type=="paypal"){?> selected <?php } ?>>Paypal</option>
							   <option value="stripe" <?php if($edit_users[0]->withdraw_payment_type=="stripe"){?> selected <?php } ?>>Stripe</option>
							</select>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="form-group" id="withdraw_paypal_id" <?php if($edit_users[0]->withdraw_payment_type!="paypal"){?> style="display:none;" <?php } ?>>
                            <label for="name" class="col-md-4 control-label">Your Paypal Id</label>

                            <div class="col-md-6">
                                <input id="paypal_id" type="text" class="form-control validate[required] text-input radiusoff" name="paypal_id" value="<?php echo $edit_users[0]->withdraw_paypal_id;?>">

                               
                            </div>
                        </div>

                        
                       
                        <div class="form-group" id="withdraw_stripe_id" <?php if($edit_users[0]->withdraw_payment_type!="stripe"){?> style="display:none;" <?php } ?>>
                            <label for="name" class="col-md-4 control-label">Your Stripe Id</label>

                            <div class="col-md-6">
                                <input id="stripe_id" type="text" class="form-control validate[required] text-input radiusoff" name="stripe_id" value="<?php echo $edit_users[0]->withdraw_stripe_id;?>">

                               
                            </div>
                        </div>
                        
                        
                        
                        
						
						
						
						
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
            
            
        </div>
        
        
        <?php /*?><div class="col-md-9 well admin-content" id="Profile">
            Widgets
        </div>
        <div class="col-md-9 well admin-content" id="Activity">
            Pages
        </div>
        <div class="col-md-9 well admin-content" id="Devices">
            Charts
        </div>
        <div class="col-md-9 well admin-content" id="Messaging">
            Table
        </div>
        <div class="col-md-9 well admin-content" id="InstallationJobs">
            Forms
        </div><?php */?>
        
    </div>


     
     
     
     
	 
	 
	 
	 
	 
    


	 
	 
	  
            
            
            
        </div>
   
    </section>



      @include('footer')
</body>
</html>