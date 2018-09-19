<div class="wrapper">


<div class="header qirc_flexi_header">	
<div class="container">
	<div class="row qirc_drk_steel_blue qirc-home-bg">
		<div class="three columns">
		<a href="<?php echo $base_url;?>">
			<img src="<?php print '/' . path_to_theme(); ?>/images/Industrial-courts-logo-copy.png" alt="<?php print t('Home'); ?>" class="qirc_logo">
		</a>	
		</div>
		<div class="nine columns qirc-quicklinks">
		    <?php print render($page['quicklinks']) ?>
			<div><?php print render($page['searchblock']); ?></div>
			<div><?php print render($page['headerphone']); ?></div>
		</div>
	</div>
</div>
</div>


<div class="header qirc_menu_background">	
<div class="container qirc-row-margins">
	<div class="row qirc_mid_grn_bg">
			<div class="twelve columns">
<?php 
	print render($page['navigation']);
?>
			</div>
		</div>
</div>
</div>



