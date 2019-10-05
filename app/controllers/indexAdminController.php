<?php
//Controller for all buttons action on the index page/ admin index
include("models/admin.php");


class indexAdminController
{
    
    public function login($email, $password)
    {
        $adminLogin = new admin();

        //Call function from the admin model(class in the model folder)
        $adminLogin->loginAdmin($email, $password);
      
        
  
    }

}
?>