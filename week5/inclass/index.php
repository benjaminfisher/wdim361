<?php

require_once '_config.php';

//Static global variable
define('PHONE', '555-869-5267');

// Simple MySQL query
$sql = 'SELECT * FROM categories';
$result = $mysqli->query($sql);


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
        <?php 
            while ($row = $result -> fetch_array()) {
                echo '<option valude="'.$row['id'].'">'.$row['category'].'</option>';
            }
        ?>
    </select>
</form>


<?php // Return results for MySQL query *see above*

while($row = $result->fetch_array()){
    print $row['id'].' '. $row['category']. '<br />';
}
?>

<?php
    include '_footer.php';
?>