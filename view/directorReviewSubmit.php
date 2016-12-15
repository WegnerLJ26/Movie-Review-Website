<!-- right column: content section -->

<?php

$rid = $_POST['reviewerID'];
$did = $_POST['directorID'];
$rating = $_POST['rating'];
$rText = $_POST['review_text'];

// define a sql statement to insert movie into the review table
$sql = "INSERT INTO director_reviews (reviewerID, directorID, rating, rating_text) VALUES (:rid, :did, :rating, :rText)";
$parameters = array(':rid'=>$rid, ':did'=>$did, ':rating'=>$rating, ':rText'=>$rText);
$result = getOne($sql, $parameters);
echo "<h2>Your review has been submitted</h2>";

?>