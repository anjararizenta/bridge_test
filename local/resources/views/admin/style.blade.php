<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

{!!Html::style('local/resources/views/admin/theme/css/bootstrap.min.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/bootstrap-responsive.min.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/fullcalendar.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/avigher-style.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/avigher-media.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/font-awesome.css')!!}
{!!Html::style('local/resources/views/admin/theme/css/jquery.gritter.css')!!}

{!!Html::script('local/resources/views/admin/theme/js/jquery.min.js')!!}


       {!!Html::style('local/resources/views/admin/theme/css/uniform.css')!!}
       
       {!!Html::style('local/resources/views/admin/theme/css/select2.css')!!}
       
       {!!Html::style('local/resources/views/admin/theme/css/validationEngine.jquery.css')!!}
      {!!Html::script('local/resources/views/admin/theme/js/jquery.validationEngine-en.js')!!}
{!!Html::script('local/resources/views/admin/theme/js/jquery.validationEngine.js')!!}

{!!Html::style('local/resources/views/admin/theme/css/new_font-awesome.css')!!}


{!!Html::style('local/resources/views/admin/theme/css/simple-iconpicker.min.css')!!}
{!!Html::script('local/resources/views/admin/theme/js/simple-iconpicker.min.js')!!}


<script>
    var whichInput = 0;

    $(document).ready(function(){
     
      $('#inputid2').iconpicker("#inputid2");
      
    });
    </script>
    
    
<script>
		jQuery(document).ready(function(){
			
			jQuery("#formID").validationEngine('attach', { promptPosition: "topLeft" });
		});
		
		
		
    </script>
      
       <script type="text/javascript">
      
      $(document).ready(function () {
   $('body').on('click', '#selectAll', function () {
      if ($(this).hasClass('allChecked')) {
         $('input[type="checkbox"]', '#datatable-responsive').prop('checked', false);
      } else {
       $('input[type="checkbox"]', '#datatable-responsive').prop('checked', true);
       }
       $(this).toggleClass('allChecked');
     })
});


$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
	
	
	
	
	$('#stripe_mode').on('change', function() {
		
		if ( this.value == 'test')
      {
		  $("#stripe_test_publish").show();
		  $("#stripe_test_secret").show();
		  $("#stripe_live_publish").hide();
		  $("#stripe_live_secret").hide();
	  }
	  else if(this.value == 'live')
      {
		  $("#stripe_test_publish").hide();
		  $("#stripe_test_secret").hide();
		  $("#stripe_live_publish").show();
		  $("#stripe_live_secret").show();
	  }
	  else
	  {
		  $("#stripe_test_publish").hide();
		  $("#stripe_test_secret").hide();
		  $("#stripe_live_publish").hide();
		  $("#stripe_live_secret").hide();
	  }
		
	
	});
	
	
	
	
	
	
});




</script>