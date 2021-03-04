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
                <h1 class="probootstrap-heading probootstrap-animate">My Comments</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
	
	
	
	
	
	
	
	
	
	<section class="probootstrap-section">
        <div class="container">

            	

                <div class="row">
        <div class="col-md-3">
            @include('profile_menu')
        </div>
       

                	<div class="col-md-9">
    
    
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingoff">
                    <!-- Advanced Tables -->
                   
                        <div class="float-left">
                        <h4 class="bold black "><?php echo $postcount;?> comments found !!!</h4>
                        </div>
                        
                        
                    </div>    
                        
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="balance_heading">
                                            <th>SNo</th>
											<th width="20%">Post Title</th>
											
											<th>Your Comment</th>
                                            
                                            <th>Date</th>
											
											<th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										
										foreach($viewpost as $row)
										{
											$getpost_count = DB::table('post')
														->where('post_type', '!=' , 'comment')
														->where('post_id', '=' , $row->post_parent)
														
														->count();
														if(!empty($getpost_count))
														{
											              $getpost = DB::table('post')
														->where('post_type', '!=' , 'comment')
														->where('post_id', '=' , $row->post_parent)
														->get();
											$sno++;
											
											if($row->post_status==1){ $status = "Approved"; $color ="#078748"; } else {  $status = "Unapproved"; $color ="#CB2027"; }
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><a href="<?php echo $url;?>/blog/<?php echo $getpost[0]->post_slug;?>"><?php echo $getpost[0]->post_title;?></a></td>
												
											<td><?php echo $row->post_desc;?></td>
                                            
                                            <td><?php echo $getpost[0]->post_date;?></td>		
												
											<td style="color:<?php echo $color;?>"><?php echo $status;?></td>											
											<td><a href="<?php echo $url;?>/my-comments/<?php echo $row->post_id;?>" onClick="return confirm('Are you sure you want to delete');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a></td>
										</tr>
										<?php } } ?>		
									</tbody>
															
                                </table>
                            </div>
                        
                   
                    <!--End Advanced Tables -->
               
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
        
        
        </div>
        
        
        
	
    
    
	</div>
	
	
	

     </section>
    

      @include('footer')
</body>
</html>