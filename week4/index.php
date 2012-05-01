<?php
$title = "Magic Web Page Generator";
$header_extras = "<link href=\"css/style.css\" rel=\"stylesheet\" />";
$header_extras .= "\n\t<link href=\"css/form.css\" rel=\"stylesheet\" />\n";

$page_name = "Magic Web Page Generator";

include '_header.php';
?>

<form action="new_page.php" method="post">
	<fieldset>
		<legend>Page Info</legend>
		<label>Give it a name: 
			<input type="text" name="page_name" />
		</label>
		<label>What flavor does it has?
			<select name="doc_type" id="doc_type">
				<option value="html5">HTML5</option>
				<option value="html4">HTML4</option>
				<option value="xhtml">XHTML</option>
			</select>
		</label>
		<label>Column count:
			<input type="number" max="4" name="page_columns"/>
		</label>
	</fieldset>
	
	<fieldset>
		<legend>Navigation Info</legend>
		<label>Tag Type:
			<select name="nav_tag_type" id="nav_tag_type">
				<option value="nav">nav</option>
				<option value="div">div</option>
			</select>
		</label>
		<label>Navigation Location:
			<select name="nav_location" id="nav_location">
				<option value="top">Top</option>
				<option value="left">Left</option>
				<option value="right">Right</option>
			</select>
		</label>
		<label>Number of Links:
			<input type="number" max="10" name="nav_link_count"/>
		</label>
	</fieldset>
	
	<button type="submit" class="clr">Submit Human!</button>
	<button type="reset">Start All Over</button>
</form>

<hr />
<p>Fill in the details, then submit and save the results. Don't forget to save the CSS file.</p>


<?php include '_footer.php'; ?>