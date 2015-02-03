<?php
class Editor
{
  private $f_import = F_IMPORT; 
  private $f_export = F_EXPORT;
  private $full_file;
  public function __construct()
  {
    $this->full_file  = file($f_import);
    return 
  } 

  public function getLine($lineNum)
  {
    $result = $this->full_file[$lineNum];
    return $result;
  }

}

?>
