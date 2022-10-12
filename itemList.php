<head>
<title>main menu</title>
</head>
<body>
<?php
include "product.php";

	$itemQry=getListOfItem();				//query for searching by Display all function */

if (isSet($_POST['searchByBarcode']))						//query for searching by barcode
	$itemQry = searchByBarcode($_POST['searchValue']);
	
else if(isSet($_POST['searchByItems']))						//query for searching by Item
	$itemQry = searchByItems($_POST['searchValue']);
	
else if(isSet($_POST['searchByBrand']))						//query for searching by brand
	$itemQry = searchByBrand($_POST['searchValue']);
	
else if(isSet($_POST['searchByDate']))						//query for searching by Date
	$itemQry = searchByDate($_POST['searchValue2']);
	
else if(isSet($_POST['searchByCategory']))						//query for searching by Date
	$itemQry = searchByCategory($_POST['searchValue']);

else if(isSet($_POST['ASC']))						//query for searching by brand
	$itemQry = ASC($_POST['getListOfItem']);
	
else if(isSet($_POST['DESC']))						//query for searching by brand
	$itemQry = DESC($_POST['getListOfItem']);

//searchBox();
displaySearchPanel();

$noOfItem = mysqli_num_rows($itemQry);						//query for calculate no of items in database

echo '<br>There are  '.$noOfItem.' items records';			//Display number of items in database

echo '<table border=1 cellspacing=0 cellpadding=10 border=1 style="width:100%;" class="w3-table w3-bordered w3-striped w3-large w3-hoverable w3-card-4">';
	echo '<tr class="w3-light-blue">';
	echo '<tr>
			<th>Bil</th>
			<th>Product barcode</th>
			<th>Items</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Lane</th>
			<th>Mode</th>
			<th>Shelf</th>
			<th>Expired Date</th>
			<th>Stock</th>
			<th>Delete</th>
			<th>Update</th>
		
		</tr>';
		
$bil=1;
while($row=mysqli_fetch_assoc($itemQry))						//loop for inserting data into table from database in phpmyAdmin
	{
		echo '<tr class=" w3-hover-text-blue"align=center>';
		echo '<tr>';
		echo '<td>'.$bil.'</td>';
		echo '<br><td>'.$row['product_barcode'].'</td>';		//fetch data product_barcode from database
		echo '  <td>'.$row['items'].'</td>';					//fetch data items from database
		echo '  <td>'.$row['brand'].'</td>';					//fetch data brand from database
		echo '  <td>'.$row['category'].'</td>';
		echo '  <td>'.$row['lane'].'</td>';
		echo '  <td>'.$row['mode'].'</td>';
		echo '  <td>'.$row['shelf'].'</td>';
		echo '  <td>'.$row['expiredDate'].'</td>';				//fetch data expiredDate from database
		echo '  <td>'.$row['stock'].'</td>';

		//------------------------------------------------
		//DELETE product 
		$barcode=$row['product_barcode'];
		echo'<td>';
			echo '<form action ="processProduct.php" method = "post">';
			echo "<input type='hidden' name='barcodeToDelete' value='$barcode'>";
			echo "<input type='submit' name='deleteButton' value='delete'>";
			echo '</form>';
		echo'</td>';
		//------------------------------------------------
		//UPDATE product 29/1/18
		echo'<td>';
			echo '<form action ="updateItemForm.php" method = "post">';
			echo "<input type='hidden' name='barcodeToUpdate' value='$barcode'>";
			echo "<input type='submit' name='updateButton' value='Update'>";
			echo '</form>';
		echo'</td>';
		//-------------------------------------------------
		//Ascending button

		//-------------------------------------------------
		echo '</tr>';
		
		$bil++;
	}

//-----------------------------------------------
	echo '<form action ="AddProductForm.php" method="post">';
	echo '<br><input type="Submit" name="addProductButton" value="Add Product">';
	echo '</form>';
	
	echo '<form action ="stockList.php" method="post">';
	echo '<br><input type="Submit" value="View Stock">';
	echo '</form>';
echo '</table>';
?>

