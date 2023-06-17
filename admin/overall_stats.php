
<?php
    require_once('connection.php');
    $sql = "SELECT * FROM stats";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="container my-5">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Total Matches</th>
            <th scope="col">Total Overs</th>
            <th scope="col">Total Runs</th>
            <th scope="col">Total Wickets</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            require_once('connection.php');
            $sql = "SELECT * FROM stats";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
            <tr>
                <td> <?= $row['total_matches'] ?> </td>
                <td> <?= $row['total_overs'] ?> </td>
                <td> <?= $row['total_runs'] ?> </td>
                <td> <?= $row['total_wickets'] ?> </td>
                <td>
                    <a href="index.php?edit_overall_stats_id=<?= $row['stats_id']; ?>" class="btn btn-primary" value="edit">Edit</a>
                <td>
            </tr>
        </tbody>
    </table>
</div>