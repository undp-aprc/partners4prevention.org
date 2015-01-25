<?php
// $Id: template.php,v 1.10 2011/01/14 02:57:57 jmburnz Exp $

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function to match your subthemes name,
 *    e.g. if you name your theme "themeName" then the function
 *    name will be "themeName_preprocess_hook". Tip - you can
 *    search/replace on "genesis_SUBTHEME".
 * 2. Uncomment the required function to use.
 */

/**
 * Override or insert variables into all templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess(&$vars, $hook) {
}
function genesis_SUBTHEME_process(&$vars, $hook) {
}
// */

/**
 * Override or insert variables into the html templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess_html(&$vars) {
  // Uncomment the folowing line to add a conditional stylesheet for IE 7 or less.
  // drupal_add_css(path_to_theme() . '/css/ie/ie-lte-7.css', array('weight' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}
function genesis_SUBTHEME_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess_page(&$vars) {
}
function genesis_SUBTHEME_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess_node(&$vars) {
}
function genesis_SUBTHEME_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess_comment(&$vars) {
}
function genesis_SUBTHEME_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function genesis_SUBTHEME_preprocess_block(&$vars) {
}
function genesis_SUBTHEME_process_block(&$vars) {
}
// */

/**
 * Preprocess theme function theme_nice_menu_tree().
 */
function genesis_p4p_preprocess_nice_menus_tree(&$variables) {
  return;
  $menu = menu_tree_all_data($variables['menu_name']);
  $menu_items = array();
  _flat_menu_item_link($menu, $menu_items);
  $current_path = drupal_get_path_alias();
  foreach ($menu_items as $mlid => $item) {
    $path = drupal_get_path_alias($item['link_path']);
    if ($current_path === $path) {
      for ($i = 1; $i <= 9; $i++) {
        $pid = $item['p'. $i];
        if ($pid > 0) {
          //$menu_items[$pid]['localized_options']['attributes']['class'] = array('active');
        }
      }
    }
  }
  $variables['menu'] = $menu;
}

function _flat_menu_item_link($menu, &$items) {
  foreach ($menu as $name => $item) {
    $items[$item['link']['mlid']] = &$item['link'];
    if ($item['below']) {
      _flat_menu_item_link($item['below'], $items);
    }
  }
}

/**
 * Returns HTML for a link to a file.
 *
 * @param $variables
 *   An associative array containing:
 *   - file: A file object to which the link will be created.
 *   - icon_directory: (optional) A path to a directory of icons to be used for
 *     files. Defaults to the value of the "file_icon_directory" variable.
 *
 * @ingroup themeable
 */
function genesis_p4p_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  if (isset($file->feedback_popup) && $file->feedback_popup) {
    $options['attributes']['class'] = 'feedback-popup';
    $options['attributes']['target'] = '_blank';
    $options['attributes']['data-nid'] = $file->resource_nid;
  }

  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . '</span>';
}
