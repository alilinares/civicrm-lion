<?php
return [
  'lion_text' => [
    'name' => 'lion_text',
    'type' => 'String',
    'title' => ts('Lion Setting Text'),
    'description' => ts('just a random settings from the lion module'),
    'default' => FALSE,
    'add' => '5.70',
    'html_type' => 'text',
    'is_domain' => 0,
    'is_contact' => 0,
    'settings_pages' => ['lion' => ['weight' => 2]],
  ],
];