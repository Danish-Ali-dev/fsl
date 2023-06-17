<div class="col-md-10 mt-2 bg-light mx-auto p-5">
    <h3 class="text-center">Edit Player</h3>
    <form method="post" enctype='multipart/form-data'>
    <?php
        require_once('connection.php');
        if(isset($_GET['imp_edit_player_id'])){
            $imp_edit_player_id = $_GET['imp_edit_player_id'];
            $edit_player_sql = "SELECT * FROM players WHERE player_id = '$imp_edit_player_id'";
            $result = $conn->query($edit_player_sql);
            $row = $result->fetch_assoc();
    ?>
        <div class="mb-3">
            <label for="player_matches" class="form-label fw-bold">Player Matches</label>
            <input type="text" class="form-control" id="player_matches" name="player_matches" value="<?= $row['player_matches'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_innings" class="form-label fw-bold">Player Innings</label>
            <input type="text" class="form-control" id="player_innings" name="player_innings" value="<?= $row['player_innings'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_not_out" class="form-label fw-bold">Player Not Out</label>
            <input type="text" class="form-control" id="player_not_out" name="player_not_out" value="<?= $row['player_not_out'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_balls" class="form-label fw-bold">Player Balls</label>
            <input type="text" class="form-control" id="player_balls" name="player_balls" value="<?= $row['player_balls'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_runs" class="form-label fw-bold">Player Runs</label>
            <input type="text" class="form-control" id="player_runs" name="player_runs" value="<?= $row['player_runs'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_six" class="form-label fw-bold">Player Six</label>
            <input type="text" class="form-control" id="player_six" name="player_six" value="<?= $row['player_six'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_four" class="form-label fw-bold">Player Four</label>
            <input type="text" class="form-control" id="player_four" name="player_four" value="<?= $row['player_four'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_dot_balls" class="form-label fw-bold">Player Dot Balls</label>
            <input type="text" class="form-control" id="player_dot_balls" name="player_dot_balls" value="<?= $row['player_dot_balls'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_overs" class="form-label fw-bold">Player Overs</label>
            <input type="text" class="form-control" id="player_overs" name="player_overs" value="<?= $row['player_overs'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_wickets" class="form-label fw-bold">Player Wickets</label>
            <input type="text" class="form-control" id="player_wickets" name="player_wickets" value="<?= $row['player_wickets'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_bowling_runs" class="form-label fw-bold">Player Bowling Runs</label>
            <input type="text" class="form-control" id="player_bowling_runs" name="player_bowling_runs" value="<?= $row['player_bowling_runs'] ?>">
        </div>
        <?php
            }
        ?>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="add_player_submit_btn">Submit</button>
            <a href="index.php?players" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<?php
    require_once('connection.php');
    if (isset($_POST['add_player_submit_btn'])){
        $player_matches = $_POST['player_matches'];
        $player_innings = $_POST['player_innings'];
        $player_not_out = $_POST['player_not_out'];
        $player_balls = $_POST['player_balls'];
        $player_runs = $_POST['player_runs'];
        $player_six = $_POST['player_six'];
        $player_four = $_POST['player_four'];
        $player_dot_balls = $_POST['player_dot_balls'];
        $player_overs = $_POST['player_overs'];
        $player_wickets = $_POST['player_wickets'];
        $player_bowling_runs = $_POST['player_bowling_runs'];

        $sql = "UPDATE `players` SET `player_matches` = '$player_matches', `player_innings` = '$player_innings', `player_not_out` = '$player_not_out' ,`player_balls` = '$player_balls', `player_runs` = '$player_runs', `player_six` = '$player_six', `player_four` = '$player_four', `player_dot_balls` = '$player_dot_balls', `player_overs` = '$player_overs', `player_wickets` = '$player_wickets', `player_bowling_runs` = '$player_bowling_runs', `created_at` = CURRENT_TIME() WHERE player_id = '$imp_edit_player_id' ";
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
            echo "<script>window.location.href='index.php?players'</script>";
        }
        else{
            echo "<br>Error!". $conn->connect_error;
        }
    }

?>