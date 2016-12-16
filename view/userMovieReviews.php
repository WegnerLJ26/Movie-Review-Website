<!-- right column: content section -->
<?php
$reviewerID = $_SESSION['reviewerID'];

// define SQL statement for finding American Movie Reviews
$sql = "SELECT * FROM movie_reviews AS m WHERE m.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$americanReviews = getAll($sql, $parameters);

// define SQL statement for finding Bollywood Movie Reviews
$sql = "SELECT * FROM bwoodmovie_reviews AS b WHERE b.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$bwoodReviews = getAll($sql, $parameters);

?>

<div class='col-xs-9'>
	<h3>Hollywood Movie Reviews</h3>
	<?php
		if(isset($americanReviews)){
			echo "<form action='index.php?mode=deleteReview' method='post'>
				<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Title</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

			for ($i=0; $i<count($americanReviews); $i++){
				$mov_review = $americanReviews[$i];

				$movieID = $mov_review['movieID'];
				$rating = $mov_review['rating'];
				$rating_text = $mov_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT m.Title FROM americanmovies AS m WHERE m.movieID=:movieID";
				$parameters = array(':movieID'=>$movieID);
				$mov_title = getOne($sql, $parameters);
				$title = $mov_title['Title'];

				echo "<tbody>
						<tr>
							<td>$title</td>
							<td>$rating</td>
							<td>$rating_text</td>
							<td><button class='btn btn-default' type='submit' style='background-color: blue; color: white;'>Delete</button></td>
						</tr>
					</tbody>
					<input type='hidden' name='reviewdb' value='movie_reviews' /><input type='hidden' name='review_id' value='{$mov_review['review_id']}' />";
			}

			echo "</table></form>";
		}

	?>

</div>

<!-- Creating <div class='col-xs-3'> to correct spacing issues -->
<div class='col-xs-3'></div>
<div class='col-xs-9'>
	<h3>Bollywood Movie Reviews</h3>
	<?php
		if(isset($bwoodReviews)){
			echo "<form action='index.php?mode=deleteReview' method='post'>
				<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Title</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

			for ($i=0; $i<count($bwoodReviews); $i++){
				$bwoodMov_review = $bwoodReviews[$i];

				$bwoodID = $bwoodMov_review['bwoodID'];
				$rating = $bwoodMov_review['rating'];
				$rating_text = $bwoodMov_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT b.Title FROM bwoodmovies AS b WHERE b.bwoodID=:bwoodID";
				$parameters = array(':bwoodID'=>$bwoodID);
				$mov_title = getOne($sql, $parameters);
				$title = $mov_title['Title'];

				echo "<tbody>
						<tr>
							<td>$title</td>
							<td>$rating</td>
							<td>$rating_text</td>
							<td><button class='btn btn-default' type='submit' style='background-color: blue; color: white;'>Delete</button></td>
						</tr>
					</tbody><input type='hidden' name='reviewdb' value='bwoodmovie_reviews' /><input type='hidden' name='review_id' value='{$bwoodMov_review['review_id']}' />";
			}

			echo "</table></form>";
		}

	?>

</div>