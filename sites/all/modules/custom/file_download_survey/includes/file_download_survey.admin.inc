<?php

/**
 * Admin form.
 */
function file_download_survey_admin() {
  $form = array();

  $form['file_download_survey_threshold'] = array(
    '#type' => 'textfield',
    '#title' => t('Threshold'),
    '#description' => t('Enter in minutes'),
    '#default_value' => variable_get('file_download_survey_threshold', 15),
  );

  $form['file_download_survey_cookie_timeout'] = array(
    '#type' => 'textfield',
    '#title' => t('Cookie timeout'),
    '#description' => t('Enter in days'),
    '#default_value' => variable_get('file_download_survey_cookie_timeout', 365),
  );
  
  $form['file_download_survey_message'] = array(
    '#type' => 'textarea',
    '#title' => t('Thank you message'),
    '#rows' => 10,
    '#default_value' => variable_get('file_download_survey_message', ''),
  );
  
  $form['file_download_survey_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable the feedback form popup?'),
    '#default_value' => variable_get('file_download_survey_enabled', true),
  );

  return system_settings_form($form);
}

