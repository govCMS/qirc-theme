<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function qirc_menu_tree__main_menu($variables) {
  # return '<ul class="navbar-nav mr-auto first-sidebar" id="main-menu-links">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_js_alter
 */
function qirc_js_alter(&$javascript) {
  // Swap out jQuery to use an updated version of the library.
  //$javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'qirc') . '/js/jquery3.js';
}

function qirc_preprocess_page(&$variables){
	

	$menu_name = 'menu-custom-menu';
	$menus = menu_load_links($menu_name);
	
	foreach ($menus as $key => $val){
			$menustr[$val['link_path']] = '<a class="" href="'.$val['link_path'].'" role="listitem" style="padding-bottom:100vh;"><div><span>'.$val['link_title'].'</span></div></a>';
			
	}
	
	$variables['custommenulinks'] = $menustr;
	
	/*
	$strOutput;

	if ($variables['node']->type == 'awardscustomcontent') {
    	$variables['theme_hook_suggestions'][] = 'page__awardscustomcontent';
  }



	
	$variables['filecurrentpath'] = 'Currentpath: '.request_path();
	#$variables['filelistbynode'] = $dirscan;

	
	$dir = "public://awards";
    $filepath = file_scan_directory($dir, '/.*\.pdf$/');
    $variables['foolist'] = $filepath;
	
	 
	$path = drupal_realpath('public://awards');
	$dirs = array();
	// directory handle
	$dir = dir($path);

	while (false !== ($entry = $dir->read())) {
		if ($entry != '.' && $entry != '..') {
		if (is_dir($path . '/' .$entry)) {
            $dirs[] = $entry; 
		}
		else{
			if($entry != '.htaccess'){
			 $strOutput .= $entry .'<br>';
			
		  }	
		}
    }
}
		$variables['filescan'] = $strOutput;
   		# echo '<pre>';print_r($dirs);echo '</pre>';
	
	*/
	
	
	
	
}


function qirc_form_search_api_page_search_form_alter(&$form, &$form_state, $form_id) {
//Add CSS to form tag
 $form['keys_' . $page->id] = array(
'#type' => 'textfield',
'#title' => t(''),
'#title_display' => $compact ? 'invisible' : 'before',
'#default_value' => $keys,
'#size' => $compact ? 15 : 30, );
$form['keys_' . $page->id]['#attributes']['placeholder'] = t('Enter your keywords yo'); }

/**
* hook_form_FORM_ID_alter
*/
function qirc_form_search_block_form_alter(&$form, &$form_state, $form_id) {
	#echo '$form_id'. $form_id;
	$form['search_block_form']['#attributes']['placeholder'] = t('Search'); 
	$form['actions']['submit']['#value'] = t(''); // Change the text on the submit button
	$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/Magnifying glass-01.png','#alt'=>'Search QIRC');
	$form['search_block_form']['#size'] = 20;  // define size of the textfield
	$form['actions']['submit']['#attributes'] = array('class' => array('qircclass'));
	$form['actions']['submit']['#name'] = 'qirc_search';
	/*
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 30;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('Search'); // Change the text on the submit button
   # $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/search_icon.png');
    $form['actions']['submit']['#attributes'] = array('class' => 'my_class');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
	*/
}

/** alter custom form **/

function qirc_form_alter(&$form, &$form_state, $form_id){
	#echo '$form_id'. $form_id;
	#$form_id search_api_page_search_form 
	#$form_id search_api_page_search_form_default_search
	
	
	
	if($form_id == 'search_api_page_search_form_default_search'){
		$form['search_block_form']['#attributes']['placeholder'] = t(''); 
	    $form['actions']['submit']['#value'] = t(''); // Change the text on the submit button
	}
	if($form_id=-'search_api_page_search_form '){
		$form['actions']['submit']['#attributes']['class'][] = 'au-btn'; 
	}
}



/**
 * Implements hook_file_link().
 *
 * We override core's file link theming to append a query parameter which
 * changes when the file entity changes. This is for caching reasons and
 * reverse proxies.
 */
function qirc_file_link($variables) {
  $file = $variables ['file'];
  $icon_directory = $variables ['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
    'query' => array(
      'v' => $file->timestamp,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options ['attributes']['title'] = check_plain($file->filename);
  }

  $formattedFileSize = round($file->filesize/10000,2);
  
  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . ' ('. $file->filemime .'), ' . $formattedFileSize.' KB)</span>';
} ///end pdf link



