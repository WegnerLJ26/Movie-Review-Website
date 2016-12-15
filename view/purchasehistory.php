<!-- right column: content section -->
	<div class='col-xs-9'>
	
	<h3>Purchase History</h3>
	<?php
	if(isset($data)){
		//creating variables to store the quantity and total $ amount
		$itemtotal = 0;
		$cost = 0;
		
		echo "<table class='table'>";
		for($i=0; $i<count($data); $i++){
		//each element of $data is an associative array
			$purchases = $data[$i];
			$item_count = $purchases['quantity'];
			$amount = $purchases['unit_price'];
	
			$itemtotal += $item_count;
			$sum = $item_count * $amount;
			$cost += $sum;
		
			echo "<tr><td class='col-xs-2'>{$purchases['product_title']}</td>
				<td>{$purchases['unit_price']}</td>
				<td>{$purchases['quantity']}</td></tr>";
		}
		
		echo "<tr><td>Total Items:</td><td>".$itemtotal."</td></tr>";
		echo "<tr><td>Total Amount:</td><td>$".$cost."</td></tr></table>";
	}	
