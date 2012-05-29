<?php 
include '../_config.php';
include_once "ckeditor_3.6.3/ckeditor/ckeditor.php";  
$title = 'Add a Product'; 
include '_header.php';
$form = new Form();
$product = new Product(); 

$sql = 'SELECT * FROM categories'; 
$result = $mysqli->query($sql); 

$errors = array();
if(!empty($_POST)) {
	if(empty($_POST['id'])) {
		$posted = $product->addNew($errors);
		if($posted) { 
			$message = 'Product was successfully added.';
		}
	} else { 
		$posted = $product->update($errors);
		if($posted) { 
			$message = 'Product was successfully updated.';
		}
	}
		
	
}

//the id is here if they are editing a product
if(!empty($_GET['id'])) { 
	$data = $product->getInfo($_GET['id']); 
	$h1 = 'Edit Product'; 
	$img = '<img src="../images/t_'. $data['image'] .'" width="100" alt="" />';
	
} else { //they are adding a new product
	$h1 = 'Add Product';
	$data['name'] = '';	
	$data['description'] = '';	
	$data['inventory'] = '';	
	$data['price'] = '';
	$data['id'] = '';
	$img = ''; 	
}

?>
<h1><?php print $h1; ?></h1>

<?php 
	if(!empty($message)) { 
		print '<div class="result">'.$message.'</div>';
	}
?>

<form action="" method="post" enctype="multipart/form-data" id="" class="">
	<input type="hidden" name="id" value="<?php print $data['id'] ?>" />
	
	<div class="form-item ">
		<label>Product Name <span class="req">*</span></label>
		<div class="input">
			<input type="text" id="name" name="name" value="<?php print $data['name'] ?>"/>
			<?php print $form->fieldError('name'); ?> 
		</div>
	</div>
	
	<div class="form-item ">
		<label>Category:</label>
		<select name="category">
			<option value="">-- Select --</option>
			<?php
			while($row = $result->fetch_array()){
				if($data['id'] == $row['id']) { 
					print '<option selected value="'.$row['id'].'">'.$row['category'].'</option>';
				} else { 
					print '<option value="'.$row['id'].'">'.$row['category'].'</option>';
				}
			}
			?>
		</select>
	</div>
	
	<?php print $img; ?>
	
	<div class="form-item ">
		<label for="image">Image</label>
		<div class="input">
			<input type="file" id="image" name="image" />
		</div>
	</div>
	
	<div class="form-item ">
		<label>Price</label>
		<div class="input">
			<input type="text" id="price" name="price" value="<?php print $data['price'] ?>"/>
			<?php print $form->fieldError('price'); ?> 
		</div>
	</div>
	<div class="form-item ">
		<label>Inventory</label>
		<div class="input">
			<input type="text" id="inventory" name="inventory" value="<?php print $data['inventory'] ?>"/>
			<?php print $form->fieldError('inventory'); ?> 
		</div>
	</div>
	
	
	<div class="form-item ">
		<label for="description">Description</label> 
		<div class="input"><?php
		$CKEditor = new CKEditor();
		$CKEditor->config['height'] = 200;
		$CKEditor->config['width'] = 500;
		$CKEditor->config['toolbar'] = array(
				array('Source', '-', 'Bold', 'Italic'),
				array('Image', 'Link', 'Unlink', 'Anchor'),
				array('NumberedList','BulletedList','-','Outdent','Indent'),
				array('Format','FontSize')
			);
		$CKEditor->editor("description", $data['description']);
		?></div>
	</div>
	
	
	<div class="form-item ">
		<input type="submit" value="submit" />
	</div>
</form>
	
<?php
include '_footer.php';
?>









