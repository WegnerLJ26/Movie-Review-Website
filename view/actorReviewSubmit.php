<!-- right column: content section -->

<?php

$rid = $_POST['reviewerID'];
$aid = $_POST['actorid'];
$rating = $_POST['rating'];
$rText = $_POST['review_text'];

// define a sql statement to insert movie into the review table
$sql = "INSERT INTO actor_reviews (reviewerID, actorid, rating, rating_text) VALUES (:rid, :aid, :rating, :rText)";
$parameters = array(':rid'=>$rid, ':aid'=>$aid, ':rating'=>$rating, ':rText'=>$rText);
$result = getOne($sql, $parameters);
echo "<h2>Your review has been submitted</h2>";

?>