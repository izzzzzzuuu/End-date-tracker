<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 400px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
	 background-color: #F7FDFD;
}
input[type=date], select {
    width: 30%;
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

input[type=submit]:hover {
    background-color: #F88777;
	    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

div {
    border-radius: 30px;
    background-color: #f2f2f2;
    padding: 100px;

}
p.a {
    font-family: Verdana;
	 text-align: center;
	
	
}
</style>
<body>


<?php 

echo '<title>Add Product';
echo'</title>';
echo '<div>';
echo '<form action ="processProduct.php" method="post">';

echo '<br><p class="a">Product barcode:';
echo '<br><input type="text" name="product_barcode">';
echo '<br>Items:';
echo '<br><input type="text" name="items">';
echo '<br>Brand:';
echo '<br><input type="text" name="brand">';
echo '<br>Category:';
echo '<br><input type="text" name="category">';																																																																																			
echo '<br>lane:';
echo '<br><input type="text" name="lane">';
echo '<br>mode:';
echo '<br><input type="text" name="mode">';
echo '<br>shelf:';
echo '<br><input type="text" name="shelf">';
echo '<br>Stock in:';
echo '<br><input type="date" name="currentdate">';
echo '<br>Expired Date:';
echo '<br><input type="date" name="expiredDate">';
echo '<br>Current Stock:';
echo '<br><input type="text" name="stock">';

echo '<br><input type="Submit" name="addProductButton" value="Add Product">';

echo '</div>';

echo '</form>';

?>