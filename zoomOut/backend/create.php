<?php

require 'boot.php';

$data = json_decode(file_get_contents('php://input'), true)['data'];
die(json_encode($data));
/*$fields = $data['databaseFields'];
$className = $data['className'];

foreach ($fields as $field)
{
  if (empty($field))
  {
    // @todo Why do we do this here?
    continue;
  }

  $columnName = $field['databaseColumnName'];
}*/
