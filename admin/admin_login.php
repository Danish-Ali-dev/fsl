<?php
    $title = 'Admin Login';
    require_once('connection.php');
    session_start();
    if (isset($_POST['login'])) {
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $sql = "SELECT * FROM `admin` WHERE admin_username='$admin_username' AND admin_password='$admin_password' ";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            $row = $result->fetch_assoc();
            $_SESSION['admin_username'] = $row['admin_username'];
            $_SESSION['admin_password'] = $row['admin_password'];
            echo "<script>window.location.href='index.php'</script>";
        }
        else{
            echo '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Your Email and Password is Incorrect!!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>
<?php require_once('partials/admin_head.php'); ?>
<h3 class="mb-3 text-primary text-center">Admin Login</h3>
<div class="row">
    <div class="col-md-10 mx-auto">
        <form method="post">
            <input type="text" class="form-control shadow-lg p-3 mb-2 bg-body rounded" placeholder="Username" name="admin_username">
            <input type="password" id="myInput" class="form-control shadow-lg p-3 mb-2 bg-body rounded" placeholder="Password" name="admin_password">
            <input type="checkbox" class="mb-3" onclick="myFunction()"> &nbsp;Show Password
            <br>
            <button class="btn btn-primary btn-block" name="login">Log In</button>
        </form>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php require_once('partials/admin_bottom.php'); ?>