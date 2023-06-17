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
    <div class="row col-md-10 col-sm-12 mx-auto my-4 fund fw-bold">
        <h1 class="bg-danger text-center text-white p-3 mb-3 heading">Fund Details</h1>
        <h4 class="bg-dark text-center text-white p-3 mb-3 note col-md-8 col-sm-12 mx-auto">Pay your dues as soon as possible. Be responsible everyone</h4>
        <img class="img-fluid" src="admin/admin_images/weekly_report_images/<?= $row['fund_details'] ?>" alt="Fund Details">
    </div>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>