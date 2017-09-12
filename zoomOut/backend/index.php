<?php

require 'lib/Analyzer.php';

$analyzer = new Analyzer(__DIR__ . '/../../www/');
$structure = $analyzer->getStructure();

header('Access-Control-Allow-Origin: *');

die(json_encode($structure));
