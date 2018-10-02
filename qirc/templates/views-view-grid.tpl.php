<?php

/**
 * @file
 * Override Drupals Grid tables with skeleton rows annd cols
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>


<!-- start home buttons  div -->
<div class="container">
    <?php foreach ($rows as $row_number => $columns): ?>
      <div class="row qirc-row-margins home_panel_row">
        <?php foreach ($columns as $column_number => $item): ?>
         <div class="three columns qirc_lite_bg col-contained ">
            <?php print $item; ?>
          </div>
	<?php endforeach; ?>
      </div>
    <?php endforeach; ?>
</div><!-- closing div -->





