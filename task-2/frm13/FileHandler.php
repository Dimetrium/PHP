<?php

class FileHandler
{
    private $lines;
    
    public function __construct()
    {
        $this->lines = file(ORIGINAL);
    }
    
    public function find($lineNum, $charNum = null)
    {
        $lineNum -= 1;
        if (isset($charNum)) {
            $charNum -= 1;
            $result = $this->lines[$lineNum][$charNum];
        } else {
            $result = $this->lines[$lineNum];
        }
        return $result;
    }
    
    public function replaceChar($lineNum, $charNum, $replace)
    {
        $lineNum -= 1;
        $charNum -= 1;
        $this->lines[$lineNum][$charNum] = $replace;
    }
    
    public function replaceLine($lineNum, $replace)
    {
        $lineNum -= 1;
        $this->lines[$lineNum] = $replace;
    }
    
    public function getLines()
    {
        return $this->lines;
    }
    
    
    public function write()
    {
        $handle = fopen(NEW_FILE, 'w');
        
        foreach ($this->lines as $line) {
            fwrite($handle, $line);
        }
        
        fclose($handle);
    }
}