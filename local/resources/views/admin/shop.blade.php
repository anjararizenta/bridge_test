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
    <h1>Shop</h1>
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


<form action="{{ route('admin.shop') }}" method="post">
                 
                 {{ csrf_field() }}
                 <div align="right">
                  <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
				 
                 </div>
<div class="widget-box">
           

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Shop</h5>
          </div>
          
          
          <div class="widget-content nopadding">
         
            <table class="table table-bordered data-table" id="datatable-responsive">
              <thead>
                <tr>
                                           
                          <th>
          <input type="checkbox" id="selectAll" class="main"></th>
                        
                          <th>Sno</th>
                          
                          <th>Shop Name</th>
						  
                          <th>Email</th>
                          
                          <th>Username</th>
                          
                                                 
                          <th>City</th>
                          
                          <th>Phone</th>
                          
                          
                          
                          <th>View More</th>
                          
						  <th>Status</th>
                          
                          <th>Action</th>
                          
                         </tr>
                         
                         
                         
                         
              </thead>
              <tbody>
             <?php 
					  $i=1;
					  foreach ($shop as $shop_details) { 
					  
					  $user_details = DB::table('users')
		         						->where('id','=', $shop_details->user_id)
				 						->get();
					  
					  if($shop_details->status==0){ $btn = "btn btn-danger"; $text = "Deactive"; $sid = 1; } else { $btn = "btn btn-success"; $text = "Active"; $sid=0; } ?>
                      
                      <tr  class="gradeX">
                        
                        <td><input type="checkbox" name="nid[]" value="<?php echo $shop_details->shop_id;?>"/></td>
                        
						 <td><?php echo $i;?></td>
						 
                          <td><?php echo $shop_details->name;?></td>
                         
                          <td><?php echo $shop_details->email;?></td>
                          
                          <td><?php echo $user_details[0]->name;?></td>
						 
						  
                          <td><?php echo $shop_details->city;?></td>
                          
                          <td><?php echo $shop_details->shop_phone_no;?></td>
                          
                           <td><a href="<?php echo $url;?>/admin/edit-shop/{{ $shop_details->shop_id }}" style="color:#004EFF;">view more</a></td>
                          
                          
						  <td>
                          
                           <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="<?php echo $btn;?> btndisable"><?php echo $text;?></a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/shop/action/{{ $shop_details->shop_id }}/{{ $sid }}" class="<?php echo $btn;?>"><?php echo $text;?></a>
						  
				  <?php } ?>
                          
                          
                          </td>
                          
                          <td>
                          
                          
						  
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/shop/{{ $shop_details->shop_id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						  
				  <?php } ?>
						  </td>
                        </tr>
                      
                      
                    
                <?php $i++; } ?>
                                
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
