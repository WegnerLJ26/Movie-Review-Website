<!-- right column: content section -->

<?php

$rid = $_POST['reviewerID'];
$bid = $_POST['bwoodID'];
$rating = $_POST['rating'];
$rText = $_POST['review_text'];

// define a sql statement to insert movie into the review table
$sql = "INSERT INTO bwoodmovie_reviews (reviewerID, bwoodID, rating, rating_text) VALUES (:rid, :bid, :rating, :rText)";
$parameters = array(':rid'=>$rid, ':bid'=>$bid, ':rating'=>$rating, ':rText'=>$rText);
$result = getOne($sql, $parameters);
echo "<h2>Your review has been submitted</h2>";

?>