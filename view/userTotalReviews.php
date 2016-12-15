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

// define SQL statements for finding Actor Reviews
$sql = "SELECT * FROM actor_reviews AS a WHERE a.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$actorReviews = getAll($sql, $parameters);

// define SQL statement for finding Director Reviews
$sql = "SELECT * FROM director_reviews AS d WHERE d.reviewerID =:reviewerID";
$parameters = array(':reviewerID'=>$reviewerID);
$directorReviews = getAll($sql, $parameters);

//defining count variables 
$moviesCount = 0;
$bwoodCount = 0;
$actorsCount = 0;
$directorsCount = 0;
$totalCount = 0;

?>

<div class='col-xs-9'>
	<h3>Hollywood Movie Reviews</h3>
	<?php
		if(isset($americanReviews)){
			echo "<table class='table'>";

			for ($i=0; $i<count($americanReviews); $i++){
				$mov_review = $americanReviews[$i];
				$moviesCount++;

				$movieID = $mov_review['movieID'];
				$rating = $mov_review['rating'];
				$rating_text = $mov_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT m.Title FROM americanmovies AS m WHERE m.movieID=:movieID";
				$parameters = array(':movieID'=>$movieID);
				$mov_title = getOne($sql, $parameters);
				$title = $mov_title['Title'];

				echo "<thead>
						<tr>
							<div class='col-xs-3'><td>Title</td></div>
							<div class='col-xs-3'><td>Rating</td></div>
							<div class='col-xs-3'><td>Review</td></div>
						</tr>
					</thead>
					<tbody>
						<tr>
							<div class='col-xs-3'><td>$title</td></div>
							<div class='col-xs-3'><td>$rating</td></div>
							<div class='col-xs-3'><td>$rating_text</td></div>
						</tr>
					</tbody>";
			}

			echo "</table>";
		}

	?>

</div>

<div class='col-xs-9'>
	<h3>Bollywood Movie Reviews</h3>
	<?php
		if(isset($bwoodReviews)){
			echo "<table class='table'>";

			for ($i=0; $i<count($bwoodReviews); $i++){
				$mov_review = $bwoodReviews[$i];
				$bwoodCount++;

				$bwoodID = $mov_review['bwoodID'];
				$rating = $mov_review['rating'];
				$rating_text = $mov_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT b.Title FROM bwoodmovies AS b WHERE b.bwoodID=:bwoodID";
				$parameters = array(':bwoodID'=>$bwoodID);
				$mov_title = getOne($sql, $parameters);
				$title = $mov_title['Title'];

				echo "<thead>
						<tr>
							<div class='col-xs-3'><td>Title</td></div>
							<div class='col-xs-3'><td>Rating</td></div>
							<div class='col-xs-3'><td>Review</td></div>
						</tr>
					</thead>
					<tbody>
						<tr>
							<div class='col-xs-3'><td>$title</td></div>
							<div class='col-xs-3'><td>$rating</td></div>
							<div class='col-xs-3'><td>$rating_text</td></div>
						</tr>
					</tbody>";
			}

			echo "</table>";
		}

	?>

</div>

<div class='col-xs-3'></div>
<div class='col-xs-9'>
	<h3>Actor Reviews</h3>
	<?php
		if(isset($actorReviews)){
			echo "<table class='table'>";

			for ($i=0; $i<count($actorReviews); $i++){
				$act_review = $actorReviews[$i];
				$actorsCount++;

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
							<div class='col-xs-3'><td>Name</td></div>
							<div class='col-xs-3'><td>Rating</td></div>
							<div class='col-xs-3'><td>Review</td></div>
						</tr>
					</thead>
					<tbody>
						<tr>
							<div class='col-xs-3'><td>$name</td></div>
							<div class='col-xs-3'><td>$rating</td></div>
							<div class='col-xs-3'><td>$rating_text</td></div>
						</tr>
					</tbody>";
			}

			echo "</table>";
		}

	?>

</div>

<div class='col-xs-3'></div>
<div class='col-xs-9'>
	<h3>Director Reviews</h3>
	<?php
		if(isset($directorReviews)){
			echo "<table class='table'>";

			for ($i=0; $i<count($directorReviews); $i++){
				$dir_review = $directorReviews[$i];
				$directorsCount++;

				$directorID = $dir_review['directorID'];
				$rating = $dir_review['rating'];
				$rating_text = $dir_review['rating_text'];

				// define SQL statement to get the movie Title
				$sql = "SELECT d.Name FROM directors AS d WHERE d.directorID=:directorID";
				$parameters = array(':directorID'=>$directorID);
				$directorName = getOne($sql, $parameters);
				$name = $directorName['Name'];

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

		$totalCount = $moviesCount + $bwoodCount + $actorsCount + $directorsCount;

	?>

</div>

<div class='col-xs-3'></div>
<div class='col-xs-9'>
	<table class='table'>
		<thead>
			<tr>
				<td><h2>Hollywood Movie Reviews</h2></td>
				<td><h2>Bollywood Movie Reviews</h2></td>
				<td><h2>Actor Reviews</h2></td>
				<td><h2>Director Reviews</h2></td>
				<td><h2>Total Reviews</h2></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><b><?php echo $moviesCount ?></b></td>
				<td><b><?php echo $bwoodCount ?></b></td>
				<td><b><?php echo $actorsCount ?></b></td>
				<td><b><?php echo $directorsCount ?></b></td>
				<td><b><?php echo $totalCount ?></b></td>
			</tr>
		</tbody>
	</table>
</div>


