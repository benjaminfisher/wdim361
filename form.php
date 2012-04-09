<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>WDIM361 | Assignment 1</title>
</head>
<body>
	<h1>AiPD Departments Redesign Survey</h1>
	<form action="processForm.php" method="post">
		<p>
			<fieldset>
				<legend>Program Information</legend>
				<label>Program: <input type="text" name="program" placeholder="What's your program" autofocus /></label><br />
				<label>Year:
					<input type="radio" name="programYear" value="1" />1rst
					<input type="radio" name="programYear" value="2" />2nd
					<input type="radio" name="programYear" value="3" />3rd
					<input type="radio" name="programYear" value="4" />4th
				</label><br />
				
			</fieldset>
			
			<fieldset>
				<legend>Commute</legend>
				<label>Housing: <br />
					Off Campus <input type="radio" name="housing" value="off campus">
					Dorm <input type="radio" name="housing" value="dorm" /><br />
				</label>
				<label>How do you reach the school (select multiple if appropriate):
					<input type="checkbox" name="travelType" />Drive
					<input type="checkbox" name="travelType" />Bus
					<input type="checkbox" name="travelType" />Walk
				</label><br />
				<label>How far do you travel to reach the school: <br />
					<input type="number" name="commuteDistance" min="1"/> <span>Miles</span>
				</label>
			</fieldset>
			<fieldset>
				<legend>Website Use</legend>
				<label>How often do you access the website?: <input type="number" name="useFrequency"/></label>
				<select name="usePeriod">
					<option value="weekly">weekly</option>
					<option value="monthly">monthly</option>
				</select><br />
				<label>What part of the site do you access most often?: <input type="text" name="primaryAccess"/></label><br />
				<label>What other part of the site do you access frequently?: <input name="secondaryAccess" type="text" /></label><br />
				<label>What is the site missing?</br>
					<input type="textarea" name="siteComments"/>
				</label>
			</fieldset>
			
			<fieldset>
				<legend>Contact Information:</legend>
				<label>May we contact you for user testing:
					<input type="checkbox" name="contact" />Yes
				</label><br />
				<p>If so please fill out the following information:</p>
				<label>Name: <input type="text" name="studentName" /></label><br />
				<label>Daytime Phone: <input type="tel" name="studentPhoneNumber" /></label><br />
				<label>Email: <input type="email" name="studentEmailAddress" /></label>
			</fieldset>
			<button type="submit">Submit</button>
		</p>
	</form>
</body>
</html>