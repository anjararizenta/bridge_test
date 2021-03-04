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
    <h1>Edit Gallery Images</h1>
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
            <h5>Edit Gallery Images</h5>
          </div>
          <div class="widget-content nopadding">
         <?php $url = URL::to("/"); ?>   
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.editgalleryimages') }}" enctype="multipart/form-data" id="formID">
                     {{ csrf_field() }}  
                     
                     
                     
                     
                     
               <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input id="title" class="validate[required] span8"  name="title" value="<?php echo $galleryimages[0]->title;?>" type="text">
                         @if ($errors->has('gallery'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That title is already exists</strong>
                                    </span>
                                @endif
                                
                                
                                
                  
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Sub Title</label>
                <div class="controls">
                  <input id="sub_title" class="validate[required] span8"  name="sub_title" value="<?php echo $galleryimages[0]->subtitle;?>" type="text">
                        
                                
                                
                                
                  
                </div>
              </div>       
              
              
               <input type="hidden" name="imgid" value="<?php echo $galleryimages[0]->imgid; ?>">
              
              
              
              
              
              
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                 
                 
                  
                   <input type="file" id="photo" name="photo" class="span8<?php if($galleryimages[0]->galleryimage==""){?> validate[required]<?php } ?>">
						   @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                  
                  
                </div>
                
                 <?php $url = URL::to("/"); ?>
					  <?php 
					   $galphoto="/media/";
						$path ='/local/images'.$galphoto.$galleryimages[0]->galleryimage;
						if($galleryimages[0]->galleryimage!=""){
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
               
              </div>
              
              
              
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $galleryimages[0]->galleryimage;?>">
                    
					  
					  
					  
              
                
                                  
              <div class="form-actions">
                        <div class="span8">
                         
                              
						  <a href="<?php echo $url;?>/admin/galleryimages" class="btn btn-primary">Cancel</a>
						  
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
