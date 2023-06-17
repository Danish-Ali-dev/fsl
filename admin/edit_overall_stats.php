<div class="col-md-10 mt-2 bg-light mx-auto p-5">
    <h3 class="text-center">Edit Player</h3>
    <form method="post" enctype='multipart/form-data'>
    <?php
        require_once('connection.php');
        if(isset($_GET['edit_overall_stats_id'])){
            $edit_overall_stats_id = $_GET['edit_overall_stats_id'];
            $edit_stats_sql = "SELECT * FROM stats WHERE stats_id = '$edit_overall_stats_id'";
            $result = $conn->query($edit_stats_sql);
            $row = $result->fetch_assoc();
    ?>
        <div class="mb-3">
            <label for="total_matches" class="form-label fw-bold">Total Matches</label>
            <input type="text" class="form-control" id="total_matches" name="total_matches" value="<?= $row['total_matches'] ?>">
        </div>
        <div class="mb-3">
            <label for="total_overs" class="form-label fw-bold">Total Overs</label>
            <input type="text" class="form-control" id="total_overs" name="total_overs" value="<?= $row['total_overs'] ?>">
        </div>
        <div class="mb-3">
            <label for="total_runs" class="form-label fw-bold">Total Runs</label>
            <input type="text" class="form-control" id="total_runs" name="total_runs" value="<?= $row['total_runs'] ?>">
        </div>
        <div class="mb-3">
            <label for="total_wickets" class="form-label fw-bold">Total Wickets</label>
            <input type="text" class="form-control" id="total_wickets" name="total_wickets" value="<?= $row['total_wickets'] ?>">
        </div>
        <?php
            }
        ?>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="edit_stats_submit_btn">Submit</button>
            <a href="index.php?players" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<?php
   
    require_once('connection.php');
    if (isset($_POST['edit_stats_submit_btn'])){

        $total_matches = $_POST['total_matches'];
        $total_overs = $_POST['total_overs'];
        $total_runs = $_POST['total_runs'];
        $total_wickets = $_POST['total_wickets'];

        $sql = "UPDATE `stats` SET `total_matches` = '$total_matches', `total_overs` = '$total_overs', `total_runs` = '$total_runs', `total_wickets` = '$total_wickets' WHERE stats_id = '$edit_overall_stats_id' ";
        if($conn->query($sql)){
            // Update Batting Rankings 
            $sql_batting = "SELECT * FROM `players` ORDER BY player_runs ASC";
            $result_batting = $conn->query($sql_batting);
            $count_batting = mysqli_num_rows($result_batting);
            while($row_batting = $result_batting->fetch_assoc())
            {
                $p_id = $row_batting['player_id'];
                $sql_bat_rank = "UPDATE `players` SET `player_batting_ranking` = '$count_batting' WHERE player_id = '$p_id'";
                $conn->query($sql_bat_rank);
                $count_batting--;
            }
            // Update Bowling Rankings 
            $sql_bowling = "SELECT * FROM `players` ORDER BY player_wickets ASC";
            $result_bowling = $conn->query($sql_bowling);
            $count_bowling = mysqli_num_rows($result_bowling);
            while($row_bowling = $result_bowling->fetch_assoc())
            {
                $p_id = $row_bowling['player_id'];
                $sql_bowl_rank = "UPDATE `players` SET `player_bowling_ranking` = '$count_bowling' WHERE player_id = '$p_id'";
                $conn->query($sql_bowl_rank);
                $count_bowling--;
            }
            // Update All-Rounder Rankings 
            $sql_all = "SELECT * FROM `players` ORDER BY player_wickets ASC, player_runs ASC";
            $result_all = $conn->query($sql_all);
            $count_all = mysqli_num_rows($result_all);
            while($row_all = $result_all->fetch_assoc())
            {
                $p_id = $row_all['player_id'];
                $sql_all_rank = "UPDATE `players` SET `player_all-rounder_ranking` = '$count_all' WHERE player_id = '$p_id'";
                $conn->query($sql_all_rank);
                $count_all--;
            }
            echo "<script>window.location.href='index.php?overall_stats'</script>";
        }
        else{
            echo "<br>Error!". $conn->connect_error;
        }
    }

?>