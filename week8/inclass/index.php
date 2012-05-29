<?php 
	$title = "Main Page";
	include_once '_header.php'; 
	include_once '_config.php'; 
	
	$sql = 'SELECT * FROM categories'; 
	$result = $mysqli->query($sql); 	
	
	$where = ''; 
	if(!empty($_GET['category'])) { 
		$where = ' WHERE category_id = '.$_GET['category']; 
	}
	$sql2 = 'SELECT * FROM products'.$where; 
	$result2 = $mysqli->query($sql2); 	
	
?>
	<form action="">
		Category: <select name="category">
			<option value="">--Show All--</option>
			<?php
			while($row = $result->fetch_array()){
				print '<option value="'.$row['id'].'">'.$row['category'].'</option>';
			}
			?>
		</select>
		<input type="submit" value="filter" />
	</form>
	
	<h2>Our Products</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Inventory</th>
		</tr>
	
		<?php while($row = $result2->fetch_array()){ ?>
				<tr>
				<td><?php print $row['id']; ?></td>
				<td><img src="images/<?php print $row['image'] ?>" width="100" alt="" /></td>
				<td><?php print $row['name']; ?></td>
				<td><?php print $row['price']; ?></td>
				<td><?php print $row['inventory']; ?></td>
				</tr>
		<?php } ?>
		
	</table>
	
	
<?php
	include_once '_footer.php'; 
?>







