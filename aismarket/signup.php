<?php
require "dbconn.php";
if (isset($_POST['sign-up']))
{
  

  $goto_url="";
  $username = $_POST['user'];
  $email = $_POST['email'];
  $pass1 = $_POST['password1'];
  $pass2 = $_POST['password2'];

  if (empty($username)||empty($email)||empty($pass1)||empty($pass2))
  {
      header("Location:index.php?error=emptyfield&user=".$username."&email=".$email);
      exit();
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) )
  {
    header("Location:index.php?error=invalidemailanduser");
    exit();
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    header("Location:index.php?error=invalidemail&user=".$username);
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
  {
    header("Location:index.php?error=invaliduser&email=".$email);
    exit();
  }
  else if($pass1 !== $pass2  )
  {
    header("Location:index.php?error=passwordcheck&email=".$email."&user=".$username);
    exit();
  }
  else 
  {
    
    //$sql= "SELECT U_FULLNAME FROM USERS WHERE U_FULLNAME=? ;";
    //$link=mysqli_connect("localhost", "aismarket", "12<34", "aismarket");
    $stmt= mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt,"SELECT 'U_FULLNAME' FROM USERS WHERE U_FULLNAME=? ;"))
    {
      header("Location:index.php?error=sqlerror1");
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt,"s",$username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $result=mysqli_stmt_num_rows($stmt);
      if($result >0)
      {
        header("Location:index.php?error=usernametaken&email=".$email);
        exit();
      }
      else
      {
        //$sql= "INSERT INTO 'USERS'('U_FULLNAME','U_EMAIL','U_PASSWD') VALUES(?,?,?);";
        $stmt= mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt,"INSERT INTO USERS(U_FULLNAME,U_EMAIL,U_PASSWD) VALUES(?,?,?)"))
        {
         header("Location:index.php?error=sqlerror2");
        exit();
        }
        else
        {
          mysqli_stmt_bind_param($stmt,"sss",$username,$email,$pass1);
          mysqli_stmt_execute($stmt);
          //$goto_url="signup.php";
          header("Location:login.php?singup=sucesses");
          exit();
        }
      }

    }
   
  }

  mysqli_stmt_close($stmt);
  mysqli_close($link);

}
else
{
  header("Location:sing.php?signup");
  exit();
}