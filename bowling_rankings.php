<?php
    $title = "Bowling Rankings - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>

<div class="container">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Family Super League Bowling Rankings</h2>
    <div class="table-responsive">
        <table class="table text-center table-hover fs-5">
            <thead class="bg-danger text-white heading fs-5">
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Player</th>
                    <th scope="col">Wickets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('connection.php');
                    $sql = "SELECT * FROM `players` ORDER BY player_wickets DESC, player_wickets / player_overs DESC, player_bowling_runs ASC, player_id DESC";
                    $result = $conn->query($sql);
                    $sno = 1;
                    while($row = $result->fetch_assoc())
                    {
                ?>
                <tr class="bg-danger bg-opacity-75 text-white fs-1 table-row-white">
                    <?php
                        if($sno == 1)
                        {
                    ?>
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
                    <?php
                        }
                        else
                        {
                    ?>
                </tr>
                <tr class="table-row">
                    <th scope="row">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= $sno ?>
                        </a>    
                    </th>
                    <td class="note">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= $row['player_name'] ?>
                        </a>
                    </td>
                    <td class="number">
                        <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= $row['player_wickets'] ?>
                        </a>
                    </td>
                    <?php
                        }
                    ?>
                </tr>
                <?php
                $sno++;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <a href="rankings.php" class="btn btn-danger my-3">Back</a>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>