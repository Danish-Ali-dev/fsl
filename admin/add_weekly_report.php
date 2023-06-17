<?php
    require_once('connection.php');
    if (isset($_POST['add_weekly_report_submit_btn'])){

        // Batting Stats
        $random_pic = strtotime("now");
        $batting_stats = $random_pic."_".$_FILES ['batting_stats'] ['name'];
        $temp_pic = $_FILES ['batting_stats'] ['tmp_name'];
        move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$batting_stats");

        // Bowling Stats
        $random_pic = strtotime("now");
        $bowling_stats = $random_pic."_".$_FILES ['bowling_stats'] ['name'];
        $temp_pic = $_FILES ['bowling_stats'] ['tmp_name'];
        move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$bowling_stats");

        // Funs Deatils
        $random_pic = strtotime("now");
        $fund_details = $random_pic."_".$_FILES ['fund_details'] ['name'];
        $temp_pic = $_FILES ['fund_details'] ['tmp_name'];
        move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$fund_details");

        // Points Table
        $random_pic = strtotime("now");
        $points_table = $random_pic."_".$_FILES ['points_table'] ['name'];
        $temp_pic = $_FILES ['points_table'] ['tmp_name'];
        move_uploaded_file($temp_pic, "admin_images/weekly_report_images/$points_table");


        $sql = "INSERT INTO weekly_report (batting_stats, bowling_stats, fund_details, points_table) VALUES('$batting_stats', '$bowling_stats', '$fund_details', '$points_table')";
        if($conn->query($sql)){
            echo "<script>window.location.href='index.php?weekly_report'</script>";
        }
        else{
            echo "<br>Error!". $conn->connect_error;
        }
    }

?>

<div class="col-md-10 mt-2 bg-light mx-auto p-5">
    <h3 class="text-center">Add New Player</h3>
    <form method="post" enctype='multipart/form-data'>
        <div class="mb-3">
            <label for="batting_stats" class="form-label fw-bold">Batting Stats</label>
            <input type="file" class="form-control" id="batting_stats" name="batting_stats" required="">
        </div>
        <div class="mb-3">
            <label for="bowling_stats" class="form-label fw-bold">Bowling Stats</label>
            <input type="file" class="form-control" id="bowling_stats" name="bowling_stats" required="">
        </div>
        <div class="mb-3">
            <label for="fund_details" class="form-label fw-bold">Fund Details</label>
            <input type="file" class="form-control" id="fund_details" name="fund_details" required="">
        </div>
        <div class="mb-3">
            <label for="points_table" class="form-label fw-bold">Points Table</label>
            <input type="file" class="form-control" id="points_table" name="points_table" required="">
        </div>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="add_weekly_report_submit_btn">Submit</button>
            <a href="index.php?weekly_report" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>