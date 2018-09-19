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
	<hr>
			<div class="u-medium-topborder">
			<?php
				if($thispath != 'search'){
				print '<h1>'. render($title) .'</h1>';
				}else{
					print '<h2>Search </h2>';
				}
				print render($page['content']);

			?>
			</div>
	</div><!-- end home container div -->

<?php  include 'footer.tpl.php'; ?>

	
