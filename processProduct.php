<?php

include "product.php";

if(isSet($_POST['deleteButton']))
{
	deleteThisItem($_POST['barcodeToDelete']);
	header( "refresh:1; url=itemList.php" );
}	
else if(isSet($_POST['updateButton']))
	{
	// echo 'to update';
	updateItemInformation();
	header( "refresh:1; url=itemList.php" );
	}
else if(isSet($_POST['addProductButton']))
	{
	addProductRecord();
	header( "refresh:1; url=itemList.php" );
	}
//--------------------------------------------------------------------

	
?>


