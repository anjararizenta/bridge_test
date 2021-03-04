<!DOCTYPE html>
<html lang="en">
<head>

    <title>Payment Withdraw Approved</title>

  
	




</head>
<body>

   

    
    

	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	 <h1><?php echo $site_name;?> - Payment Withdraw Approved</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 <div class="row profile shop">
		<div class="col-md-6">
	 
	 
	
	<div id="outer" style="width: 100%;margin: 0 auto;background-color:#cccccc; padding:10px;">  
	
	
	<div id="inner" style="width: 80%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;
	font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px; padding:10px;">
			<div style="background:#22313F;padding:15px 10px 10px 10px;">
			<?php if(!empty($site_logo)){?>
			<div align="center"><img src="<?php echo $site_logo;?>" border="0" alt="logo" /></div>
			<?php } else { ?>
			<div align="center"><h2><?php echo $site_name;?></h2></div>
			<?php } ?>
            </div>
			
			<h3> Campaign Details</h3>
			
			<p> Campaign Title - <a href="<?php echo $url;?>/campaign/<?php echo $id;?>/<?php echo $camp_slug;?>"><?php echo $camp_name;?></a></p> 	
				
			 				
			
	<h3> User Details</h3>
	<p> Name - <?php echo $name;?></p>
	<p> Email - <?php echo $email;?></p>
	<p> Phone - <?php echo $phone;?></p>
	
	<h3> Payment Details</h3>
    
    <p> Amount - <?php echo $amount.' '.$currency;?></p>
    
    <p> Payment Type - <?php echo $payment_type;?></p>
    
    <p> Payment Id - <?php echo $payment_id;?></p>
	
	</div>
	</div>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	

      
</body>
</html>