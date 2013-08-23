<?php
/**
 * @file
 * byu_feature_slider.features.inc
 */

/**
 * Implements hook_node_info().
 */
function byu_feature_slider_node_info() {
  $items = array(
    'feature' => array(
      'name' => t('Feature'),
      'base' => 'node_content',
      'description' => t('Images and Words for the Featured Slider'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
