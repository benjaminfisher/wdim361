<?php include '_header.php'; ?>

<form action="animal_result.php" method="post">
	<label>Pick a furry friend:
		<select name="animals">
			<option value="0">Tazmanian Devil</option>
			<option value="1">Honey Badger</option>
			<option value="2">Laughing Hyena</option>
			<option value="3">Piranha</option>
			<option value="4">Turkey Buzzard</option>
		</select>
	</label>
	<button type="submit">Submit Human!</button>
</form>

<?php include '_footer.html'; ?>
