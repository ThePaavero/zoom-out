<?php

class Analyzer
{
  protected $rootDirPath;

  public function __construct($rootDirPath)
  {
    $this->rootDirPath = $rootDirPath;
  }

  public function getPhpFilesFromDir($dirPath)
  {
    $all = scandir($dirPath);
    $phpFiles = [];
    foreach ($all as $fileName)
    {
      if (substr($fileName, - 4) === '.php')
      {
        $phpFiles[] = $dirPath . $fileName;
      }
    }

    return $phpFiles;
  }

  public function getStructure()
  {
    $files = [
      'controllers' => [],
      'models' => [],
      'migrations' => []
    ];
    $fileTypesToDirPath = [
      'controllers' => 'app/Http/Controllers/',
      'models' => 'app/',
      'migrations' => 'database/migrations/'
    ];

    foreach ($fileTypesToDirPath as $fileType => $dirPath)
    {
      $files[$fileType] = $this->getPhpFilesFromDir($this->rootDirPath . $dirPath);
    }

    return $files;
  }
}
