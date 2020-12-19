<?php 
	include "../user/connection.php";
	$id = $_GET["id"];
	mysqli_query($link, "delete from user_registration where id=$id");
 ?>
 <script type="text/javascript">
 	window.location="add_new_user.php";
 </script>