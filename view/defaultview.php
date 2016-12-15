<!-- right column: content section -->

      <div class='col-sm-4'>
	<div id='page-content'></div>
 <?php 
	if (isset($_SESSION['user'])){
		echo "Please select a task";
  }  else {
?>

         <h3>Welcome to the Reviewer's Section</h3>
	 <h4>Please sign in</h4>
	<form action='index.php?mode=checkLogin' method='post'>
	<table class='table'>
	  <tr>
		<td>Username: </td>
	<td><input type='text' name='username' placeholder='Enter username' /></td>
	  </tr>
	  <tr>
		<td>Password:</td>
		<td><input type='password' placeholder='Enter password' name='pwd' /></td>
	   </tr>
	</table>
	<p><button type='submit' class='btn btn-primary' >Sign in </button>
	   <button type='reset' class='btn' >Clear</button>
	</p>
	</form>
	</section>
	</div>


	<div class='col-sm-4'>
	<h4>Please register here</h4>
	<form action='index.php?mode=checkRegister' method='post'>
	<table class='table'>
	  <tr>
	    <td>Username: </td>
	  <td><input type='text' name='reg_username' placeholder='Enter username' /></td>
	   </tr>
	   <tr>
	   	 <td>Password: </td>
	   	 <td><input type='password' placeholder='Enter password' name='reg_pwd' /></td>
	   </tr>
	    <tr>
	    	<td>First Name: </td>
	    	<td><input type='text' placeholder='Enter First Name' name='reg_fn' /></td>
	    </tr>
	    <tr>
	    	<td>Last Name: </td>
	    	<td><input type='text' placeholder='Enter Last Name' name='reg_ln' /></td>
	    </tr>
	    <tr>
	    	<td>Email: </td>
	    	<td><input type='text' placeholder='Enter Email Address' name='reg_email' /></td>
	    </tr>
	    </table>
	    <p><button type='submit' class='btn btn-primary' >Register</button>
	       <button type='reset' class='btn'>Clear</button>
	    </p>
	    </form>

     </div>
<?php
} // end if else
