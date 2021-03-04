<!DOCTYPE html>
<html lang="en">
  <head>
   
  
     @include('admin.title')
    @include('admin.style')
	
    
  </head>

  <body>
  @include('admin.top')

@include('admin.menu')



<div id="content">
  <div id="content-header">
    <div id="breadcrumb">  </div>
    <h1>Edit Shop</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Shop</h5>
          </div>
          <div class="widget-content nopadding">
         <?php $url = URL::to("/"); ?>   
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-shop') }}" enctype="multipart/form-data" id="formID">
                     {{ csrf_field() }}  
                     
                     
                     
                     
                     
               <div class="control-group">
                <label class="control-label">Shop Name <span class="required">*</span></label>
                <div class="controls">
                 
                                
                       
			<input id="shop_name" class="validate[required] span8"  name="shop_name" value="<?php echo $editshop[0]->name; ?>" type="text">			         
                                
                  
                </div>
              </div>
              
              
              
           <div class="control-group">
                <label class="control-label">Address <span class="required">*</span></label>
                <div class="controls">              
              
            
                          <input id="address" class="validate[required] span8"  name="address" value="<?php echo $editshop[0]->address; ?>" type="text">
                        
					   </div>
                      </div>         
              
              
               
              
              <div class="control-group">
                <label class="control-label">City <span class="required">*</span></label>
                <div class="controls">
               
                          <input id="city" class="validate[required] span8"  name="city" value="<?php echo $editshop[0]->city; ?>" type="text">
                        
					   </div>
                      </div>
                      
                      
                      
                     
                        
                        <div class="control-group">
                <label class="control-label">Pin Code <span class="required">*</span></label>
                <div class="controls">
                        
                          <input id="pin_code" class="validate[required] span8"  name="pin_code" value="<?php echo $editshop[0]->pin_code; ?>" type="text">
                        
					   </div>
                      </div>
                      
                      
                      
                      <div class="control-group">
                <label class="control-label">Country <span class="required">*</span></label>
                <div class="controls">
                
                     
                          <input id="country" class="validate[required] span8"  name="country" value="<?php echo $editshop[0]->country; ?>" type="text">
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      
                       <div class="control-group">
                <label class="control-label">State <span class="required">*</span></label>
                <div class="controls">
                
                      
                          <input id="state" class="validate[required] span8"  name="state" value="<?php echo $editshop[0]->state; ?>" type="text">
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      <div class="control-group">
                <label class="control-label">Shop Phone No <span class="required">*</span></label>
                <div class="controls">
                
                      
                          <input id="shop_phone_no" class="validate[required] span8"  name="shop_phone_no" value="<?php echo $editshop[0]->shop_phone_no; ?>"  type="text">
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      <div class="control-group">
                <label class="control-label">Description <span class="required">*</span></label>
                <div class="controls">
                
                      
                          <textarea id="description" class="validate[required] span8"  name="description" style="min-height:200px;"><?php echo $editshop[0]->description; ?></textarea>
                        
					   </div>
                      </div>
                      
                      
                      
                      <div class="control-group">
                <label class="control-label">Phone No <span class="required">*</span></label>
                <div class="controls">
                
                       
                          <input id="phone_no" class="span8"  name="phone_no" value="<?php echo $userdata[0]->phone;?>"  type="text" disabled>
                        
					   </div>
                      </div>
                      
              
              
              <div class="control-group">
                <label class="control-label">Start Time <span class="required">*</span></label>
                <div class="controls">
                
              
                          <input id="start_time" class="span8"  name="open_time" value="<?php echo $stime;?>"  type="text" disabled>
                        
					   </div>
                      </div>
              
              
              <div class="control-group">
                <label class="control-label">End Time <span class="required">*</span></label>
                <div class="controls">
                
             
                          <input id="end_time" class="span8"  name="close_time" value="<?php echo $etime;?>"  type="text" disabled>
                        
					   </div>
                      </div>
                      
                      
                      
                      
                <div class="control-group">
                <label class="control-label">Local Shipping Price <span class="required">*</span></label>
                <div class="controls">
                
             
                          <input id="local_ship_price" class="span8"  name="local_ship_price" value="<?php echo $editshop[0]->local_shipping_price;?>"  type="text" disabled>
                        
					   </div>
                      </div>  
                      
                      
                      
                 <div class="control-group">
                <label class="control-label">International Shipping Price <span class="required">*</span></label>
                <div class="controls">
                
             
                          <input id="international_ship_price" class="span8"  name="international_ship_price" value="<?php echo $editshop[0]->international_shipping_price;?>"  type="text" disabled>
                        
					   </div>
                      </div>     
                      
                      
                      
                          
                      
                      
                      
                      
                <div class="control-group">
                <label class="control-label">Booking Upto <span class="required">*</span></label>
                <div class="controls">       
               
                          <input id="booking_upto" class="span8"  name="booking_upto" value="<?php echo $editshop[0]->booking_upto; ?>"  type="text" disabled>
                        (days)
					   </div>
                      </div> 
                      
                      
                      
                   <div class="control-group">
                <label class="control-label">Status <span class="required">*</span></label>
                <div class="controls"> 
                   
                 
						<select id="status" name="status" class="span8">
							<option value="0" <?php  if($editshop[0]->status=="0") echo "selected='selected'"; ?>>Disable</option>
							<option value="1" <?php  if($editshop[0]->status=="1") echo "selected='selected'";  ?>>Enable</option>
						</select>	
						</div>
					</div>	  
                    
                    
                    
                    
                    <div class="control-group">
                <label class="control-label">Featured <span class="required">*</span></label>
                <div class="controls"> 
                
                   
						<select id="featured" name="featured" class="span8">
						
							<option value="1" <?php  if($editshop[0]->featured=="1") echo "selected='selected'"; ?>>Yes</option>
							<option value="0" <?php  if($editshop[0]->featured=="0") echo "selected='selected'";  ?>>No</option>
						</select>	
						</div>
					</div>	
                    
                    
                    
                    <div class="control-group">
                <label class="control-label">Shop Working Days <span class="required">*</span></label>
                <div class="controls">
                
						<input type="checkbox" name="check_list[]" id="working_date" disabled="disabled" class=""  value="0" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="0") echo "checked=='checked'"; }?>> Sunday <br>
					<input type="checkbox" name="check_list[]" id="working_date" disabled="disabled" class=""  value="1" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="1") echo "checked=='checked'"; }?>> Monday <br>
					<input type="checkbox" name="check_list[]" id="working_date" disabled="disabled" class=""  value="2" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="2") echo "checked=='checked'"; }?>> Tuesday <br>
					<input type="checkbox" name="check_list[]" id="working_date" disabled="disabled" class=""  value="3" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="3") echo "checked=='checked'"; }?>> Wednesday <br>
					<input type="checkbox" name="check_list[]" class="" id="working_date" disabled="disabled" value="4" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="4") echo "checked=='checked'"; }?>> Thursday  <br>
					<input type="checkbox" name="check_list[]" id="working_date" class="" disabled="disabled" value="5" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="5") echo "checked=='checked'"; }?>> Friday  <br>
					<input type="checkbox" name="check_list[]" id="working_date" class="" disabled="disabled" value="6" <?php for($i=0;$i<$level;$i++){ if($selected[$i]=="6") echo "checked=='checked'"; }?>> Saturday
						
						</div>
						
				    </div>
                    
                    
                    
                    
                    
                    <div class="control-group">
                <label class="control-label">Cover Photo <span class="required">*</span></label>
                <div class="controls">
                
                    
						 <input type="file" id="shop_cover_photo" name="shop_cover_photo" class="span8" disabled>
						 
						 <?php 
					   $shopphoto="/media/";
						$paths ='/local/images'.$shopphoto.$editshop[0]->cover_photo;
						if($editshop[0]->cover_photo!=""){
						?>
					 <br/>
					  <div class="col-md-12">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="150">
					  </div>
					 
						<?php } else { ?>
					  <br/>
					  <div class="col-md-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="150">
					  </div>
					 
						<?php } ?>
						</div>
						
					</div>
                    
                    
                    
                    
                    
                    <div class="control-group">
                <label class="control-label">Gallery <span class="required">*</span></label>
                <div class="controls">
                
                    
						<input type="file" id="photo" name="photo" class="span8" disabled>
						<div class="col-md-12" style="margin-top:10px;">
						<?php foreach($viewgallery as $gallery){?>
						
						<?php 
					   $galphoto="/media/";
						$paths ='/local/images'.$galphoto.$gallery->photo;
						if($gallery->photo!=""){
						?>
						
					  <div class="col-md-3 col-sm-3">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="100" style="float:left; margin-right:5px;">
					  </div>
					 
						<?php } else { ?>
						
					  <div class="col-md-3 col-sm-3">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100" style="float:left;  margin-right:5px;">
					  </div>
						<?php } ?>
						
						<?php } ?>
						</div>
						</div>
						</div>
                    
                    
                            
              
              
              <?php if(!empty($site_setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/media/'.$site_setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
						
						
						<input type="hidden" name="site_name" value="<?php echo $site_setting[0]->site_name;?>">
                     
					  <input type="hidden" name="editid" value="<?php echo $editshop[0]->shop_id; ?>">
					  
					  
					  <input type="hidden" name="email_status" value="<?php echo $editshop[0]->admin_email_status; ?>">
					  
					  <input type="hidden" name="seller_email" value="<?php echo $editshop[0]->email;  ?>">
              
              
              
              
              
                     
              <div class="form-actions">
                        <div class="span8">
                         
                              
						   <a href="<?php echo $url;?>/admin/shop" class="btn btn-primary">Cancel</a>
						  
						  <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                          
                           <button id="send" type="submit" class="btn btn-success">Submit</button>
						  <?php } ?>
                                
                        </div>
                        </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>




	 @include('admin.footer')
  </body>
</html>
