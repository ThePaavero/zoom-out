<?php

require 'boot.php';

$data = json_decode(file_get_contents('php://input'), true);
die(json_encode($data));
