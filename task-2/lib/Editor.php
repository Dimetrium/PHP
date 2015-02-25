<?php
class Editor
{
  private $fileHolder; 
  private $fileExport;

/**
 * Autoload file for processing
 * @FILE_IMPORT - input.txt 
 * @FILE_EXPORT - output.txt 
 **/
  public function __construct()
  {
    $this->fileHolder = file(FILE_IMPORT);
    $this->fileExport = file(FILE_EXPORT);
  } 
	
  public function printFile($lineNum = '')
	{
    return $this->fileHolder;
	}
	
  public function getLine($selectLine)
  {
    return $this->fileHolder[$selectLine];
     
  }
	
	public function getChar($selectCharLine, $selectCharPosition)
	{
		return $this->fileHolder[$selectCharLine][$selectCharPosition];
	}

	public function replaceLine($getRepLine, $replaceLine)
	{
		$this->fileHolder[$getRepLine] = $this->fileHolder[$replaceLine];
		return $this->fileHolder;
	}	
	
	public function replaceChar($getCharLine, $getCharNum, $replacedChar)
	{
		$this->fileHolder[$getCharLine][$getCharNum] = $replacedChar;
		return $this->fileHolder;
	}
	
	public function exportFile()
	{
		file_put_contents(FILE_EXPORT, $this->fileHolder);
	}

	public function printExportFile()
	{
		return $this->fileExport;
	}
	
}




?>
