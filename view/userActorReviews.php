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
			echo "<table class='table'>";

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

				echo "<thead>
						<tr>
							<td>Name</td>
							<td>Rating</td>
							<td>Review</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>$name</td>
							<td>$rating</td>
							<td>$rating_text</td>
						</tr>
					</tbody>";
			}

			echo "</table>";
		}

	?>

</div>