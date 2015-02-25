<?php 
class Model
{ 
  private $name;
  private $email;
  private $select;
  private $message;
  private $errors;
  private $send;
  private $sendedEmail;
  private $allert = 'danger';
  private $hidden = HIDDEN;
  
  public function __construct()
  {
    $this->select = 'Select Subject';
  }
  
  public function clearVars($var)
  {
    return trim(strip_tags($var));
  }
  
  public function getArray()
  {	    
    return array(
      '%TITLE%'=>'Contact Form', 
      '%ERRORS%'=>$this->errors, 
      '%STYLE%'=>STYLE,
      '%NAME%' =>$this->name,
      '%EMAIL%' =>$this->email,
      '%SELECT%' =>$this->select,
      '%INFORM%' =>$this->sendedEmail,
      '%MESSAGE%' =>$this->message,
      '%HIDDEN%' => $this->hidden,
      '%ALLERT%' => $this->allert
    );	
  }

  public function checkForm()
  {
    //Name check
    $this->name = $this->clearVars( $_POST["name"] );
    if (empty($this->name))
    {
      $this->errors .= "Name can be empty<br>";
      $this->hidden = '';
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $this->name)) 
    {
      $this->errors .= "Only letters and white space allowed<br>"; 
      $this->hidden = '';
    }
    else
    {
      $this->name;
    }

    //email check
    $this->email = $this->clearVars($_POST["e-mail"]);
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
    {
      $this->errors .= "Invalid email format<br>"; 
      $this->hidden = '';
    }
    
    //select check
    $this->select = $this->clearVars($_POST["select"]);
    if ($this->select === 'Select Subject')
    {
      $this->errors .= "You Must Select subject!<br>";
      $this->hidden = '';
    }
    else
    {
      $this->select;
    }
    
    //comment chk
    $this->message = $this->clearVars($_POST["comment"]);
    if (empty($this->message)) 
    {
      $this->errors .= "Comment is empty<br>"; 
      $this->hidden = '';
    } 
    else 
    {
      $this->message;
    }

    //errors checkout
    if(is_null($this->errors))
    {
      return true;
    }
    else
    {
      return false;
    }    
  }
  
  public function sendEmail()
  {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
    {
      $browser = 'firefox';
    }
    elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
    {
      $browser = 'chrome';
    }
    elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0'))
    {
      $browser = 'ie8';
    }
    elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
    {
      $browser = 'opera';
    }
    else
    {
      $browser = 'unknow browser';
    }

    $headers = "From: $this->email \r\n"."Reply-To: $this->email \r\n";
    $ip = $_SERVER["REMOTE_ADDR"];
    $this->send = mail( TO, 
      $this->select, 
      "$this->message\r\nBest Regards, 
       $this->name\r\nip: $ip\r\nBrowser: $browser", 
       $headers );   
    if( !is_null( $this->send ) )
    {
      $this->sendedEmail = 'Your Email was sended!';
      $this->hidden = '';
      $this->allert = 'success';
      $this->name = '';
      $this->email = '';
      $this->message = '';
      $this->select = 'Select Subject';
      return true;
    }	
    else
    {
      return false;
    }
  }  
}
