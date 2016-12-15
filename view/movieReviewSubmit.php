<!-- right column: content section -->

<?php

$rid = $_POST['reviewerID'];
$mid = $_POST['movieID'];
$rating = $_POST['rating'];
$rText = $_POST['review_text'];

// define a sql statement to insert movie into the review table
$sql = "INSERT INTO movie_reviews (reviewerID, movieID, rating, rating_text) VALUES (:rid, :mid, :rating, :rText)";
$parameters = array(':rid'=>$rid, ':mid'=>$mid, ':rating'=>$rating, ':rText'=>$rText);
$result = getOne($sql, $parameters);
echo "<h2>Your review has been submitted</h2>";

?>