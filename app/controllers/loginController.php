<?php

//Controller for all buttons action on the index page/ login index
include("models/user.php");

//Controller for all actions on the login page
class loginController
{
    //Function to move to the sign up page from the login page
    public function signUp()
    {
        header("Location: ../views/signupform.php"); /* Redirect browser */
    }


    public function login($email, $password)
    {
        $userLogin = new user();

        //Call function from the user model(class in the model folder)
        $userLogin->loginUser($email, $password);
      
        
  
    }
}
