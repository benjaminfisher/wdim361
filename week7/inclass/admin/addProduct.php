<?php 
include '../_config.php';
include_once 'ckeditor/ckeditor.php';

$title = "Add a Product";
include '_header.php';

$sql = 'SELECT * FROM categories'; 
$result = $mysqli->query($sql);

$form = new Form();

?>

<h1>Add a Product</h1>

<form action="submit" method="post" enctype="multipart/form-data" id="" class="">
    <div class="form-item">
    	<label for="name">Product Name</label>
    	<div class="input">
    	    <input type="text" id="name" name="name" />
    	    <?php print $form->fieldError('product'); ?>
	    </div>
    </div>
    
    <div class="form-item">
        	<label for="category">Product Category:</label>
        	<select name="category">
        	    <option value="">--Show All--</option>
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
        </div>
    </div>
    
</form>


<?php include '_footer.php'; ?>