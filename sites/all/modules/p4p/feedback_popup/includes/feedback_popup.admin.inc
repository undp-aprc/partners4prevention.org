<?php

/**
 * Admin form.
 */
function feedback_popup_admin() {
  $form = array();

  $form['feedback_popup_threshold'] = array(
    '#type' => 'textfield',
    '#title' => t('Threshold'),
    '#description' => t('Enter in minutes'),
    '#default_value' => variable_get('feedback_popup_threshold', 15),
  );

  $form['feedback_popup_cookie_timeout'] = array(
    '#type' => 'textfield',
    '#title' => t('Cookie timeout'),
    '#description' => t('Enter in days'),
    '#default_value' => variable_get('feedback_popup_cookie_timeout', 365),
  );
  
  $form['feedback_popup_message'] = array(
    '#type' => 'textarea',
    '#title' => t('Thank you message'),
    '#rows' => 10,
    '#default_value' => variable_get('feedback_popup_message', ''),
  );
  
  $form['feedback_popup_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable the feedback form popup?'),
    '#default_value' => variable_get('feedback_popup_enabled', true),
  );

  return system_settings_form($form);
}

