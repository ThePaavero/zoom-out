<?php

require 'lib/Analyzer.php';

$analyzer = new Analyzer(__DIR__ . '/../../www/');
$structure = $analyzer->getStructure();

die(json_encode($structure));
