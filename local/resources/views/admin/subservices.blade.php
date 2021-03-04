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
    <h1>Sub Services</h1>
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


<form action="{{ route('admin.subservices') }}" method="post">
                 
                 {{ csrf_field() }}
                 <div align="right">
                   <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
                  
                  
				   <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Sub Service</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/addsubservice" class="btn btn-primary">Add Sub Service</a>
				  <?php } ?>
                 </div>
<div class="widget-box">
           

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Sub Services</h5>
          </div>
          
          
          <div class="widget-content nopadding">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                          <th>
          <input type="checkbox" id="selectAll" class="main"></th>
                        
                         <th>Sno</th>
						  <th>Image</th>
						  <th>Service</th>
                          <th>Name</th>
                         
                          <th>Action</th> 
                          
                         </tr>
                         
                        
                        
                       
                         
                         
              </thead>
              <tbody>
            <?php 
					  $i=1;
					  foreach ($subservices as $subservice) { ?>
    
                      
                      
                      <tr class="gradeX">
                        <td><input type="checkbox" name="subid[]" value="<?php echo $subservice->subid;?>"/></td>
                        
						 <td><?php echo $i;?></td>
						 <?php 
					   $subservicephoto="/media/";
						$path ='/local/images'.$subservicephoto.$subservice->subimage;
						if($subservice->subimage!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="70"></td>
						 <?php } ?>
                         
                          
						  <td><?php echo $subservice->name;?></td>
						   <td><?php echo $subservice->subname;?></td>
						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/editsubservice/{{ $subservice->subid }}" class="btn btn-success">Edit</a>
						   <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   
						 <a href="<?php echo $url;?>/admin/subservices/{{ $subservice->subid }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						   <?php } ?>
						  </td>
                        </tr>
                      
                   <?php $i++;} ?>
                                
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
