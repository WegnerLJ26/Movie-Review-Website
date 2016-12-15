<?php
    session_start();
     // include database connection info
     include('samplepdo_connect.php');
    // include functions needed to data from the database
     include('model/model.php');
     // Read the main task using the primary key 'mode'
     $mode = '';
	
      if (isset($_REQUEST['mode']))
           $mode = $_REQUEST['mode'];

		

     switch ($mode) {
	case 'checkLogin' :

		$data = checkValidUser();
		if (isset($data) && isset($data['reviewerID'])){
			$_SESSION['user'] = $data['last_name'].', '.$data['first_name'];
			$_SESSION['reviewerID'] = $data['reviewerID'];
		}
		include('view/header.php');
        include('view/sidemenu.php');
		include('view/defaultview.php');
		include('view/footer.php');
		break;
	case 'checkRegister' :
		//Variables we will pass through our registerUser() function
		$username = $_POST['reg_username'];
		$pwd = $_POST['reg_pwd'];
		$first_name = $_POST['reg_fn'];
		$last_name = $_POST['reg_ln'];
		$email = $_POST['reg_email'];

		//Calling registerUser() function
		registerUser($first_name, $last_name, $email, $username, $pwd, $db);

		//Redisplay the login screen, now the user can login to our website
		include('view/header.php');
		include('view/sidemenu.php');
		include('view/defaultview.php');
		include('view/footer.php');
		break;
	case 'logout' :
		// destroy session variables and display login form
		session_destroy();
		setcookie(session_name(), '', time()-1000, '/');
        	$_SESSION = array();
		// display default view
                include('view/header.php');
                include('view/sidemenu.php');
                include('view/defaultview.php');
                include('view/footer.php');
		break;

	case 'submitAmericanMovieReview' :
     		include('view/header.php');
     		// include menu
     		include('view/sidemenu.php');

			include('view/movieReviewSubmit.php');

            // include footer
            include('view/footer.php');
			break;
	case 'submitBwoodMovieReview' :
			include('view/header.php');
			// include menu
			include('view/sidemenu.php');

			include('view/bwoodMovieReviewSubmit.php');

			// includ footer
			include('view/footer.php');
			break;
	case 'searchFunctionMovie' :
			include('view/header.php');
			// include menu
			include('view/sidemenu.php');

			include('view/moviesearch.php');
			
			//include footer
			include('view/footer.php');
			break;
	case 'searchMovies' :
			include('view/header.php');
			// include menu
			include('view/sidemenu.php');

			include('view/moviesearch.php');

			// include footer
			include('view/footer.php');
			break;
	case 'updateEmail' :
		include('view/header.php');
		//include menu
		include('view/sidemenu.php');
		$data = getUserEmail();
		$email = $data['email'];
		include('view/updateemailview.php');
		//include footer
		include('view/footer.php');
		break;
	case 'reviewerMovies':
		include('view/header.php');
		//include menu
		include('view/sidemenu.php');
		
		include('view/userMovieReviews.php');

		//include footer
		include('view/footer.php');
		break;
	case 'reviewerActors' :
		include('view/header.php');
		//include menu
		include('view/sidemenu.php');

		include('view/userActorReviews.php');

		//include footer
		include('view/footer.php');
		break;
	case 'reviewerDirectors' :
		include('view/header.php');
		// include menu
		include('view/sidemenu.php');

		include('view/userDirectorReviews.php');

		//include footer
		include('view/footer.php');
		break;
	case 'reviewerHistory' :
		include('view/header.php');
		// include menu
		include('view/sidemenu.php');

		include('view/userTotalReviews.php');

		//include footer
		include('view/footer.php');
		break;
	case 'searchFunctionActorsDirectors':
		include('view/header.php');
		//include menu
		include('view/sidemenu.php');
		
		include('view/adsearch.php');
		
		//include footer
		include('view/footer.php');
		break; 
	case 'searchAD' :
		include('view/header.php');
		// include menu
		include('view/sidemenu.php');

		include('view/adsearch.php');

		//include footer
		include('view/footer.php');
		break;
	case 'submitDirectorReview' :
		include('view/header.php');
		// include menu
		include('view/sidemenu.php');

		include('view/directorReviewSubmit.php');

		//include footer
		include('view/footer.php');
		break;
	case 'submitActorReview' :
		include('view/header.php');
		// include menu
		include('view/sidemenu.php');

		include('view/actorReviewSubmit.php');

		//include footer
		include('view/footer.php');
		break;	
	case 'email':
		include('view/header.php');
		//include menu
		include('view/sidemenu.php');
		$email = $_POST['email'];
		$reviewerID = $_SESSION['reviewerID'];
		$sql = "UPDATE reviewers SET email=:email WHERE reviewerID=:reviewerID";
		$parameter = array(':reviewerID'=>$reviewerID, ':email'=>$email);
		$statement = $db->prepare($sql);
		$statement->execute($parameter);
		echo "<h2>Your email has been updated</h2>";
		//include footer
		include('view/footer.php');
		break;	
	
        default :
                // display default view
    		include('view/header.php');
     		// include menu
     		include('view/sidemenu.php');
		include('view/defaultview.php');
		// include footer
        	include('view/footer.php');

                break;
        }
?>
