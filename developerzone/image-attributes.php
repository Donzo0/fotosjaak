<?php 
	$userrole = array('root', 'developer');
	include("security.php");
?>
<script>
  $(document).ready(function(){
  	//alert("Het werkt!");
  	$('img').attr("width", "400");
  	$('button').click(function(){
  	  $('img').attr('width', '600');  		
  	});
  	
  	
  });	
</script>


<img src='images/russischedwerghamster.jpg' alt='russische dwerghamster' /><br>
<button>Maak groter</button>
