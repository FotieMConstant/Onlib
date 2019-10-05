<?php
//Controller for all buttons action on the index page/ Landing page
class indexController
{
    public function loginView()
    {
      
        header("Location: ../app/views/loginform.php"); /* Redirect browser */
  
    }

    public function signUp()
    {
        header("Location: ../app/views/signupform.php"); /* Redirect browser */
    }
}
