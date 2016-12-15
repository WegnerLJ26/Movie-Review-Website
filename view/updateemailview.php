<!-- right column: content section -->

	<div class='col-xs-9'>
	
	  <h3>Update Email Address</h3>
			
		<form action='index.php' method='post'>
			Current Email:<br>
			<input type='text' name='email' value='<?php echo $email; ?>'><br><br>
			<input type='submit' value='Change Email'>
			<input type='hidden' name='mode' value='email'>
		</form>
		
