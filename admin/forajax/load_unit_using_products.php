<?php 
include "../../user/connection.php";
$company_name = $_GET["company_name"];
$product_name = $_GET["product_name"];
$res = mysqli_query($link, "select * from products where company_name='$company_name' && product_name='$product_name'");

?>
<select class="span11" name="unit" id="unit" onchange="select_unit(this.value, '<?php echo $product_name; ?>', '<?php echo $company_name; ?>')">
	<option>Select</option>
	<?php

	while ($row = mysqli_fetch_array($res)) {
		echo "<option>";
		echo $row["unit"];
		echo "</option>";
	}
	echo "</select>";
	?>