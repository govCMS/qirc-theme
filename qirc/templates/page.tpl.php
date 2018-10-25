


<?php 

if (!path_is_admin(current_path())) {
	$thisnode = 'node/'.$node->nid; 
	$thispath = explode('/',request_path());
	$thispath = $thispath[0];
}
	
?>


<?php include 'header.tpl.php'; ?>

<!-- start home container div -->
	<div class="container u-page-b">
	
	
	<!-- print option -->
	<div class="u-pull-right qirc_print-icon" style="border: 1px solid #E8EAED;padding: 0.5em;padding-right: 0.5em;padding-left: 0.5em;margin-top: -15px;padding-left: 0.5em;padding-right: 1em;box-shadow: 2px 2px 0px 0px #dadde2;">
		<span class="print_icon">
		<a class="" style="cursor:pointer" onclick="printPage();" style=""><i class="fa fa-print" style="color:#6D1915"></i>
		</span>
		<span class="print_test">
		<a class="" onclick="printPage();" style="cursor:pointer;margin-bottom:5px;color:#6D1915;padding-top:5px;padding-bottom:5px">
		Print this page</a>
		</span>
	</div>
	<!-- end print option -->
	
	
	<?php 
	if($thispath == 'search'){
		?>
		<div class="breadcrumb"><a href="/">Home</a> » <a href="/search/node">Search</a></div>
		<?php
	}
	else{ ?>
	<?php 
	print $breadcrumb;  
	}
	?>
	
	
	<div class="u-medium-topborder">
	<?php
		if($thispath != 'search'){
			print '<h1>'. render($title) .'</h1>';
			}else{
			print '<h2>Search </h2>';
			}
			print render($page['content']);
			print '<p class="qirc_updated_date">Last updated '. format_date($node->changed,'custom', 'd F Y')."</p>";
			?>
			
 	
				
				
			</div>
	</div><!-- end home container div -->

<?php  include 'footer.tpl.php'; ?>
		<!-- test -->

<script>
$(document).ready(function($) {
   $(".ui-state-default:odd" ).css("background-color", "#bbbbff");
   $(".ui-state-default:even").css("background-color","#fff");
});
</script>


<!-- end test -->

	
