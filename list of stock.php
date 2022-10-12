<?php
function displayStock()
{
	if (isSet($_POST['searchById']))
	$itemQry = searchById($_POST['searchValue3']);
	else
	$itemQry=getListOfStock();

	
	
	echo '<h1>List of stock</h1>';
	echo '<form action="list of stock.php" method="post">';
	echo '<fieldset><br><legend><br><br><p2>Search Item : </p2></legend>';
	echo '<input type="text" name ="searchValue3"><br>';
	echo '<br><input type="submit" name ="searchById" value="By ID">';
}
?>
<?php
	include "stock.php";
//connect to database
 $con = mysqli_connect('localhost','root','root','expired_date');
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
  }
//run query
  $sql="select * from stock";
  $stockList = mysqli_query($con,$sql);
  
//display product list in table  

echo '<table border="1">';
echo '<tr>
			<td>No</td>
			<td>ID</td>
			<td>barcode</td>
			<td>item</td>
			<td>stockin</td>
			<td>currentstock</td>
			<td>brand</td>
		</tr>';

$count=1;
while($row=mysqli_fetch_assoc($stockList))//Display product information
  {
  echo "<tr>";
  echo "<td>".$count."</td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['barcode']. "</td>";
  echo "<td>" . $row['item']. "</td>";
  $date=date_create($row['currentdate']);
  $currentdate = date_format($date,"d/m/Y"); 	
  echo "<td>" . $row['currentdate']. "</td>";
  echo "<td>" . $row['currentstock']. "</td>";
  echo "<td>" . $row['brand']. "</td>";
  

  $count++;
  }
echo '</table>';
?>
