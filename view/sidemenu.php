<!-- left column -->
      <div class='col-xs-3'>
	<?php if (isset($_SESSION['user'])) {
	?>

      <!-- The search bar for the whole database -->
      <!--<form class='form-inline' action='index.php?mode=search' method='post'>
        <div class='form-group'>
          <label for='search' class='sr-only'>Search</label>
          <input type='text' class='form-control' id='search' placeholder="Search">
        </div>
        <button type='submit' class='btn btn-default'>Search</button>
      </form>-->

        <h3>Links</h3>
         <ul>
	
                <li><a href='index.php?mode=searchFunctionMovie'>Search Movies</a></li>
                <li><a href='index.php?mode=searchFunctionActorsDirectors'>Search Actors/Directors</a></li>
                <li><a href='index.php?mode=reviewerMovies'>Movie Reviews</a></li>
                <li><a href='index.php?mode=reviewerActors'>Actor Reviews</a></li>
                <li><a href='index.php?mode=reviewerDirectors'>Director Reviews</a></li>
                <li><a href='index.php?mode=reviewerHistory'>My Review History</a></li>
                <li><a href='index.php?mode=updateEmail'>Update Email Address</a></li>
	
	       </ul>
	<?php } ?>
      </div>
