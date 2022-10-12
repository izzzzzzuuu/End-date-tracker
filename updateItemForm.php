<style>
	body{
		 background-color:#e6fff2;
	}
	#set {
	 margin:auto;
	 width:50%;
	 text-align:center;

	 }
	 
</style>
<?php
//updateItemForm.php
include "product.php";

$product_barcode=$_POST['barcodeToUpdate'];
$qry = getItemInformation($product_barcode);//call function to get detail item data
$row = mysqli_fetch_assoc($qry);

//assign data to variable
$items =$row['items'];
$brand = $row['brand'];
$category = $row['category'];  //category
$lane = $row['lane'];  //lane
$mode = $row['mode']; //mode
$shelf = $row['shelf'];  //shelf
$expiredDate = $row['expiredDate'];
$stock =$row['stock'];


echo '<div id ="set" style="line-height: 1.8;">';
echo '<form action="processProduct.php" method="post">';
echo '<fieldset><legend>Product Information Update:</legend>';

echo 'Product barcode:';
echo "<input type='text' name='newproduct_barcode' value='$product_barcode' required>";
echo "<input type='hidden' name='product_barcode' value='$product_barcode' >";

echo '<br>Items :';
echo "<input type='text' name='items' value='$items'>";

echo '<br>Brand:';
echo "<input type='text' name='brand' value='$brand' required>";
echo "<input type='hidden' name='brand' value='$brand' >";

echo '<br>Category :';
echo "<input type='text' name='category' value='$category'>";  //category

echo '<br>Lane :';
echo "<input type='text' name='lane' value='$lane'>";  //lane

echo '<br>Mode :';
echo "<input type='text' name='mode' value='$mode'>";  //mode

echo '<br>Shelf :';
echo "<input type='text' name='shelf' value='$shelf'>";  //shelf

echo '<br>Expired date :';
echo "<input type='date' name='expiredDate' value='$expiredDate'>";

echo '<br>stock :';
echo "<input type='text' name='stock' value='$stock'>";

echo '<br><br><input type="submit" name="updateButton" value="Save">';
echo '<input type ="reset" name="resetButton" value="reset">';

echo '</fieldset>';
echo '</form>';
echo '</div>';
?>