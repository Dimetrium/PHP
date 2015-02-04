<?php
class Editor
{
  private $f_import; 
  private $f_export;
	
  public function __construct()
  {
    $this->f_import = file(F_IMPORT);
    $this->f_export = file(F_EXPORT);
  } 
	
//	public function __destruct()
//	{
//file_put_contents(F_EXPORT, $this->f_import);
//	}
	
  public function printFile($lineNum = '')
	{
		return $this->f_import;
	}
	
  public function getLine($selectLine)
  {
    return $this->f_import[$selectLine];
  }
	
	public function getChar($selectCharLine, $selectCharPosition)
	{
		return $this->f_import[$selectCharLine][$selectCharPosition];
	}

	public function replaceLine($getRepLine, $replaceLine)
	{
		$this->f_import[$getRepLine] = $this->f_import[$replaceLine];
		return $this->f_import;
	}	
	
	public function replaceChar($getCharLine, $getCharNum, $replacedChar)
	{
		$this->f_import[$getCharLine][$getCharNum] = $replacedChar;
		return $this->f_import;
	}
	
	public function exportFile()
	{
		file_put_contents(F_EXPORT, $this->f_import);
	}

	public function printExportFile()
	{
		return $this->f_export;
	}
	
}




?>