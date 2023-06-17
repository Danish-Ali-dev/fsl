<div class="col-md-10 mt-2 bg-light mx-auto p-5">
    <h3 class="text-center">Edit Player</h3>
    <form method="post" enctype='multipart/form-data'>
    <?php
        require_once('connection.php');
        if(isset($_GET['edit_player_id'])){
            $edit_player_id = $_GET['edit_player_id'];
            $edit_player_sql = "SELECT * FROM players WHERE player_id = '$edit_player_id'";
            $result = $conn->query($edit_player_sql);
            $row = $result->fetch_assoc();
    ?>
        <div class="mb-3">
            <label for="player_desc" class="form-label fw-bold">PLayer Description</label>
            <input type="text" class="form-control" id="player_desc" name="player_desc" value="<?= $row['player_desc'] ?>">
        </div>
        <div class="mb-3">
            <label for="player_dp" class="form-label fw-bold">Player DP</label>
            <input type="file" class="form-control" id="player_dp" name="player_dp">
            <img src="admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" height="70" width="80">
        </div>

        <div>
            <input type="hidden" name="db_player_dp" value="<?= $row['player_dp'] ?>" />
        </div>

        <div class="mb-3">
            <label for="player_series" class="form-label fw-bold">Player Total Series</label>
            <input type="text" class="form-control" id="player_series" name="player_series" value="<?= $row['player_series'] ?>">
        </div>
        <?php
            }
        ?>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="edit_player_submit_btn">Submit</button>
            <a href="index.php?players" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<?php
   
    require_once('connection.php');
    if (isset($_POST['edit_player_submit_btn'])){
        
        $player_desc = $_POST['player_desc'];
        if(!isset($_FILES['player_dp']) || $_FILES['player_dp']['error'] == UPLOAD_ERR_NO_FILE) {
            $player_dp = $_POST['db_player_dp'];
        }else{
                    // Picture DP
            $random_pic = strtotime("now");
            $player_dp = $random_pic."_".$_FILES ['player_dp'] ['name'];
            $temp_pic = $_FILES ['player_dp'] ['tmp_name'];
            move_uploaded_file($temp_pic, "admin_images/player_images/$player_dp");
        }

        

        $player_series = $_POST['player_series'];

        $sql = "UPDATE `players` SET `player_desc` = '$player_desc', `player_dp` = '$player_dp', `player_series` = '$player_series', `created_at` = CURRENT_TIME() WHERE player_id = '$edit_player_id' ";
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