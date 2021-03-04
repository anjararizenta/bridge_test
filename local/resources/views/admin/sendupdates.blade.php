<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
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
    <h1>Send Updates</h1>
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
            <h5>Send Updates</h5>
          </div>
          <div class="widget-content nopadding">
          
              
               <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.sendupdates') }}" enctype="multipart/form-data" id="formID">
                     {{ csrf_field() }} 
              <div class="control-group">
                <label class="control-label">Subject</label>
                <div class="controls">
                  <input id="nsubject" class="validate[required] span8"  name="nsubject" value=""  type="text">
                         @if ($errors->has('nsubject'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('nsubject') }}</strong>
                                    </span>
                                @endif
                  
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Message</label>
                <div class="controls">
                 <textarea id="message"  name="message"  class="validate[required] span8" style="height:300px;"></textarea>
						  
                  
                </div>
              </div>
              
              
              
              <?php if(!empty($setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/settings/'.$setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
                        
                        
                        
                        <input type="hidden" name="site_url" value="<?php echo $url;?>">
                        
                        <input type="hidden" name="admin_email" value="<?php echo $admindetails[0]->email;?>">
                        
					<input type="hidden" name="site_name" value="<?php echo $setting[0]->site_name;?>">
					  
             
              
              
              
              
					
              <?php $url = URL::to("/"); ?>
              <div class="form-actions">
                        <div class="span8">
                         <a href="<?php echo $url;?>/admin/newsletter" class="btn btn-primary">Cancel</a>
                          
                        
                       
						  <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
						  
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
								<?php } ?>
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
