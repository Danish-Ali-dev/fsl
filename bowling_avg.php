<?php
    $title = "Best Bowling Average - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Best Bowling Average Per Wicket</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Wickets</th>
                        <th scope="col">Overs</th>
                        <th scope="col">Bowling Average</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_overs / player_wickets ASC, player_id DESC";
                        $result = $conn->query($sql);
                        $sno = 1;
                        while($row = $result->fetch_assoc())
                        {
                            if($row['player_wickets'] != 0)
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
                                <?= $row['player_wickets'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_overs'] ?>
                            </a>
                        </td>
                        <?php
                            if($row['player_wickets'] > 0 ){
                                $bowling_average = $row['player_overs'] / $row['player_wickets'];
                            }
                            else{
                                $bowling_average = 0;
                            }
                        ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= substr($bowling_average, 0, 4) ?>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $sno++;
                        }
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