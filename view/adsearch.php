<!-- right column: content section -->

  <div class='col-xs-9'>
  		<form class='form-inline' action='index.php?mode=searchAD' method='post'>
        <div class='form-group'>
          <label for='search' class='sr-only'>Search</label>
          <input type='text' class='form-control' style="margin-top: 1em; width: 150%;" name="searchInput" id="searchInput" placeholder="Search">
        </div>
        <button type='submit' class='btn btn-default' style="margin-top: 1em; margin-left: 7em;">Search</button>
      </form>
  </div>

  <!-- This section will display a movie search result -->
  <div class='col-xs-9'>
  <?php

            $content = null;

  					if(isset($_POST['searchInput'])){

              //Creating variable to store input from search bar
              $searchContent = $_POST['searchInput'];
  						
  						//Query the database to find the 
  						$content = searchDatabase($searchContent);

  						?>
  						<!--Creating table to display the result-->
  						<table class='table table-bordered' style="margin-top: 2em;">
  							<thead>
  								<tr>
  									<td><b>Name</b></td>
  									<td><b>Known For</b></td>
  									<td><b>Birth Date</b></td>
  								</tr>
  							</thead>
  							<tbody>
  								<tr>
  									<td><?php echo $content['Name'] ?></td>
  									<td><?php echo $content['Known_For'] ?></td>
  									<td><?php echo $content['Birth_Date'] ?></td>
  								</tr>
  							</tbody>
  						</table>
  			<?php		 } ?>
 </div>

 <!-- This section will handle a users review -->
 <?php

    if(isset($content['directorID'])){
      ?>
      <div class='col-xs-9'>
        <div class='container'>

        <textarea rows='4' cols='50' name='review_text' form='submit_dr'>Type your review here</textarea>

        <form action="index.php?mode=submitDirectorReview" method='post' id='submit_dr'>
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
          echo "<input type='hidden' name='directorID' value='{$content['directorID']}' />";
          ?>
        </form>
      </div>
    </div>


      <?php
    } 

    if(isset($content['actorid'])) {
      ?>
      <div class='col-xs-9'>
        <div class='container'>

        <textarea rows='4' cols='50' name='review_text' form='submit_ar'>Type your review here</textarea>

        <form action="index.php?mode=submitActorReview" method='post' id='submit_ar'>
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
          echo "<input type='hidden' name='actorid' value='{$content['actorid']}' />";
          ?>
        </form>
        </div>
      </div>
   <?php }
?>