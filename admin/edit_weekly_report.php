<div class="col-md-10 mt-2 bg-light mx-auto p-5">
    <h3 class="text-center">Edit Player</h3>
    <form method="post" enctype='multipart/form-data'>
    <?php
        require_once('connection.php');
        if(isset($_GET['edit_weekly_report_id'])){
            $edit_weekly_report_id = $_GET['edit_weekly_report_id'];
            $edit_week_sql = "SELECT * FROM weekly_report WHERE week_id = '$edit_weekly_report_id'";
            $result = $conn->query($edit_week_sql);
            $row = $result->fetch_assoc();
    ?>
        <!-- Batting Stats  -->
        <div class="mb-3">
            <label for="batting_stats" class="form-label fw-bold">Batting Stats</label>
            <input type="file" class="form-control" id="batting_stats" name="batting_stats">
            <img src="admin_images/weekly_report_images/<?= $row['batting_stats'] ?>" alt="Batting Stats" height="70" width="80">
        </div>
        <div>
            <input type="hidden" name="db_batting_stats" value="<?= $row['batting_stats'] ?>" />
        </div>

        <!-- Bowling Stats  -->
        <div class="mb-3">
            <label for="bowling_stats" class="form-label fw-bold">Bowling Stats</label>
            <input type="file" class="form-control" id="bowling_stats" name="bowling_stats">
            <img src="admin_images/weekly_report_images/<?= $row['bowling_stats'] ?>" alt="Bowling Stats" height="70" width="80">
        </div>
        <div>
            <input type="hidden" name="db_bowling_stats" value="<?= $row['bowling_stats'] ?>" />
        </div>

        <!-- Fund Details  -->
        <div class="mb-3">
            <label for="fund_details" class="form-label fw-bold">Fund Details</label>
            <input type="file" class="form-control" id="fund_details" name="fund_details">
            <img src="admin_images/weekly_report_images/<?= $row['fund_details'] ?>" alt="Fund Details" height="70" width="80">
        </div>
        <div>
            <input type="hidden" name="db_fund_details" value="<?= $row['fund_details'] ?>" />
        </div>

        <!-- Points Table  -->
        <div class="mb-3">
            <label for="points_table" class="form-label fw-bold">Points Table</label>
            <input type="file" class="form-control" id="points_table" name="points_table">
            <img src="admin_images/weekly_report_images/<?= $row['points_table'] ?>" alt="Points Table" height="70" width="80">
        </div>
        <div>
            <input type="hidden" name="db_points_table" value="<?= $row['points_table'] ?>" />
        </div>

        <?php
            }
        ?>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="edit_weekly_report_submit_btn">Submit</button>
            <a href="index.php?players" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<?php
   
    require_once('connection.php');

    if (isset($_POST['edit_weekly_report_submit_btn'])){

    // Batting Stats Check 
        if(!isset($_FILES['batting_stats']) || $_FILES['batting_stats']['error'] == UPLOAD_ERR_NO_FILE) {
            $batting_stats = $_POST['db_batting_stats'];
        }
        else{
            $random_pic = strtotime("now");
            $batting_stats = $random_pic."_".$_FILES ['batting_stats'] ['name'];
            $temp_pic = $_FILES ['batting_stats'] ['tmp_name'];
            move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$batting_stats");
        }
            
            // Bowling Stats Check 
        if(!isset($_FILES['bowling_stats']) || $_FILES['bowling_stats']['error'] == UPLOAD_ERR_NO_FILE) {
            $bowling_stats = $_POST['db_bowling_stats'];
        }
        else{
            $random_pic = strtotime("now");
            $bowling_stats = $random_pic."_".$_FILES ['bowling_stats'] ['name'];
            $temp_pic = $_FILES ['bowling_stats'] ['tmp_name'];
            move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$bowling_stats");
        }
            
            // Fund Details Check 
        if(!isset($_FILES['fund_details']) || $_FILES['fund_details']['error'] == UPLOAD_ERR_NO_FILE) {
            $fund_details = $_POST['db_fund_details'];
        }
        else{
            $random_pic = strtotime("now");
            $fund_details = $random_pic."_".$_FILES ['fund_details'] ['name'];
            $temp_pic = $_FILES ['fund_details'] ['tmp_name'];
            move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$fund_details");
        }
            
            // Points Table Check
        if(!isset($_FILES['points_table']) || $_FILES['points_table']['error'] == UPLOAD_ERR_NO_FILE) {
            $points_table = $_POST['db_points_table'];
        }
        else{
            $random_pic = strtotime("now");
            $points_table = $random_pic."_".$_FILES ['points_table'] ['name'];
            $temp_pic = $_FILES ['points_table'] ['tmp_name'];
            move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$points_table");
        }
            
            $sql = "UPDATE `weekly_report` SET `batting_stats` = '$batting_stats', `bowling_stats` = '$bowling_stats', `fund_details` = '$fund_details', `points_table` = '$points_table', `created_at` = CURRENT_TIME() WHERE week_id = '$edit_weekly_report_id' ";
            if($conn->query($sql)){
                echo "<script>window.location.href='index.php?weekly_report'</script>";
            }
            else{
                echo "<br>Error!". $conn->connect_error;
            }
        }
?>