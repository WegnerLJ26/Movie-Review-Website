<!-- right column: content section -->
<?php
$reviewerID = $_SESSION['reviewerID'];

// define SQL statement for finding Director Reviews
$sql = "SELECT * FROM director_reviews AS d WHERE d.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$directorReviews = getAll($sql, $parameters);

?>

<div class='col-xs-9'>
	<h3>Director Reviews</h3>
	<?php
		if(isset($directorReviews)){
			echo "<form action='index.php?mode=deleteReview' method='post'>
				<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Name</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

			for ($i=0; $i<count($directorReviews); $i++){
				$dir_review = $directorReviews[$i];

				$directorID = $dir_review['directorID'];
				$rating = $dir_review['rating'];
				$rating_text = $dir_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT d.Name FROM directors AS d WHERE d.directorID=:directorID";
				$parameters = array(':directorID'=>$directorID);
				$directorName = getOne($sql, $parameters);
				$name = $directorName['Name'];

				echo "<tbody>
						<tr>
							<td>$name</td>
							<td>$rating</td>
							<td>$rating_text</td>
							<td><button class='btn btn-default' type='submit' style='background-color: blue; color: white;'>Delete</button></td>
						</tr>
					</tbody><input type='hidden' name='reviewdb' value='director_reviews' /><input type='hidden' name='review_id' value='{$dir_review['review_id']}' />";
			}

			echo "</table></form>";
		}

	?>

</div>