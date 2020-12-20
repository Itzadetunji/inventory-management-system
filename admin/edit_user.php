<?php 
include "header.php"; 
include "../user/connection.php";
$id = $_GET["id"];
$firstname = "";
$lastname = "";
$username = "";
$password = "";
$status = "";
$role = "";
$res = mysqli_query($link, "select * from user_registration where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username = $row["username"];
    $password = $row["password"];
    $status = $row["status"];
    $role = $row["role"];
}
?> 

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        Home</a></div>
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
                                <label class="control-label">First Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="firstname"  value="<?php echo $firstname ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lastname ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Username :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Username" name="username" readonly value="<?php echo $username ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password:</label>
                                <div class="controls">
                                    <input type="password"  class="span11" placeholder="Enter Password"  name="password" value="<?php echo $password ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Select Role:</label>
                                <div class="controls">
                                    <select name="role" class="span11">
                                        <option <?php if ($role == "user") {echo "selected";} ?>>user</option>
                                        <option <?php if ($role == "admin") {echo "selected";} ?>>admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Select Status:</label>
                                <div class="controls">
                                    <select name="status" class="span11">
                                        <option <?php if ($status == "active") {echo "selected";} ?>>active</option>
                                        <option <?php if ($status == "inactive") {echo "selected";} ?>>inactive</option>
                                    </select>
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
    mysqli_query($link, "update user_registration set firstname='$_POST[firstname]', lastname='$_POST[lastname]', password='$_POST[password]', role='$_POST[role]', status='$_POST[status]' where id=$id") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function(){
            window.location="add_new_user.php";
        },3000);
    </script>
    <?php
}
?>

<!--end-main-container-part-->

<?php 
include "footer.php";
?>