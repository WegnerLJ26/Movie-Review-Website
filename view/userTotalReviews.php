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
			echo "<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Title</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

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

				echo "<tbody>
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
			echo "<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Title</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

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

				echo "<tbody>
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
			echo "<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Name</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

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

				echo "<tbody>
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
			echo "<table class='table'>
					<thead>
						<tr>
							<div class='col-xs-3'><td><b>Name</b></td></div>
							<div class='col-xs-3'><td><b>Rating</b></td></div>
							<div class='col-xs-3'><td><b>Review</b></td></div>
						</tr>
					</thead>";

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

				echo "<tbody>
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
				<td><h4>Hollywood Movie Reviews</h4></td>
				<td><h4>Bollywood Movie Reviews</h4></td>
				<td><h4>Actor Reviews</h4></td>
				<td><h4>Director Reviews</h4></td>
				<td><h4>Total Reviews</h4></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><i><?php echo $moviesCount ?></i></td>
				<td><i><?php echo $bwoodCount ?></i></td>
				<td><i><?php echo $actorsCount ?></i></td>
				<td><i><?php echo $directorsCount ?></i></td>
				<td><i><?php echo $totalCount ?></i></td>
			</tr>
		</tbody>
	</table>
</div>


