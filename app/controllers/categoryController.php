<?php
//importing book class
include("models/category.php");

//Controller for all actions on the Addbook page
class categoryController
{

    public function fetchCategory(){
        $category = new category();
        $category->getCategory();
        
    }
}


