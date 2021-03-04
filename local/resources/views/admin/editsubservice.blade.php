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
    <h1>Edit Sub Service</h1>
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
            <h5>Edit Sub Service</h5>
          </div>
          <div class="widget-content nopadding">
         <?php $url = URL::to("/"); ?>   
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.editsubservice') }}" enctype="multipart/form-data"  id="formID">
                     {{ csrf_field() }}  
              
              
              <div class="control-group">
                <label class="control-label">Select Service</label>
                <div class="controls">
                                               
                                
                  <select class="validate[required] span8"  name="service">
						  <option value=""></option>
						  <?php foreach($services as $service){?>
						  <option value="<?php echo $service->id;?>" <?php if($subservices[0]->service==$service->id){?> selected="selected" <?php } ?> ><?php echo $service->name;?></option>
						  <?php } ?>
						  </select>              
                  
                </div>
              </div>
              
              
              
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                                               
                                
                                          
                          
                  <input id="name" class="validate[required] span8"  name="name" value="<?php echo $subservices[0]->subname; ?>" type="text">
                        @if ($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That sub service is already exists</strong>
                                    </span>
                                @endif                    
                  
                </div>
              </div>
             
              
              <input type="hidden" name="subid" value="<?php echo $subservices[0]->subid; ?>">
              
             
              
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                 
                 
                                
                                
                  <input type="file" id="photo" name="photo" class="<?php if(empty($subservices[0]->subimage)){?>validate[required]<?php }?> span8">
						   @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif              
                  
                </div>
                
                
                
                     
                <?php $url = URL::to("/"); ?>
					  <?php 
					   $subservicephoto="/media/";
						$path ='/local/images'.$subservicephoto.$subservices[0]->subimage;
						if($subservices[0]->subimage!=""){
						?>
					  <div class="control-group">
                      <div class="controls">
					  <div class="span8">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
                      </div>
						<?php } else { ?>
					   <div class="control-group">
                      <div class="controls">
					  <div class="span8">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100">
					  </div>
					  </div>
                      </div>
						<?php } ?>
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $subservices[0]->subimage;?>">
                    
              
                         
              <div class="form-actions">
                        <div class="span8">
                         
                              
						  <a href="<?php echo $url;?>/admin/subservices" class="btn btn-primary">Cancel</a>
						  
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
</div>




    
	 @include('admin.footer')
  </body>
</html>
