<?php
    $title = "Batting Rankings - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');

    require_once('connection.php');
    $sql = "SELECT * FROM weekly_report";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="container">
    <div class="my-4 row col-md-10 col-sm-12  mx-auto points_table fw-bold">
        <h1 class="bg-danger text-center text-white p-3 mb-3 heading">Points Table</h1>
        <img class="img-fluid mb-3" src="admin/admin_images/weekly_report_images/<?= $row['points_table'] ?>" alt="Points Table">
    </div>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>