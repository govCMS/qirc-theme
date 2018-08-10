<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<?php if(!$search_results){?>
<!-- Search block template -->
<p>Your search did not return any results. Please try the search suggestions below.</p>

<strong>Tips for searching</strong>
<ul>
<li>Check the spelling of your keywords.</li>
<li>Try different keywords.</li>
<li>Try more general keywords.
<li>Remove any advanced search operators like + - | etc.</li>
</ul>
<strong>Alternatively you can try</strong>
<ul>
<li>Taking a look at the <a href="/sitemap">Sitemap</a></li>
<li>Using the site's menus and navigation.</li>
</ul>
<?php 
	
} 
	
	?>
<?php if ($search_results): ?>
  <h2><?php print t('Search results');?></h2>
  <ol class="search-results <?php print $module; ?>-results">
    <?php print $search_results; ?>
  </ol>
  <?php print $pager; ?>
<?php else : ?>
 
  <?php #print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
