<?php
$title = "Magic Web Page Generator";
$header_extras = "<link href=\"css/style.css\" rel=\"stylesheet\" />";
$header_extras .= "\n\t<link href=\"css/form.css\" rel=\"stylesheet\" />\n";

$page_name = "Magic Web Page Generator";

include '_header.php';
?>

<form action="new_page.php" method="post">
	<label>Give it a name: 
		<input type="text" name="page_name" />
	</label>
	<label>What flavor does it has?
		<select name="doc_type" id="doc_type">
			<option value="xhtml">HTML5</option>
			<option value="html4">HTML4</option>
			<option value="html5">XHTML</option>
		</select>
	</label>
	<label>Column count:
		<input type="number" max="4" />
	</label>
	
	<button type="submit">Submit Human!</button>
	<button type="clear">Start All Over</button>
</form>











<?php include '_footer.php'; ?>