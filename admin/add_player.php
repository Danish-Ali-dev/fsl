<?php
    require_once('connection.php');
    if (isset($_POST['add_player_submit_btn'])){
        $player_name = $_POST['player_name'];
        $player_role = $_POST['player_role'];
        $player_desc = $_POST['player_desc'];
        $player_runs = $_POST['player_runs'];
        $player_wickets = $_POST['player_wickets'];

        // Picture DP
        $random_pic = strtotime("now");
        $player_dp = $random_pic."_".$_FILES ['player_dp'] ['name'];
        $temp_pic = $_FILES ['player_dp'] ['tmp_name'];
        move_uploaded_file($temp_pic, "admin_images/player_images/$player_dp");

        $player_batting = $_POST['player_batting'];
        $player_bowling = $_POST['player_bowling'];
        $player_series = $_POST['player_series'];
        $player_matches = $_POST['player_matches'];
        $player_dob = $_POST['player_dob'];

        $sql = "INSERT INTO players (player_name, player_role, player_desc, player_runs, player_wickets, player_dp, player_batting, player_bowling, player_series, player_matches, player_dob) VALUES('$player_name', '$player_role', '$player_desc', '$player_runs', '$player_wickets', '$player_dp', '$player_batting', '$player_bowling', '$player_series', '$player_matches', '$player_dob')";
        if($conn->query($sql)){
            echo "<script>window.location.href='index.php?players'</script>";
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
            <label for="player_name" class="form-label fw-bold">Player Name</label>
            <input type="text" class="form-control" name="player_name" id="player_name" required="">
        </div>
        <div class="mb-3">
            <label for="player_role" class="form-label fw-bold">Player Role</label>
            <input type="text" class="form-control" name="player_role" id="player_role" required="">
        </div>
        <div class="mb-3">
            <label for="player_desc" class="form-label fw-bold">PLayer Description</label>
            <input type="text" class="form-control" id="player_desc" name="player_desc" required="">
        </div>
        <div class="mb-3">
            <label for="player_runs" class="form-label fw-bold">Player Runs</label>
            <input type="text" class="form-control" id="player_runs" name="player_runs" required="">
        </div>
        <div class="mb-3">
            <label for="player_wickets" class="form-label fw-bold">Player Wickets</label>
            <input type="text" class="form-control" id="player_wickets" name="player_wickets" required="">
        </div>
        <div class="mb-3">
            <label for="player_dp" class="form-label fw-bold">Player DP</label>
            <input type="file" class="form-control" id="player_dp" name="player_dp" required="">
        </div>
        <div class="mb-3">
            <label for="player_batting" class="form-label fw-bold">Player Batting Style</label>
            <input type="text" class="form-control" id="player_batting" name="player_batting" required="">
        </div>
        <div class="mb-3">
            <label for="player_bowling" class="form-label fw-bold">Player Bowling Style</label>
            <input type="text" class="form-control" id="player_bowling" name="player_bowling" required="">
        </div>
        <div class="mb-3">
            <label for="player_series" class="form-label fw-bold">Player Total Series</label>
            <input type="text" class="form-control" id="player_series" name="player_series" required="">
        </div>
        <div class="mb-3">
            <label for="player_matches" class="form-label fw-bold">Player Total Matches</label>
            <input type="text" class="form-control" id="player_matches" name="player_matches" required="">
        </div>
        <div class="mb-3">
            <label for="player_dob" class="form-label fw-bold">Player Date of Birth</label>
            <input type="date" class="form-control" id="player_dob" name="player_dob" required="">
        </div>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-danger" name="add_player_submit_btn">Submit</button>
            <a href="index.php?players" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>