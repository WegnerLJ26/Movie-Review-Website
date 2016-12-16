<!-- right column: content section -->
<?php
$reviewerID = $_SESSION['reviewerID'];
$review_id = $_POST['review_id'];
$reviewdb = $_POST['reviewdb'];

	switch ($reviewdb) {
		case 'movie_reviews':
			// define SQL statement
			$sql = "DELETE FROM movie_reviews WHERE review_id =:review_id";
			$parameters = array(':review_id'=>$review_id);
			$result = getOne($sql, $parameters);
			echo "<h2>Your review has been deleted</h2>";
			break;
		case 'bwoodmovie_reviews':
			// define SQL statement
			$sql = "DELETE FROM bwoodmovie_reviews WHERE review_id =:review_id";
			$parameters = array(':review_id'=>$review_id);
			$result = getOne($sql, $parameters);
			echo "<h2>Your review has been deleted</h2>";
			break;
		case 'actor_reviews':
			// define SQL statement
			$sql = "DELETE FROM actor_reviews WHERE review_id =:review_id";
			$parameters = array(':review_id'=>$review_id);
			$result = getOne($sql, $parameters);
			echo "<h2>Your review has been deleted</h2>";
			break;
		case 'director_reviews':
			// define SQL statement
			$sql = "DELETE FROM director_reviews WHERE review_id =:review_id";
			$parameters = array(':review_id'=>$review_id);
			$result = getOne($sql, $parameters);
			echo "<h2>Your review has been deleted</h2>";
			break;
		default:
			echo "Unable to delete review.";
			break;
	}
?>