<?php

require 'lib/Analyzer.php';

$analyzer = new Analyzer(__DIR__ . '/../www/');
$structure = $analyzer->getStructure();

echo '<pre>';
var_dump($structure);
echo '</pre><hr>';
