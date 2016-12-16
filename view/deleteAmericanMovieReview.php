<!-- right column: content section -->
<?php
$reviewerID = $_SESSION['reviewerID'];
$review_id = $_POST['review_id'];

if(isset($_POST['movieID'])){
	// define SQL statement
	$sql = "DELETE FROM movie_reviews AS m WHERE m.review_id =:review_id";
	$parameters = array(':review_id'=>$review_id);
	$result = getOne($sql, $parameters);
	echo "<h2>Your review has been deleted</h2>";

}

if(isset($_POST['bwoodID'])){
	// define SQL statement
	$sql = "DELETE FROM bwoodmovie_reviews AS b WHERE b.review_id =:review_id";
	$parameters = array(':review_id'=>$review_id);
	$result = getOne($sql, $parameters);
	echo "<h2>Your review has been deleted</h2>";
}

if(isset($_POST['actorid'])){
	// define SQL statement
	$sql = "DELETE FROM actor_reviews AS a WHERE a.review_id =:review_id";
	$parameters = array(':review_id'=>$review_id);
	$result = getOne($sql, $parameters);
	echo "<h2>Your review has been deleted</h2>";
}

if(isset($_POST['directorID'])){
	// define SQL statement
	$sql = "DELETE FROM director_reviews AS d WHERE d.review_id =:review_id";
	$parameters = array(':review_id'=>$review_id);
	$result = getOne($sql, $parameters);
	echo "<h2>Your review has been deleted</h2>";
}


?>