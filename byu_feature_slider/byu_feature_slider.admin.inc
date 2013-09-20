<?php

/**
 * @file
 * Administration page callback from the BYU Feature Slider Module
 * This is so admins can set the settings 
 * 
 * @author Ephraim Sng <ephraim.sng@gmail.com>
 * 
 */

/**
 * Form to configure slider settings
 * 
 * @return type
 */
function byu_feature_slider_admin_settings(){
	$form['settings'] = array(
	  '#type' => 'fieldset', 
	  '#title' => t('Featured Slider Settings'),
	  '#description' => t('Configure the settings for the BYU featured slider'),
	);
	
	$form['settings']['byu_slider_randomize'] = array(
	  '#type' => 'checkbox',
	  '#title' => t('Randomize Slides'),
	  '#description' => t('Have the featured images appear in random order whenever the slider is loaded'),
	  '#default_value' => variable_get('byu_slider_randomize'),
	);
	
	return system_settings_form($form);
	
}
