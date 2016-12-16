<!-- right column: content section -->
<?php
$reviewerID = $_SESSION['reviewerID'];

// define SQL statement for finding Actor Reviews
$sql = "SELECT * FROM actor_reviews AS a WHERE a.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$actorReviews = getAll($sql, $parameters);

?>

<div class='col-xs-9'>
	<h3>Actor Reviews</h3>
	<?php
		if(isset($actorReviews)){
			echo "<form action='index.php?mode=deleteReview' method='post'>
				<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Name</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

			for ($i=0; $i<count($actorReviews); $i++){
				$act_review = $actorReviews[$i];

				$actorid = $act_review['actorid'];
				$rating = $act_review['rating'];
				$rating_text = $act_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT a.Name FROM actors AS a WHERE a.actorid=:actorid";
				$parameters = array(':actorid'=>$actorid);
				$actorName = getOne($sql, $parameters);
				$name = $actorName['Name'];

				echo "<tbody>
						<tr>
							<td>$name</td>
							<td>$rating</td>
							<td>$rating_text</td>
							<td><button class='btn btn-default' type='submit' style='background-color: blue; color: white;'>Delete</button></td>
						</tr>
					</tbody><input type='hidden' name='reviewdb' value='actor_reviews' /><input type='hidden' name='review_id' value='{$act_review['review_id']}' />";
			}

			echo "</table></form>";
		}

	?>

</div>