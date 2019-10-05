<?php
//importing user class
include("models/user.php");

//Controller for all actions on the sign up page
class signupController
{   

    
    //Function to move to the login page from the sign up page
    public function loginView()
    {
        header("Location: ../views/loginform.php"); /* Redirect browser */
    }

    public function signup($fname, $lname, $password, $email, $phone, $reg_date, $gender, $picture){
        $user = new user();
        $user->createUser($fname, $lname, $password, $email, $phone, $reg_date, $gender, $picture);


    }
}
