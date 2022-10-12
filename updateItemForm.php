
<head>
<link rel="icon" href="storeicon.png"> 
</head>
<div class="topnav">
  <a class="active" href="itemList.php">Home</a>
  <a href="AddProductForm.php">Add</a>
  <a href="stockList.php">Stock</a>
  <a href="report.php">Report</a>
 
</div>
<style>
input[type=text], select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 400px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
	background-color: #F7FDFD;
}
input[type=date], select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 400px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
	background-color: #F7FDFD;
}

input[type=submit] {
    width: 30%;
    background-color: #77F8F8;
    color: white;
    padding: 14px 20px;
    margin: 8px 400px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset] {
    width: 30%;
    background-color: #77F8F8;
    color: white;
    padding: 14px 20px;
    margin: 8px 400px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


input[type=submit]:hover {
    background-color: #98F9A7;
	    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=reset]:hover {
    background-color: #98F9A7;
	    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}


.div {
    border-radius: 30px;
    background-color: #f2f2f2;
    padding: 100px;

}
p.a {
    font-family: Verdana;
	 text-align: center;
	
	
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #1de9b6;
  color: white;
}

</style>
<?php
//updateItemForm.php
include "product.php";

$product_barcode=$_POST['barcodeToUpdate'];
$qry = getItemInformation($product_barcode);//call function to get detail item data
$row = mysqli_fetch_assoc($qry);

//assign data to variable
$ID =$row['ID'];
$items =$row['items'];
$price = $row['price'];
$brand = $row['brand'];
$category = $row['category'];  //category
$lane = $row['lane'];  //lane
$mode = $row['mode']; //mode
$shelf = $row['shelf'];  //shelf
$stock_In = $row['stock_In']; 
$expiredDate = $row['expiredDate'];
$stock =$row['stock'];


echo '<div id ="set" style="line-height: 1.8;">';
echo '<form action="processProduct.php" method="post">';
echo '<fieldset><legend>Product Information Update:</legend>';

echo 'Product barcode:';
echo "<input type='text' name='newproduct_barcode' value='$product_barcode' required>";
echo "<input type='hidden' name='product_barcode' value='$product_barcode' >";

echo '<br>ID :';
echo "<input type='text' name='ID' value='$ID'>";

echo '<br>Items :';
echo "<input type='text' name='items' value='$items'>";

echo '<br>Price :';
echo "<input type='text' name='items' value='$price'>";

echo '<br>Brand:';
echo "<input type='text' name='brand' value='$brand'>";


echo '<br>Category :';
Showcategory($category);
//echo "<input type='text' name='category' value='$category'>";  //category

echo '<br>Lane :';
echo "<input type='text' name='lane' value='$lane'>";  //lane

echo '<br>Mode :';
echo "<input type='text' name='mode' value='$mode'>";  //mode

echo '<br>Shelf :';
echo "<input type='text' name='shelf' value='$shelf'>";  //shelf

echo '<br>Stock in :';
echo "<input type='date' name='stock_In' value='$stock_In'>";  //product delivery

echo '<br>Expired date :';
echo "<input type='date' name='expiredDate' value='$expiredDate'>";

echo '<br>stock :';
echo "<input type='text' name='stock' value='$stock'>";

echo '<br>Status :';
status($status);

echo '<br><br><input type="submit" name="updateButton" value="Save">';
echo '<input type ="reset" name="resetButton" value="reset">';

echo '</fieldset>';
echo '</form>';
echo '</div>';
?>

<?php
function status($status)
{
echo '	<select name = "status">';
if($status == 'Active')
	echo "<option value='Active' selected>Active</option>";
else
	echo "<option value='Active'>Active</option>";
if($status == 'Inactive')
	echo "<option value='Inactive' selected>Inactive</option>";
else
	echo "<option value='Inactive'>Inactive</option>";

echo '</select>';
}

function Showcategory($category)
{
echo '	<select name = "category">';
if($status == 'Food')
	echo "<option value='Food' selected>Food</option>";
else
	echo "<option value='Food'>Food</option>";
if($status == 'Drinks')
	echo "<option value='Drinks' selected>Drinks</option>";
else
	echo "<option value='Drinks'>Drinks</option>";
if($status == 'Homes')
	echo "<option value='Homes' selected>Homes</option>";
else
	echo "<option value='Homes'>Homes</option>";
if($status == 'Stationary')
	echo "<option value='Stationary' selected>Stationary</option>";
else
	echo "<option value='Stationary'>Stationary</option>";
if($status == 'Toiletries')
	echo "<option value='Toiletries' selected>Toiletries</option>";
else
	echo "<option value='Toiletries'>Toiletries</option>";
if($status == 'Others')
	echo "<option value='Others' selected>Others</option>";
else
	echo "<option value='Others'>Others</option>";


echo '</select>';
}
?>
