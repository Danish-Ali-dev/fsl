<?php
    $title = "Weekly Report - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');

    require_once('connection.php');
    $sql = "SELECT * FROM weekly_report";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="weekly_report container-fluid">
    <div class="row col-md-10 col-sm-12 mx-auto my-3">
        <div class="col-md-6 col-sm-12 batting_stats text-center">
            <h2 class="bg-danger text-center text-white p-3 mb-3 heading col-md-9 mx-auto">Batting Stats</h2>
            <img class="img-fluid mb-3" src="admin/admin_images/weekly_report_images/<?= $row['batting_stats'] ?>" alt="Batting Stats">
        </div>
        <div class="col-md-6 col-sm-12 bowling_stats text-center">
            <h2 class="bg-danger text-center text-white p-3 mb-3 heading col-md-9 mx-auto">Bowling Stats</h2>
            <img class="img-fluid mb-3" src="admin/admin_images/weekly_report_images/<?= $row['bowling_stats'] ?>" alt="Bowling Stats">
        </div>
    </div>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>