<?php
function displaySearchPanel()										//Function for search box
{

    echo'<p1> welcome to your inventory</p1>';						//Header 
	
	echo '<form action="itemList.php" method="post">';
	
	echo '<fieldset><legend><br><br><p2>Search Item:</p2></legend>';		//legend
	echo '<input type="text" name ="searchValue"><br>';						//display search box input
	echo '<input type="date" name ="searchValue2"><br>';
	
	echo '<br><input type="submit" name ="searchByBarcode" value="By Barcode" id="button1">';		//search by barcode button
	echo '<input type="submit" name="searchByItems" value="By Item" id="button2">';					//search by items button
	echo '<input type="submit" name="searchByBrand" value="By Brand" id="button3">';				//search by brand button
	echo '<input type="submit" name="searchByCategory" value="By Category">';
	echo '<input type="submit" name="searchByDate" value="By Expired Date"><br>';						//search by date button
	
	echo '<br> <input type="submit" name="ASC" value="Ascending"><br>';
    echo ' <input type="submit" name="DESC" value="Descending"><br><br>';
	
	echo '<br><input type="submit" name="displayAllButton" value="Display All">';					//display all button
	

	echo '</fieldset>';
	echo '</form>';
	
}


?>
</body>


<style>
   
   
   body { 
    background:lightblue; 
   }
   table {
  overflow: hidden;
}

td, th {
  
  
  padding: 10px;
  position: relative;
  outline: 0;
}

body:not(.nohover) tbody tr:hover {
  background-color: #ffa;
}

td:hover::after,
thead th:not(:empty):hover::after,
td:focus::after,
thead th:not(:empty):focus::after { 
  content: '';  
  height: 10000px;
  left: 0;
  position: absolute;  
  top: -5000px;
  width: 100%;
  z-index: -1;
}

td:hover::after,
th:hover::after {
  background-color: #ffa;
}

td:focus::after,
th:focus::after {
  background-color: lightblue;
}

/* Focus stuff for mobile */
td:focus::before,
tbody th:focus::before {
  background-color: lightblue;
  content: '';  
  height: 100%;
  top: 0;
  left: -5000px;
  position: absolute;  
  width: 10000px;
  z-index: -1;
}

	p1{
	color: #444444;
    background: #F3F3F3;
    border: 1px #DADADA solid;
    padding: 5px 10px;
    border-radius: 10px;
    font-weight: bold;
    font-size: 40pt;
	text-align:center;
	}
    
	
	fieldset {
	font: 1em Verdana, Geneva, sans-serif;
	text-transform: none;
	color: #00F;
	background: white;
	border: thick solid #333;
	}
	
	#legend {
	font-size: 1.4em;
	text-transform: uppercase;
	color: #000;
	}
	
	button:hover {
    border: 1px #C6C6C6 solid;
    box-shadow: 1px 1px 1px #EAEAEA;
    color: #333333;
    background: #F7F7F7;
	}

	button:active {
    box-shadow: inset 1px 1px 1px #DFDFDF;   
	}

	#button1 {
	color: white;
    background: #4C8FFB;
    border: 1px #3079ED solid;
    box-shadow: inset 0 1px 0 #80B0FB;
	}
    #button1:hover {
    border: 1px #2F5BB7 solid;
    box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
    background: #3F83F1;
	}

    #button1:active {
    box-shadow: inset 0 2px 5px #2370FE;   
	}
   
	#button2 {
	color: white;
    border: 1px solid #FB8F3D; 
    background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
    background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
    background: -ms-linear-gradient(top, #FDA251, #FB8F3D);
	}
	
	#button2:hover {
    border: 1px solid #EB5200;
    background: -webkit-linear-gradient(top, #FD924C, #F9760B); 
    background: -moz-linear-gradient(top, #FD924C, #F9760B); 
    background: -ms-linear-gradient(top, #FD924C, #F9760B); 
    box-shadow: 0 1px #EFEFEF;
	}

	#button2:active {
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
	}

	#button3 {
	background: -webkit-linear-gradient(top, #DD4B39, #D14836); 
    background: -moz-linear-gradient(top, #DD4B39, #D14836); 
    background: -ms-linear-gradient(top, #DD4B39, #D14836); 
    border: 1px solid #DD4B39;
    color: white;
    text-shadow: 0 1px 0 #C04131;
	}
	
    #button3:hover {
    background: -webkit-linear-gradient(top, #DD4B39, #C53727);
    background: -moz-linear-gradient(top, #DD4B39, #C53727);
    background: -ms-linear-gradient(top, #DD4B39, #C53727);
    border: 1px solid #AF301F;
	}

    #button3:active {
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.2);
    background: -webkit-linear-gradient(top, #D74736, #AD2719);
    background: -moz-linear-gradient(top, #D74736, #AD2719);
    background: -ms-linear-gradient(top, #D74736, #AD2719);
	}
	 
</style>