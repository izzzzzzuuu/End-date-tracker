<?php
include "stock.php";
//print_r($_POST);
//displaySearchPanel();
//kalau user search 

getListOfStock();  
	$itemQry=getListOfStock();
	
	if (isSet($_POST['searchById']))
	$itemQry = searchById($_POST['searchValue']);
	else
	$itemQry=getListOfStock();
	

echo '<h1>List of stock</h1>';
	echo '<form action="stockList.php" method="post">';
	echo '<fieldset><br><legend><br><br><p2>Search Item : </p2></legend>';
	echo '<input type="text" name ="searchValue"><br>';
	echo '<br><input type="submit" name ="searchById" value="By ID">';
	echo '<input type="submit" name="displayAllButton" value="Display All">';
	

$noOfItem = mysqli_num_rows($itemQry);

echo '<br>There are  '.$noOfItem.' items records';
echo '<table border=1 cellspacing=0 cellpadding=10 border=1 style="width:100%;" class="w3-table w3-bordered w3-striped w3-large w3-hoverable w3-card-4">';
	echo '<tr class="w3-light-blue">';
	echo '<tr>
			<th>Bil</th>
			<th>ID</th>
			<th>barcode</th>
			<th>item</th>
			<th>brand</th>
			
			
			<th>stock in</th>
			<th>current stock</th>
		</tr>';
		
$bil=1;
while($row=mysqli_fetch_assoc($itemQry))
	{
		echo '<tr class=" w3-hover-text-blue"align=center>';
		echo '<tr>';
		echo '<td>'.$bil.'</td>';
		echo '<br><td>'.$row['id'].'</td>';
		echo '  <td>'.$row['barcode'].'</td>';
		echo '  <td>'.$row['item'].'</td>';
		echo '  <td>'.$row['brand'].'</td>';
		
		
		echo '  <td>'.$row['currentdate'].'</td>';
		echo '  <td>'.$row['currentstock'].'</td>';
		

		
		$bil++;
	}


echo '</table>';

?>
