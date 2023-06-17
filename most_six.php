<?php
    $title = "Most 6s by a Bastman - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Most 6s by a Bastman</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Player</th>
                        <th scope="col">Balls</th>
                        <th scope="col">6s</th>
                        <th scope="col">6 per Ball</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_six DESC, player_balls / player_six ASC, player_id DESC";
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
                                <?= $row['player_six'] ?>
                            </a>
                        </td>
                        <?php
                            if($row['player_six'] > 0 ){
                                $six_paer_ball = $row['player_balls'] / $row['player_six'];  
                            }
                            else{
                                $six_paer_ball = 0;
                            }
                         ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= substr($six_paer_ball, 0, 4) ?>
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