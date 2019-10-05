<?php

class category {
 
 
	
 
	public function getName() {
		return $this->name;
	}
 
	public function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	}
    
    public function getCategory(){
        include("config.php");

        $sql = "SELECT * FROM category";
        $view_query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($view_query)){
                        
            $catId = $row["catId"];
            $catName = $row["catName"];
            
            echo "<option value =".$catId.">" .$catName. "</option>";


          }
        
       
        return $catName;

   

    }
 
}