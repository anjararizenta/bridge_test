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
<body>
<?php 

$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>
 
     
    <!-- fixed navigation bar -->
    @include('header')

	
    
    
    <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12" align="center">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">PAYMENT CONFIRMATION</h1>
              </div>
            </div>
          </div>
        </div>
      </section>

    
     
    

<section class="probootstrap-section">
        <div class="container">
        
        
        
        
        
        <div class="container text-center">
	<div class="min-space"></div>
	<label>Campaign Title </label> - <?php echo $campaign_name; ?><br>
    
    <label>Amount</label> - <?php echo $amount; ?> <?php echo $currency; ?>
	
	<?php if($payment_type=="paypal"){?>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $campaign_name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $order_no;?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $url;?>/cancel'>
		<input type='hidden' name='return' value='<?php echo $url;?>/success/<?php echo $order_no;?>'>
		<input type="submit" name="submit" value="Pay Now" class="btn btn-primary">
     
    
    </form>
    <?php } if($payment_type=="stripe"){
		$fprice = $amount * 100;
		?>
	<form action="{{ route('stripe-success') }}" method="POST">
	{{ csrf_field() }}
	
	<input type="hidden" name="cid" value="<?php echo $order_no;?>">
	<input type="hidden" name="amount" value="<?php echo $fprice; ?>">
	<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
	<input type="hidden" name="item_name" value="<?php echo $campaign_name; ?>">
		<script src="https://checkout.stripe.com/checkout.js" 
		class="stripe-button" 
		<?php if($setts[0]->stripe_mode=="test") { ?>
		data-key="<?php echo $setts[0]->test_publish_key; ?>" <?php } ?>
		<?php if($setts[0]->stripe_mode=="live") {  ?>
		data-key="<?php echo $setts[0]->live_publish_key; ?>" 
		<?php }?> 
		data-image="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" 
		data-name="<?php echo $campaign_name; ?>" 
		data-description="<?php echo $setts[0]->site_name;?>"
		data-amount="<?php echo $fprice; ?>"
		data-currency="<?php echo $currency; ?>"
		/>
		</script>
	</form>
	<?php } ?>
	
	
	</div>
        
        
        
           
           
           
           
          	
	
	
	
	
	</div>
    </section>
    
   


      @include('footer')
</body>
</html>