
<?php
    require_once('connection.php');
    $sql = "SELECT * FROM weekly_report";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<div>
    <a href="index.php?add_weekly_report" class="btn btn-danger">Add Weekly Report</a>
    <a href="index.php?edit_weekly_report_id=<?= $row['week_id']; ?>" class="btn btn-primary">Edit Weekly Report</a>
</div>
<div class="container">
    <div class="row my-3">
        <div class="col-md-6">
            <h2 class="text-center bg-danger p-3 text-white fs-1">Batting Stats</h2>
            <img src="admin_images/weekly_report_images/<?= $row['batting_stats'] ?>" alt="Batting Stats">
        </div>
        <div class="col-md-6">
            <h2 class="text-center bg-danger p-3 text-white fs-1">Bowling Stats</h2>
            <img src="admin_images/weekly_report_images/<?= $row['bowling_stats'] ?>" alt="Bowling Stats">
        </div>
    </div>
    <div class="row col-md-10 mx-auto my-3">
        <h2 class="text-center bg-danger p-3 text-white fs-1">Fund Details</h2>
        <img src="admin_images/weekly_report_images/<?= $row['fund_details'] ?>" alt="Fund Details">
    </div>
    <div class="row col-md-10 mx-auto my-3">
        <h2 class="text-center bg-danger p-3 text-white fs-1">Points Table</h2>
        <img src="admin_images/weekly_report_images/<?= $row['points_table'] ?>" alt="Points Table">
    </div>
</div>