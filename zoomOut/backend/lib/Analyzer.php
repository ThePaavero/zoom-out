<?php
require 'ClassParser.php';

class Analyzer
{
  protected $rootDirPath;
  protected $ignoreFileNames;

  public function __construct($rootDirPath)
  {
    $this->rootDirPath = $rootDirPath;
    $this->ignoreFileNames = [
      'Controller.php'
    ];
  }

  public function getPhpFilesFromDir($dirPath)
  {
    $all = scandir($dirPath);
    $phpFiles = [];

    foreach ($all as $fileName)
    {
      if (substr($fileName, - 4) != '.php' || in_array($fileName, $this->ignoreFileNames))
      {
        continue;
      }

      $completePath = $dirPath . $fileName;
      $code = file_get_contents($completePath);
      $data = $this->extractData($completePath, $code);

      $phpFiles[] = [
        'filePath' => $completePath,
        'code' => substr(base64_encode($code), 0, 10) . '...',
        'className' => $data['name'],
        'methods' => isset($data['functions']) ? $this->methodsIntoArray($data['functions']) : []
      ];
    }

    return $phpFiles;
  }

  public function methodsIntoArray($functions)
  {
    $return = [];
    foreach ($functions as $key => $val)
    {
      $val['name'] = $key;
      $return[] = $val;
    }

    return $return;
  }

  public function extractData($filePath, $code)
  {
    $parser = new ClassParser();
    $parser->parse($filePath, $code);

    $data = $parser->getClasses();

    return $data[key($data)];
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
