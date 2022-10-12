<!DOCTYPE html>
<html>
    <head>
        <title> Location </title>
   
   
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: center;
}
th {
    text-align: center;
}
p1{
	 color: red;
 }
</style>
</head>	
<body>
<div class="bg-img">
<div class="centered">Welcome to your inventory</div>
  <div class="container">
    <div class="topnav">
      <a href="itemList.php">Home</a>
      <a href="AddProductForm.php">Add</a>
      <a href="stockList.php">Stock</a>
    
    </div>
  </div>
</div>

<?php
include "product.php";
$lane=$_POST['locateLane'];  //row
$mode =$_POST['locateMode']; //column

$qry = locateItem($lane, $mode);//call function to get detail item data


$row = mysqli_fetch_assoc($qry);


$itemQry=getListOfItem();
echo '<h1>Location of product</h1>';

echo '<table style="width:100%">
  <tr>
    <th>Lane</th>		  <th colspan="10">Mode</tr>
	<td>__</td>';
	
 	$modd=1;
	$lanee="A";
	while($lanee<="H")
	{
		while($modd<=10)
		{
		if($modd!=$mode)
			echo '<td >'.$modd.'</td>';	
		else
			echo '<td style="background-color:Tomato;">'.$mode.'</td>';
	
		$modd++;
		}
		echo '</tr>';	
			
		if($lanee!=$lane)
			echo '<td>'.$lanee.'</td> <td>-</td><td >-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>';
		else
			echo '<td style="background-color:Tomato;">'.$lane.'</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td><td style="background-color:Tomato;">-</td>';
		
		
		$lanee++;
	}
	echo '</tr>';
//====================================	
	

?>



    </body>
	
	
	
</html>