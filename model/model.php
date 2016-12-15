<?php

 function checkValidUser(){
	// validate user
	$sql = "SELECT reviewerID, first_name, last_name FROM reviewers WHERE
		username=:username AND pwd = :pwd";
	// define values for parameters
	$values = array(':username'=>$_POST['username'], ':pwd'=>$_POST['pwd']);
	$result = getOne($sql, $values);
	return $result;
 }

 function registerUser($first_name, $last_name, $email, $username, $pwd, $db){
 	// Register user
 	$stmt = $db->prepare("INSERT INTO reviewers (first_name, last_name, email, username, pwd) VALUES (:first_name, :last_name, :email, :username, :pwd)");
 	$stmt->bindParam(':first_name', $first_name);
 	$stmt->bindParam(':last_name', $last_name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':pwd', $pwd);
	$stmt->execute();

 }
 	//Function not used anymore
  function getProductList(){
	// define SQL statement
	$sql = 'select * from products ORDER BY product_type';
	$data= getAll($sql);
	return $data;
  }

  function searchDBMovies($searchContent){

      $db_americanMovies = searchAmericanMovies($searchContent);

      if(isset($db_americanMovies['Title'])){
        return $db_americanMovies;
      }

      $db_bwoodMovies = searchBwoodMovies($searchContent  );

      if(isset($db_bwoodMovies['Title'])){
        return $db_bwoodMovies;
      }
  }

  function searchAmericanMovies($searchContent){
    // define SQL statement to go through americanmovies table
    $sql = 'SELECT * FROM americanmovies AS m WHERE m.Title=:searchContent';
    $parameters = array(':searchContent'=>$searchContent);
    $result = getOne($sql, $parameters);
    return $result;
  }

  function searchBwoodMovies($searchContent){
    // define SQL statement to go through bwoodmovies table
    $sql = 'SELECT * FROM bwoodmovies AS m WHERE m.Title=:searchContent';
    $parameters = array(':searchContent'=>$searchContent);
    $result = getOne($sql, $parameters);
    return $result;
  }

  //Function for searching the database for Actors/Directors
  function searchDatabase($searchContent){
    $db_actors = searchActors($searchContent);

    if(isset($db_actors['Name'])){
      return $db_actors;
    }

    $db_directors = searchDirectors($searchContent);

    if(isset($db_directors['Name'])){
      return $db_directors;
    }
  }

  function searchActors($searchContent){
    // define SQL statement to go through actors table
    $sql = 'SELECT * FROM actors AS a WHERE a.Name=:searchContent';
    $parameters = array(':searchContent'=>$searchContent);
    $result = getOne($sql, $parameters);
    return $result;
  }

  function searchDirectors($searchContent){
    // define SQL statement to go through directors table
    $sql = 'SELECT * FROM directors AS d WHERE d.Name=:searchContent';
    $parameters = array(':searchContent'=>$searchContent);
    $result = getOne($sql, $parameters);
    return $result;    
  }

  function getUserEmail(){
	//define SQL statement
	$sql = 'SELECT  email FROM reviewers WHERE reviewerID=:reviewerID';
	$parameters = array(':reviewerID'=>$_SESSION['reviewerID']);
	$result = getOne($sql, $parameters);
	return $result;
  }
	
  function getHistory(){
	//define a SQL statement
	$sql = 'SELECT products.product_title, products.unit_price, sales.quantity FROM sales, products WHERE client_id=:client_id AND sales.product_id = products.product_id';

	$parameters = array(':reviewerID'=>$_SESSION['reviewerID']);
	$result = getAll($sql, $parameters);
	return $result;
  }
  //Function not used anymore
  function purchaseItem($client_id, $product_id, $quantity, $db){
	$sql = "SELECT sales_id, quantity FROM sales WHERE client_id =:client_id AND product_id=:product_id";
	$parameters = array(':client_id'=>$client_id, ':product_id'=>$product_id);
	$result = getOne($sql, $parameters);
	
	if($result != null){
		$quantity += $result['quantity'];
		$sales_id = $result['sales_id'];
		$sql = "UPDATE sales SET quantity=:quantity WHERE sales_id=:sales_id";
		$parameters = array(':sales_id'=>$sales_id, ':quantity'=>$quantity);
		$statement = $db->prepare($sql);
		$statement->execute($parameters);
		echo "<h2>Item has been purchased</h2>";
	}else {

	$sql = "INSERT INTO sales (client_id, product_id, quantity) values (:client_id, :product_id, :quantity)";
	$parameters = array(':client_id'=>$client_id, ':product_id'=>$product_id, ':quantity'=>$quantity);
	$result = getOne($sql, $parameters);
	echo  "<h2>Item has been purchased</h2>";
	}
  }

  function getOne($sql, $parameter = null){
        global $db;
        $statement = $db->prepare($sql);
        // execute the SQL statement
        $statement->execute($parameter);
        // return result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
  }


  function getAll($sql, $parameter = null){
        global $db;
        $statement = $db->prepare($sql);
        // execute the SQL statement
        $statement->execute($parameter);
        // return result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
  }

?>
