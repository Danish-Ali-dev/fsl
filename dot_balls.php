<?php
    $title = "Most Dot Balls by a BAstman - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<!-- Most Dot Balls by a Bastman  -->
<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Most Dot Balls by a Bastman</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Player</th>
                        <th scope="col">Balls</th>
                        <th scope="col">Dot Balls</th>
                        <th scope="col">Dot Balls Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_dot_balls DESC, player_dot_balls / player_balls DESC, player_id DESC";
                        $result = $conn->query($sql);
                        $sno = 1;
                        while($row = $result->fetch_assoc())
                        {
                    ?>
                    <tr class="table-row">
                        <th scope="row">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                    <?= $sno ?>
                            </a>
                        </th>
                        <td class="p-3 note"> 
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_name'] ?> 
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="90" height="90">
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_balls'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_dot_balls'] ?>
                            </a>
                        </td>
                        <?php
                            if($row['player_balls'] > 0){
                                $dot_ball_per = $row['player_dot_balls'] / $row['player_balls'] * 100 ;
                            }
                            else{
                                $dot_ball_per = 0;
                            }
                        ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= substr($dot_ball_per, 0, 4) ?> %
                            </a>
                        </td>
                    </tr>
                    <?php
                    $sno++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="player_stats.php" type="button" class="btn btn-danger">Back</a>
    </div>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>