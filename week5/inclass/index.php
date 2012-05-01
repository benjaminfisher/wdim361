<?php

require_once '_config.php';

//Static global variable
define('PHONE', '555-869-5267');

// Simple MySQL query
$sql = 'SELECT * FROM categories';
$result = $mysqli->query($sql);

$where = '';
if(!empty($_GET['category'])){
    
    $where = ' WHERE category_id = '.$_GET['category'];
}

$sql2 = 'SELECT * FROM products'.$where;
$result2 = $mysqli->query($sql2);
?>


<?php
	$title = "WDIM361 - Week5";
    $page_name = "Week 5 - Inclass";
    $header_extras = "\n\t<link href=\"style.css\" rel=\"stylesheet\" />\n";
    $header_extras .= "\t<link href=\"form.css\" rel=\"stylesheet\" />\n";
    
    include_once '_header.php';
    
    // Return value of static global variable
    // echo "<p>Please call us at ".PHONE ."</p>";
?>

<form>
    <select name="category">
        <option value="">All</option>
        <?php 
            while ($row = $result -> fetch_array()) {
                echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
            }
        ?>
    </select>
    <button type="submit">Submit Human!</button>
</form>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Inventory</th>
            </tr>
        </thead>
        <tbody>
                    
        <?php while($row = $result2 -> fetch_object()): ?>
    
        	<tr>
        	    <td><img width="50px" src="images/<?= $row->image; ?>" alt="<?= $row->name; ?> image" /></td>
        	    <td><?= $row->name; ?></td>
        	    <td>$<?= $row->price; ?></td>
        	    <td><?= $row->inventory; ?></td>    	    
        	</tr>
    	
        <?php endwhile ?>
        </tbody>
    </table>

<?php // Return results for MySQL query *see above*

while($row = $result->fetch_array()){
    print $row['id'].' '. $row['category']. '<br />';
}
?>

<?php
    include '_footer.php';
?>