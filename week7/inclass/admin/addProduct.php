<?php 
include '../_config.php';
include_once 'ckeditor/ckeditor.php';

$title = "Add a Product";
include '_header.php';

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
        <label for="name">Product Name</label>
        <div class="input">
            <input type="text" id="name" name="name" />
            <?php print $form->fieldError('product'); ?>
        </div>
    </div>
</form>


<?php include '_footer.php'; ?>