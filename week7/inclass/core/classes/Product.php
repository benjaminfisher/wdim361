<?php 
class Product{
    
    public function addNew(&$errors){
        if(empty($_POST['name'])) $errors['name'] = "Please enter a Product Name";
        if(empty($_POST['description'])) $errors['description'] = "Please enter a Product Description.";
        if(empty($_POST['price'])) $errors['price'] = "Please enter a Product Price.";
        if(empty($_POST['inventory']) || !is_numeric($_POST['inventory'])) $errors['inventory'] = "Please enter a valid inventory count.";
        
        if(empty($errors)){
            // Ready to add data to DB
            
            return TRUE;
        }
        
        return false;
    }
}

 ?>