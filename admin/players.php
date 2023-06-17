<?php
    require_once('connection.php');
    if(isset($_GET['delete_player_id'])){
        $delete_player_id = $_GET['delete_player_id'];
        $delete_id_sql = "DELETE FROM players WHERE player_id = '$delete_player_id' ";
        if($conn->query($delete_id_sql)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your data has been Deleted Successfully!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>  We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            echo "<br>Error". $conn->connect_error;
        }
    }
?>
<div>
    <a href="index.php?add_player" class="btn btn-danger">
        <button class="btn btn-danger">Add Player</button>
    </a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Sr.</th>
        <th scope="col">Player Id</th>
        <th scope="col">Player Name</th>
        <th scope="col">Player Role</th>
        <th scope="col">Player Description</th>
        <th scope="col">Player DP</th>
        <th scope="col">Player Batting Style</th>
        <th scope="col">Player Bowling Style</th>
        <th scope="col">Player Series</th>
        <th scope="col">Player Matches</th>
        <th scope="col">Player Innings</th>
        <th scope="col">Player Not Out</th>
        <th scope="col">Player Ball</th>
        <th scope="col">Player Runs</th>
        <th scope="col">Player Sixes</th>
        <th scope="col">Player Fours</th>
        <th scope="col">Player Dot Balls</th>
        <th scope="col">Player Overs</th>
        <th scope="col">Player Wickets</th>
        <th scope="col">Player Bowling Runs</th>
        <th scope="col">Player Date of Birth</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        require_once('connection.php');
        $sql = "SELECT * FROM players ORDER BY player_id DESC";
        $result = $conn->query($sql);
        $sno = 1;
        $count = mysqli_num_rows($result);
        if($count>0)
        {
            while($row = $result->fetch_assoc())
            {
    ?>
        <tr>

            <th scope="row">
                <?= $sno ?>
            </th>
            <td> <?= $row['player_id'] ?> </td>
            <td> <?= $row['player_name'] ?> </td>
            <td> <?= $row['player_role'] ?> </td>
            <td> <?= $row['player_desc'] ?> </td>
            <td><img src="admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Picture" height="70" width="80"></td>
            <td> <?= $row['player_batting'] ?> </td>
            <td> <?= $row['player_bowling'] ?> </td>
            <td> <?= $row['player_series'] ?> </td>
            <td> <?= $row['player_matches'] ?> </td>
            <td> <?= $row['player_innings'] ?> </td>
            <td> <?= $row['player_not_out'] ?> </td>
            <td> <?= $row['player_balls'] ?> </td>
            <td> <?= $row['player_runs'] ?> </td>
            <td> <?= $row['player_six'] ?> </td>
            <td> <?= $row['player_four'] ?> </td>
            <td> <?= $row['player_dot_balls'] ?> </td>
            <td> <?= $row['player_overs'] ?> </td>
            <td> <?= $row['player_wickets'] ?> </td>
            <td> <?= $row['player_bowling_runs'] ?> </td>
            <td> <?= $row['player_dob'] ?> </td>
            <td>
                <a href="index.php?imp_edit_player_id=<?= $row['player_id']; ?>" class="btn btn-success" value="imp_edit">Imp Edit</a>
                <a href="index.php?edit_player_id=<?= $row['player_id']; ?>" class="btn btn-primary" value="edit">Edit</a>
                <a href="index.php?delete_player_id=<?= $row['player_id']; ?>" class="btn btn-danger" value="delete">Delete</a>
            <td>
        </tr>
        <?php
            $sno++;
            }
        ?>
    </tbody>
</table>
<?php
            }
            else{
                echo '<h3 class="bg-dark text-white p-3 mt-3">No Results Found!!!</h3>';
            }
?>