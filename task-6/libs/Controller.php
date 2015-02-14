<?php

class Controller
{
		private $model;
		private $view;

      public function __construct()
      {		
        $this->model = new Model();
        $this->view = new View(TEMPLATE);	
          
        if(isset($_POST['email']))
        {	
          $this->pageSendMail();
        }
        else
        {
          $this->pageDefault();	
        }
        
        $this->view->templateRender();			
	    }	
		
		private function pageSendMail()
		{
			if( true === $this->model->checkForm())
			{
        $this->model->sendEmail();
      }
			$mArray = $this->model->getArray();		
	    $this->view->addToReplace($mArray);	
      return $this->pageDefault();    
		}	
			    
		private function pageDefault()
    { 
      
		  $mArray = $this->model->getArray();		
	    $this->view->addToReplace($mArray);			   
		}				
}
