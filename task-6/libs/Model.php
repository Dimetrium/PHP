<?php 
class Model
{ 
  private $name;
  private $email;
  private $select;
  private $message;
  private $errors;
  private $send;
  public function __construct()
  {
  }
  // public function clearVar($var)
  // {
  //   return trim(strip_tags($var));
  // }
  public function getArray()
  {	    
    return array(
      '%TITLE%'=>'Contact Form', 
      '%ERRORS%'=>$this->errors, 
      '%STYLE%'=>STYLE,
      '%NAME%' =>$this->name,
      '%EMAIL%' =>$this->email,
      '%INFORM%' =>$this->sendedEmail,
      '%MESSAGE%' =>$this->message
    );	
  }

  public function checkForm()
  {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    $this->name = $_POST["name"];
    if (empty($this->name))
    {
      $this->errors .= "Name can be empty<br>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $this->name)) 
    {
      $this->errors .= "Only letters and white space allowed<br>"; 
    }
    else
    {
      $this->name;
    }

    $this->email = $_POST["e-mail"];
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
    {
      $this->errors .= "Invalid email format<br>"; 
    }

    if (empty($_POST["comment"])) 
    {
      $this->errors .= "Comment is empty<br>"; 
    } 
    else 
    {
      $this->message = $_POST["comment"];
    }

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
    $this->send = mail(TO, $this->select,"$this->massage\r\nBest Regards,
    $this->name\r\nip: $ip\r\nBrowser: $browser", $headers);   
    if(!is_null($this->send))
    {
      return true;
    }	
    else
    {
      return false;
    }
  }  
}
