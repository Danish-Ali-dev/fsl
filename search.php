<?php
    $title = 'Search - Family Super League'; 
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<h1 class="text-center my-3"> Search Results for <em>"<?= $_GET['search'] ?>" </em></h1>

<?php

    require_once('connection.php');
    $search = $_GET['search'];
    $search_sql = "SELECT * FROM `players` WHERE CONCAT_WS(player_name,player_role,player_desc) LIKE '%$search%'";
    $search_result = $conn->query($search_sql);
    $count = mysqli_num_rows($search_result);
    $sno = 1;
    if($count > 0){
        while ($search_row = $search_result->fetch_assoc()){
?>
        <div class="container">
            <div class="table-row my-2 d-flex justify-content-between my-3">
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
        <p class="player-detail note fs-5 bg-info bg-opacity-25 mb-5"> <?= $search_row['player_desc'] ?> </p>
        <hr>
        </div>
        <?php
        $sno++;
    }
    ?>
    <a href="index.php" class="btn btn-danger">Go Back</a>
        <?php
    }
    else{
        echo '<h1 class="text-center text-white heading bg-danger p-3 mt-4 fs-3 col-md-6 mx-auto">No any Records found</h1>';
        ?>
        <a href="index.php" class="btn btn-danger">Go Back</a>
        <?php
    }
    ?>
    <?php
    require_once('partials/bottom.php');
?>