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
                <h1 class="probootstrap-heading probootstrap-animate">Donate<?php if(!empty($campaign_count)){?><span><?php echo $campaign[0]->camp_title;?></span><?php } ?></h1>
              </div>
            </div>
          </div>
        </div>
      </section>
     

    
    <?php if(!empty($campaign_count)){?>
	
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
        
        
          <div class="row probootstrap-gutter60">

            

            <div class="col-md-8 col-sm-8 probootstrap-animate">
              
              
              <div class="row">
                <div class="col-md-12">
                  
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('donate') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="height20"></div>


                         <div class="form-group">
                            <label for="donate_amount" class="col-md-4 control-label">Enter your donation</label>

                            <div class="col-md-8">
                                <input id="donate_amount" type="text" class="form-control validate[required] text-input radiusoff" name="donate_amount" value="" placeholder="Minimum amount <?php echo $settings[0]->min_amt_donation;?> <?php echo $settings[0]->site_currency;?>">

                               
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control validate[required] text-input radiusoff" name="name" value="<?php echo $full_name;?>">

                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff"  name="email" value="<?php echo $email_details;?>">

                                
                            </div>
                        </div>
                       
                       
                        

                        
						
						
						
						 <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control validate[required] text-input radiusoff" value="<?php echo $phones;?>" name="phone">
								
                            </div>
                        </div>
						
						
						
						
                        
                        
                        
                         <div class="form-group">
                            <label for="gender" class="col-md-4 control-label para black">Country</label>

                            <div class="col-md-8">
							<select name="country" class="form-control validate[required] radiusoff">
							  
							  <option value=""></option>
							  <?php foreach($countries as $country){?>
                              <option value="<?php echo $country;?>" <?php if($countrry==$country){?> selected <?php } ?>><?php echo $country;?></option>
                              <?php } ?>
							</select>
                               
                            </div>
                        </div>
						
						<input type="hidden" name="donator_user_id" value="<?php echo $user_id;?>">
						
						
						 <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Postal Code</label>

                            <div class="col-md-8">
                                <input id="postcode" type="text" class="form-control validate[required] text-input radiusoff" value="" name="postcode">
								
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Write a brief comment</label>

                            <div class="col-md-8">
                                <textarea id="write_comment" class="form-control radiusoff" value="" name="write_comment"></textarea>
								
                            </div>
                        </div>
						
						
            <?php
            $option = explode (",", $settings[0]->payment_option);
            ?>
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Select Payment Mode</label>

                            <div class="col-md-8">
                                <select id="payment_type" name="payment_type" class="form-control radiusoff validate[required]">
            <option value="">None</option>
            <?php 
            
            
            foreach($option as $withdraw){
                
                ?>
            <option value="<?php echo $withdraw;?>"><?php echo $withdraw;?></option>
            <?php } ?>
        </select>
								
                            </div>
                        </div>
                        
                        <input type="hidden" name="camp_id" value="<?php echo $id;?>">
						
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							
							<?php if(Auth::guest()) {?>
                            
                                <button type="submit" class="btn btn-primary">
                                    DONATE NOW
                                </button>
                                
                                <?php } else { ?>
                                
                                
                                <?php if($campaign[0]->camp_user_id!=Auth::user()->id){?>
                                
                                 <button type="submit" class="btn btn-primary">
                                    DONATE NOW
                                </button>
                                
                                <?php } } ?>
							
                            </div>
                        </div>
                    </form>
                  
                </div>
                
              </div>
              
             

            </div>
            
            
            <div class="col-md-4 col-sm-4 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                
                <div class="probootstrap-cause-inner">
                   <div class="row mtp30" align="center">
                  <?php if(!empty($user_details[0]->photo)){?>
                  <img src="<?php echo $url;?>/local/images/media/<?php echo $user_details[0]->photo;?>" alt="<?php echo $user_details[0]->name;?>" class="img-responsive user_round"><?php } else { ?>
                  <img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="<?php echo $user_details[0]->name;?>" class="img-responsive user_round">
                  <?php } ?>
                  <span><strong>Organizer :-</strong> <?php echo $user_details[0]->name;?></span>
                  </div>
                  
                  <?php if($percentage_value >= 100){ $color_class = "progress-green"; $percent_value = 100; } else { $color_class = "progress-bar"; $percent_value = $percentage_value; } ?>
                  <div class="progress">
                    <div class="<?php echo $color_class;?> progress-bar-s2" data-percent="<?php echo $percent_value;?>"></div>
                  </div>
                  
                 
                  

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money"><?php echo $raised;?> <?php echo $settings[0]->site_currency;?></span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money"><?php echo $campaign[0]->camp_goal;?> <?php echo $settings[0]->site_currency;?> </span></div>
                  </div>
                  
                  
                  <p>
                  <?php if(!empty($campaign[0]->camp_image)){?>
                  <a href="<?php echo $url;?>/local/images/media/<?php echo $campaign[0]->camp_image;?>" class="image-popup"><img src="<?php echo $url;?>/local/images/media/<?php echo $campaign[0]->camp_image;?>" alt="<?php echo $campaign[0]->camp_title;?>" class="img-responsive"></a>
                  <?php } else {?>
                  <img src="<?php echo $url;?>/local/images/noimage.jpg" alt="<?php echo $campaign[0]->camp_title;?>" class="img-responsive">
                  <?php } ?>
                  </p>
                  
                  
                  <h2><a href="<?php echo $url;?>/category/<?php echo $category[0]->id;?>/<?php echo $category[0]->post_slug;?>">Category :- <span class="theme_color"><?php echo $category[0]->cat_name;?></span></a></h2>
                  <div class="probootstrap-date"><i class="icon-map-pin theme_color"></i> <?php echo $campaign[0]->camp_location;?></div>  
                  <div class="probootstrap-date"><i class="icon-calendar3 theme_color"></i> <?php echo date("M d, Y", strtotime($campaign[0]->camp_date));?></div> 
                  <?php if(!empty($campaign[0]->camp_finish)){?>
                  <p><span class="btn btn-primary default_cursor">Campaign Ended!</span></p>
                  <?php } else {?>
                  
                  <?php } ?>
                </div>
              </div>
            </div>
            
            

          </div>
        </div>
      </section>

      
      

	<?php } ?>
	
	
	
	
	
	
	
	

      <div class="height50 clearfix"></div>
	   

      @include('footer')
</body>
</html>