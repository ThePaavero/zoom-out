<?php

require 'boot.php';
require 'lib/Analyzer.php';

$analyzer = new Analyzer($rootPath);
$structure = $analyzer->getStructure();

die(json_encode($structure));
