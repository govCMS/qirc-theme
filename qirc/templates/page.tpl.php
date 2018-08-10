<?php 

if (!path_is_admin(current_path())) {
  // Do stuff.
	$thisnode = 'node/'.$node->nid; 
	$thispath = explode('/',request_path());
	$thispath = $thispath[0];
}
	
?>
<!-- main wrapper -->
<div class="wrapper">

<!-- start left hand nav
	
	<div class="sidebars_wrapper clearfix" role="list" style="margin-bottom:100vh;position:fixed">  
		<a class="" href="<?php print base_path(); ?>" role="listitem" style="padding-bottom: 800.9px; margin-bottom: -800.9px;">
			<div><span>Home</span></div>
		</a>
		<?php 
		
		if(isset($thisnode) OR (!empty($thisnode))){
			print $custommenulinks[$thisnode ];
		}
		?> 
	</div>
</div>
<!-- end  wrapper -->

<?php include 'header.tpl.php'; ?>

<!-- start home container div -->
	<div class="container">
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
				print '<h2>'. render($title) .'</h2>';
				}else{
					print '<h2>Search </h2>';
				}
				print render($page['content']);

			?>
			</div>
	</div><!-- end home container div -->

<?php include 'footer.tpl.php'; ?>

