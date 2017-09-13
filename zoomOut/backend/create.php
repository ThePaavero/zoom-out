<?php

require 'boot.php';

$data = json_decode(file_get_contents('php://input'), true)['data'];

if ($data['type'] === 'model')
{
  $object = $data['object'];
  $fields = $object['databaseFields'];
  $className = $object['className'];
  $filePath = $rootPath . 'app/' . $className . '.php';
  if ( ! touch($filePath))
  {
    die(json_encode([
      'error' => 'Could not create new model file.'
    ]));
  }

  foreach ($fields as $field)
  {
    $columnName = $field['databaseColumnName'];
  }
}

die(json_encode([
  'success' => true
]));
