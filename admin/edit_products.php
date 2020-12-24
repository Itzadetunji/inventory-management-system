<?php 
include "header.php"; 
include "../user/connection.php";
$id = $_GET["id"];
$company_name = "";
$product_name = "";
$unit = "";
$packing_size = "";
$res = mysqli_query($link, "select * from products where id=$id");
while ($row=mysqli_fetch_array($res)) {
  $company_name = $row["company_name"];
  $product_name = $row["product_name"];
  $unit = $row["unit"];
  $packing_size = $row["packing_size"];
}
?> 

<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Edit Products</a>
    </div>
  </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
  <div class="container-fluid">

    <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
     <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Products</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Comapny :</label>
              <div class="controls">
                <select class="span11" name="company_name">
                  <?php 
                  $res = mysqli_query($link, "select * from company_name");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <option <?php if($row["company_name"]==$company_name){echo "selected";} ?>>
                    <?php
                    echo $row["company_name"];
                    echo "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Product Name :</label>
              <div class="controls">
                <input type="text" name="product_name" class="span11" placeholder="Enter Product Name" value="<?php echo $company_name; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Comapny :</label>
              <div class="controls">
                <select class="span11" name="unit">
                  <?php 
                  $res = mysqli_query($link, "select * from units");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <option <?php if($row["unit"]==$unit){echo "selected";} ?>>
                    <?php
                    echo $row["unit"];
                    echo "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Packing Size :</label>
              <div class="controls">
                <input type="text" name="packing_size" class="span11" placeholder="Enter Packing Size" value="<?php echo $packing_size; ?>">
              </div>
            </div>
            <div class="alert alert-danger" id="error" style="display: none">
              <center>This Product Already Exist! Please Try Another One</center>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="submit1">Save</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none">
              <center>Record Updated Successfully</center>
            </div> 
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
<?php 
if (isset($_POST['submit1'])) {

  $count = 0;
  $res = mysqli_query($link, "select * from products where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]'")  or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count > 0) {
   ?>
   <script type="text/javascript">
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";
  </script>
  <?php
}
else{
  // mysqli_query($link, "insert into products values (NULL, '$_POST[company_name]', '$_POST[product_name]', '$_POST[unit]', '$_POST[packing_size]')") or die(mysqli_error($link));
  mysqli_query($link, "update products set company_name='$_POST[company_name]', product_name='$_POST[product_name]', unit='$_POST[unit]', packing_size='$_POST[packing_size]' where id=$id") or die(mysqli_error($link));
  ?>
  <script type="text/javascript">
    document.getElementById("success").style.display="block";
    document.getElementById("error").style.display="none";
    setTimeout(function(){
      window.location="add_products.php";
    },1000);
  </script>
  <?php
} 
}
?>
<!--end-main-container-part-->

<?php 
include "footer.php";
?>