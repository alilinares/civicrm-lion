<?php
return [
  [
    'name' => 'lion_contact',
    'entity' => 'Individual',
    'params' => [
      'version' => 4,
      'values' => [
        'contact_type' => 'Individual',
        'first_name' => 'Jane',
        'last_name' => 'Smith',
      ],
      'match' => ['name'],
      'update' => 'always'
    ],
  ],
];