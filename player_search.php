<?php
    $title = 'PLayers Search - Family Super League'; 
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<h1 class="text-center my-4"> Search Results for <em>"<?= $_POST['search_player'] ?>" </em></h1>

<?php
    require_once('connection.php');
        $search_player = $_POST['search_player'];
        $search_sql = "SELECT * FROM `players` WHERE player_name LIKE '%$search_player%'";
        $search_result = $conn->query($search_sql);
        $count = mysqli_num_rows($search_result);
        $sno = 1;
        if($count > 0){
            while ($search_row = $search_result->fetch_assoc()){
?>
                <div class="table-row mb-2 d-flex justify-content-between container mt-3">
                <div class="fs-5 heading mx-2">
                    <a href="player_profile.php?player_id=<?= $search_row['player_id'] ?>">
                        <?= $sno ?>
                    </a>
                </div>
                <div class="fs-5 note mb-2 mx-2">
                    <a href="player_profile.php?player_id=<?= $search_row['player_id'] ?>">
                        <?= $search_row['player_name'] ?> 
                    </a>
                </div>
                <div class="-3 mb-2 mx-2">
                    <a href="player_profile.php?player_id=<?= $search_row['player_id'] ?>">    
                        <img src="admin/admin_images/player_images/<?= $search_row['player_dp'] ?>" alt="Player Picture" height="70" width="80">
                    </a>
                </div>
                <div class="fs-5 note mb-2 mx-2"> 
                    <a href="player_profile.php?player_id=<?= $search_row['player_id'] ?>">
                        <button class="btn btn-outline-danger">Full Profile</button>
                    </a>
                </div>
            </div>
            <?php
            $sno++;
            }
            ?>
            <a href="all_players.php" class="btn btn-danger">Go Back</a>
            <?php
        }
        else{
            echo '<h1 class="text-center text-white heading bg-danger p-2 fs-3 col-md-8 mx-auto">No any Records found</h1>';
            ?>
            <a href="all_players.php" class="btn btn-danger">Go Back</a>
            <?php
        }
    ?>
    <?php
    require_once('partials/bottom.php');
?>