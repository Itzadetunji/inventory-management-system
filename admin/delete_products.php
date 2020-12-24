<?php 
	include "../user/connection.php";
	$id = $_GET["id"];
	mysqli_query($link, "delete from products where id=$id") or die(mysqli_error($link));
 ?>
 <script type="text/javascript">
 	window.location="add_products.php";
 </script>	