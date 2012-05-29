<?php 
class Product 
{
	public function addNew(&$errors)
	{
		if(empty($_POST['name']))
			$errors['name'] = 'Please enter a Name.';
		if(empty($_POST['description']))
			$errors['description'] = 'Please enter a description.';
		if(empty($_POST['price']) || !is_numeric($_POST['price']))
			$errors['price'] = 'Please enter a valid price.';
		if(empty($_POST['inventory']) || !is_numeric($_POST['inventory']))
			$errors['inventory'] = 'Please enter a valid inventory.';
		
		if(empty($errors))
		{
			 //ready to put into our DB..
			 //first clean the data
			$data = array();
			foreach($_POST as $key => $value)
			{
				if ($key != 'description'){
					$data[$key] = trim(strip_tags($value)); 
				} else {
					$data[$key] = $value;  //allow tags from editor
				}
			}
			
			$filename = 'img_'. time() . '.jpg'; 
			//upload the file if it exists
			$img = $_FILES['image']; 
			if(!empty($img['name']))
			{
				$imgObj = new Image();
				$up = $imgObj->postImage($img, $filename, IMG_DIR);
				$imgObj->thumbnail($filename, IMG_DIR, 150, 150);
			}
			
			//store image name to DB
			$data['image'] = $filename;
			
			//look for this function in "sqlfunctions.php"
			$result = insertData('products',$data);  
			if($result) { return true;}
		}
		return false; 
	}
	
	// get all data for a product by its id
	public function getInfo($id){
		$select = sqlquery("SELECT * FROM products WHERE id = $id");
		if(!empty($select['data'][0])){
			return $select['data'][0]; 
		}
		return false; 
	}
	
	//update the product based on POST data
	public function update(){
		if(empty($_POST['id'])){ 
			return false; 
		}
		
		if(empty($_POST['name']))
			$errors['name'] = 'Please enter a Name.';
		if(empty($_POST['description']))
			$errors['description'] = 'Please enter a description.';
		if(empty($_POST['price']) || !is_numeric($_POST['price']))
			$errors['price'] = 'Please enter a valid price.';
		if(empty($_POST['inventory']) || !is_numeric($_POST['inventory']))
			$errors['inventory'] = 'Please enter a valid inventory.';
		
		if(empty($errors))
		{
			 //ready to put into our DB..
			 //first clean the data
			$data = array();
			foreach($_POST as $key => $value)
			{
				if ($key != 'description'){
					$data[$key] = trim(strip_tags($value)); 
				} else {
					$data[$key] = $value;  //allow tags from editor
				}
			}
			
			//changing the image is optional
			if(!empty($_FILES['image'])) {
				$filename = 'img_'. time() . '.jpg'; 
				//upload the file if it exists
				$img = $_FILES['image']; 
				if(!empty($img['name']))
				{
					$imgObj = new Image();
					$up = $imgObj->postImage($img, $filename, IMG_DIR);
					$imgObj->thumbnail($filename, IMG_DIR, 150, 150);
				}
				
				//store image name to DB
				$data['image'] = $filename;
			}
			//look for this function in "sqlfunctions.php"
			$result = updateData('products',$data, 'id');  
			
			if($result) { return true;}
		}
		return false; 
		
	}
	
}









