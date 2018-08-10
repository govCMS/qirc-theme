
<div class="container">
	<div class="row qirc_drk_steel_blue qirc-home-bg">
		<div class="three columns">
			<img src="<?php print '/' . path_to_theme(); ?>/images/Qld-CoA-Stylised-WEB-rev.png" alt="<?php print t('Home'); ?>" class="qirc_logo">
		</div>
		<div class="six columns qirc-quicklinks"><?php print render($page['quicklinks']) ?>
		</div>
		<div class="three columns">
		<?php print render($page['searchblock']); ?>
		</div>
	</div>
</div>


<div class="container qirc-row-margins">
	<div class="row qirc_mid_grn_bg">
			<div class="nine columns">

<?php 
	print render($page['navigation']);
?>
			</div>
		</div>
	</div>


