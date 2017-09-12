<?php

class Analyzer
{
  protected $rootDirPath;

  public function __construct($rootDirPath)
  {
    $this->rootDirPath = $rootDirPath;
  }

  public function getStructure()
  {
    return [];
  }
}
