<?php
require 'ClassParser.php';

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
        $completePath = $dirPath . $fileName;
        $code = file_get_contents($completePath);
        $methods = $this->extractMethods($completePath, $code);

        $phpFiles[] = [
          'filePath' => $completePath,
          'code' => substr(base64_encode($code), 0, 10) . '...',
          'methods' => $methods
        ];
      }
    }

    return $phpFiles;
  }

  public function extractMethods($filePath, $code)
  {
    $parser = new ClassParser();
    $parser->parse($filePath, $code);

    $dada = $parser->getClasses();
    $methods = isset($dada[key($dada)]['functions']) ? $dada[key($dada)]['functions'] : [];

    return $methods;
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
