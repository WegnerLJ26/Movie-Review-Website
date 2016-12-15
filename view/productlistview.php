<!-- right column: content section -->
 <?php
  // Read the main task using the primary key 'mode'
     $mode = '';
	
      if (isset($_REQUEST['mode']))
           $mode = $_REQUEST['mode'];
       ?>

  <div class='col-xs-9'>
  		<form class='form-inline' action='productlistview.php?mode=searchMovies' method='post'>
        <div class='form-group'>
          <label for='search' class='sr-only'>Search</label>
          <input type='text' class='form-control' name="searchInput" id="searchInput" placeholder="Search">
        </div>
        <button type='submit' class='btn btn-default'>Search</button>
      </form>
  </div>

  <div class='col-xs-9'>
  <?php
  		switch ($mode) {
  			case 'searchMovies':
  					//Creating variable to store input from search bar
  					$searchContent = $_POST['searchInput'];

  					if(isset($searchContent)){
  						
  						//Query the database to find the 
  						$content = searchDatabase($searchContent);



  					}


  				break;
  			
  			default:
  				# code...
  				break;
  		}

  ?>

  </div>
