<?php 
include '../_config.php';
include_once 'ckeditor/ckeditor.php';

$title = "Add a Product";
include '_header.php';

$form = new Form();
$product = new Product();

$sql = 'SELECT * FROM categories'; 
$result = $mysqli->query($sql);

$errors = array();
if(!empty($_POST)){
    $posted = $product->addNew($errors);
    if($posted){
        $message = "Product was successfully added.";
    }
}

?>

<h1>Add a Product</h1>

<?php 
    if(!empty($message)){
        print '<div class="result">'.$message.'</div>';
    }
?>

<form action="" method="post" enctype="multipart/form-data" id="" class="">
    <div class="form-item">
    	<label for="name">Product Name</label>
    	<div class="input">
    	    <input type="text" id="name" name="name" />
    	    <?php print $form->fieldError('name'); ?>
	    </div>
    </div>
    
    <div class="form-item">
        	<label for="category">Product Category:</label>
        	<select name="category">
        	    <?php
            	    while($row = $result->fetch_array()){
            	        print '<option value="'.$row['id'].'">'.$row['category'].'</option>';
            	    }
        	    ?>
        	</select>
    </div>
        
    <div class="form-item">
        <label for="image">Product Image</label>
        <div class="input">
            <input type="file" id="image" name="image" />
        </div>
    </div>
        
    <div class="form-item">
        <label for="price">Product Price</label>
        <div class="input">
            <input type="text" id="price" name="price" />
            <?php print $form->fieldError('price'); ?>
        </div>
    </div>
    
   <div class="form-item">
        <label for="inventory">Inventory Count</label>
        <div class="input">
            <input type="text" id="inventory" name="inventory" />
            <?php print $form->fieldError('inventory'); ?>
        </div>
    </div>
    
    
    <div class="form-item">
        <label for="description">Description</label>
        <div class="input">
            <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['height'] = 200;
                $CKEditor->config['width'] = 500;
                $CKEditor->config['toolbar'] = array(
                    array('Source', '-', 'Bold', 'Italic'),
                    array('Image', 'Link', 'Unlink', 'Anchor'),
                    array('NumberedList', 'BulletedList'),
                    array('Format', 'FontSize')
                );
                $CKEditor->editor("description");
             ?>
             <?php print $form->fieldError('description'); ?>
        </div>
    </div>
    
    <div class="form-item">
    	<button type="submit">Submit Product</button>
    	<button type="reset">Clear Form</button>
    </div>
    
</form>


<?php include '_footer.php'; ?>