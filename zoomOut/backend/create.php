<?php

require 'boot.php';

$data = json_decode(file_get_contents('php://input'), true)['data'];

if ($data['type'] === 'model')
{
  $object = $data['object'];
  $fields = $object['databaseFields'];
  $className = $object['className'];
  $modelFilePath = $rootPath . 'app/' . $className . '.php';

  if (file_exists($modelFilePath))
  {
    die(json_encode([
      'error' => 'Model file already exists.'
    ]));
  }
  if ( ! touch($modelFilePath))
  {
    die(json_encode([
      'error' => 'Could not create new model file.'
    ]));
  }
  $template = file_get_contents(__DIR__ . '/templates/model.php');
  $fillableCode = 'protected $fillable = [' . PHP_EOL;
  foreach ($fields as $field)
  {
    $columnName = $field['databaseColumnName'];
    $fillableCode .= tabs(2) . "'" . $columnName . "'," . PHP_EOL;
  }
  $fillableCode .= tabs(1) . '];';
  $template = str_replace('MODELCLASSNAME', $className, $template);
  $template = str_replace('// FILLABLE', $fillableCode, $template);
  file_put_contents($modelFilePath, $template);
}

die(json_encode([
  'success' => true
]));
