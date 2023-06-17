<?php
    $title = 'PLayers List - Family Super League'; 
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>
<div class="container">
    <h1 class="my-3 fw-bold text-center text-white bg-danger p-2 heading">All Players of FSL</h1>
    <form class="row my-4" method="POST" action="player_search.php">
        <div class="col-auto note fs-5">
            <label for="search_player" class="form-label fw-bold">Search any Player : </label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="search_player" name="search_player" placeholder="Search">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-danger mb-3" name="search_player_button">Search</button>
        </div>
    </form>
    <?php
        require_once('connection.php');
        $sql = "SELECT * FROM players ORDER BY player_id DESC";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        $sno = 1;
        if($count>0)
        {
            while($row = $result->fetch_assoc())
            {
    ?>
                <div class="table-row mb-2 d-flex justify-content-between">
                    <div class="fs-5 heading mx-2">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= $sno ?>
                        </a>
                    </div>
                    <div class="fs-5 note mb-2 mx-2">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= $row['player_name'] ?> 
                        </a>
                    </div>
                    <div class="-3 mb-2 mx-2">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">    
                            <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Picture" height="70" width="80">
                        </a>
                    </div>
                    <div class="fs-5 note mb-2 mx-2"> 
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <button class="btn btn-outline-danger">Full Profile</button>
                        </a>
                    </div>
                </div>
        <?php
            $sno++;
            }
        }
        else{
            echo '<h3 class="my-5 bg-light text-dark note text-center mx-auto p-3 fs-1">No any Player Found!!!</h3>';
        }
    ?>
    </div>
</div>
<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>