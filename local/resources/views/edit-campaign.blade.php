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
                <h1 class="probootstrap-heading probootstrap-animate">Edit Campaign</h1>
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
            
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edit-campaign') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="height20"></div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Campaign Title</label>

                            <div class="col-md-6">
                                <input id="camp_title" type="text" class="form-control validate[required] text-input radiusoff" name="camp_title" value="<?php if(!empty($campaigns_count)){ echo $campaigns[0]->camp_title; } ?>">

                               
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Choose Category</label>

                            <div class="col-md-6">
                               <select name="camp_category" class="form-control validate[required] text-input radiusoff">
							  
							  <option value=""></option>
							   <?php if(!empty($category_count)){?>
                               <?php foreach($category as $categories){?>
                               <option value="<?php echo $categories->id;?>" <?php if(!empty($campaigns_count)){ if($campaigns[0]->camp_category==$categories->id){?> selected <?php } } ?>><?php echo $categories->cat_name;?></option>
                               <?php } ?>
							   <?php } ?>
							</select>

                               
                            </div>
                        </div>

                        				
                                        
                          <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Campaign Goal - (<?php echo $settings[0]->site_currency;?>)</label>

                            <div class="col-md-6">
                                <input id="camp_goal" type="number" class="form-control validate[required] text-input radiusoff" name="camp_goal" value="<?php if(!empty($campaigns_count)){ echo $campaigns[0]->camp_goal; } ?>">

                               
                            </div>
                        </div>   
                        
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="camp_location" type="text" class="form-control validate[required] text-input radiusoff" name="camp_location" value="<?php if(!empty($campaigns_count)){ echo $campaigns[0]->camp_location; } ?>">

                               
                            </div>
                        </div>           
                               		
						
						
						<div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input type="file" id="camp_image" name="camp_image" class="form-control radiusoff">
								@if ($errors->has('camp_image'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('camp_image') }}</strong>
                                    </span>
                                @endif
                                
                                <?php if(!empty($campaigns_count)){?>
                                <?php if(!empty($campaigns[0]->camp_image)){?>
                                <img src="<?php echo $url;?>/local/images/media/<?php echo $campaigns[0]->camp_image;?>" border="0" width="80">
                                            <?php } else {?>
                                            <img src="<?php echo $url;?>/local/images/noimage_box.jpg" width="80" border="0">
                                            <?php } ?>
                                            <?php } ?>
                                
                            </div>
                        </div>
                        
                        <input type="hidden" name="save_photo" value="<?php echo $campaigns[0]->camp_image;?>">
                        
                        <div class="form-group{{ $errors->has('camp_desc') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">About the campaign</label>

                            <div class="col-md-6">
                                

                               <textarea id="id_cazary_full" name="camp_desc" placeholder="" class="form-control validate[required] txteditor"><?php if(!empty($campaigns_count)){ echo $campaigns[0]->camp_desc; } ?></textarea>
                               @if ($errors->has('camp_desc'))
                                    <span class="help-block">
                                        <strong>This field is required.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <input type="hidden" name="edit_id" value="<?php  echo $campaigns[0]->camp_id; ?>">
                        
                        
                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Finish Campaign?</label>

                            <div class="col-md-6 mtop10">
                                <input id="camp_finish" type="checkbox" class="" name="camp_finish" value="1">

                               
                            </div>
                        </div>    
						
						
						
						
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							
							
                                <button type="submit" class="btn btn-primary">
                                    Update Campaign
                                </button>
							
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