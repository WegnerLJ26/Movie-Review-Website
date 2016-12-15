<!-- right column: content section -->
  <div class="searchBar">
  <div class='col-xs-9'>
  		<form class='form-inline' action='index.php?mode=searchMovies' method='post'>
        <div class='form-group'>
          <label for='search' class='sr-only'>Search</label>
          <input type='text' class='form-control' style="margin-top: 1em; width: 150%;" name="searchInput" id="searchInput" placeholder="Search">
        </div>
        <button type='submit' class='btn btn-default' style="margin-top: 1em; margin-left: 7em;">Search</button>
      </form>
  </div>
  </div>

  <!-- This section will display a movie search result -->
  <div class='col-xs-9'>
  <?php

            $content = null;

  					if(isset($_POST['searchInput'])){

              //Creating variable to store input from search bar
              $searchContent = $_POST['searchInput'];
  						
  						//Query the database to find the 
  						$content = searchDBMovies($searchContent);

  						?>
  						<!--Creating table to display the result-->
            <div id="searchMovsTable">
  						<table class='table table-bordered' style="margin-top: 2em;">
  							<thead>
  								<tr>
  									<td><b>Title</b></td>
  									<td><b>Year</b></td>
  									<td><b>Rating</b></td>
  									<td><b>Number of Ratings</b></td>
  								</tr>
  							</thead>
  							<tbody>
  								<tr>
  									<td><?php echo $content['Title'] ?></td>
  									<td><?php echo $content['Year'] ?></td>
  									<td><?php echo $content['Rating'] ?></td>
  									<td><?php echo $content['RatingNum'] ?></td>
  								</tr>
  							</tbody>
  						</table>
            </div>
  			<?php		 } ?>
 </div>

 <!-- This section will handle a users review -->
 <?php

    if(isset($content['bwoodID'])){
      ?>
      <div class='col-xs-9'>
        <div class='container'>

        <textarea rows='4' cols='50' name='review_text' form='submit_mr'>Type your review here</textarea>

        <form action="index.php?mode=submitBwoodMovieReview" method='post' id='submit_mr'>
          <select name="rating">
            <option value="1" selected="selected">1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
          </select>

          <button class='btn btn-default' type='submit'>Submit Review</button>
          <?php
          echo "<input type='hidden' name='reviewerID' value='{$_SESSION['reviewerID']}'/>";
          echo "<input type='hidden' name='bwoodID' value='{$content['bwoodID']}' />";
          ?>
        </form>
      </div>
    </div>


      <?php
    } 

    if(isset($content['movieID'])) {
      ?>
      <div class='col-xs-9'>
        <div class='container'>

        <textarea rows='4' cols='50' name='review_text' form='submit_mr'>Type your review here</textarea>

        <form action="index.php?mode=submitAmericanMovieReview" method='post' id='submit_mr'>
          <select name="rating">
            <option value="1" selected="selected">1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
          </select>

          <button class='btn btn-default' type='submit'>Submit Review</button>
          <?php
          echo "<input type='hidden' name='reviewerID' value='{$_SESSION['reviewerID']}'/>";
          echo "<input type='hidden' name='movieID' value='{$content['movieID']}' />";
          ?>
        </form>
        </div>
      </div>
   <?php }
?>
