<?php 

class Model
{ 
  private $name;
  private $email;
  private $select;
  private $message;
  private $errors;
  public function __construct()
  {
  }
 // public function clearVar($var)
 // {
 //   return trim(strip_tags($var));
 // }
  public function getArray()
  {	    
      echo '<pre>';
      var_dump($this->errors);
      echo '</pre>';
    return array(
      '%TITLE%'=>'Contact Form', 
      '%ERRORS%'=>$this->errors, 
      '%STYLE%'=>STYLE,
      '%NAME%' =>$this->name,
      '%EMAIL%' =>$this->email,
      '%MESSAGE%' =>$this->message
    );	
  }

  public function checkForm()
  {
    $this->name = $_POST["name"];
    if (empty($this->name))
    {
      $this->errors .= "Name can be empty\n";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $this->name)) 
    {
      $this->errors .= "Only letters and white space allowed"; 
    }
    else
    {
      $this->name;
    }

    $this->email = $_POST["email"];
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->errors .= "Invalid email format\n"; 
    }

    if (empty($_POST["comment"])) 
    {
      $comment = "";
    } 
    else 
    {
      $comment = clearVar($_POST["comment"]);
    }

   // if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //   if (empty($_POST["name"])) {
   //     $this=>errors .= "Name is required";
   //   } else {
   //     $this->name = $_POST["name"];
   //   }

   //   if (empty($_POST["email"])) {
   //     $emailErr = "Email is required";
   //   } else {
   //     $email = clearVar($_POST["email"]);
   //   }
      return true;			
  }


    public function sendEmail()
    {
      // return mail()
    }		
  }
