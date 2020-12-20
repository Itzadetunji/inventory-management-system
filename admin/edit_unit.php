<?php 
include "header.php"; 
include "../user/connection.php";
$id = $_GET["id"];
$unit = "";
$res = mysqli_query($link, "select * from units where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $unit = $row["unit"];
}
?> 

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        Edit Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit User</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Unit Name" name="unitname"  value="<?php echo $unit ?>" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" name="submit1">Update</button>
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
</div>

<?php 
if (isset($_POST["submit1"])) {
    mysqli_query($link, "update units set unit='$_POST[unitname]' where id=$id") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function(){
            window.location="add_new_unit.php";
        },3000);
    </script>
    <?php
}
?>

<!--end-main-container-part-->

<?php 
include "footer.php";
?>