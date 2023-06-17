<?php
    $title = "Player Stats - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>
    <!-- Best Batting Average  -->
<div class="container">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Best Batting Average</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Innings</th>
                        <th scope="col">Runs</th>
                        <th scope="col">Avg</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_runs / player_innings DESC, player_runs DESC, player_id DESC LIMIT 10";
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_innings'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_runs'] ?>
                            </a>
                        </td>
                        <?php
                        if($row['player_innings'] > 0 ){
                            $batting_avg = $row['player_runs'] / $row['player_innings'];  
                        }
                        else{
                            $batting_avg = 0;
                        }
                    ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= substr($batting_avg, 0, 5) ?>
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
        <a href="batting_avg.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>
    <!-- Player Highest Strike Rate  -->
<div class="container">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Highest Strike Rate</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Balls</th>
                        <th scope="col">Runs</th>
                        <th scope="col">SR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_runs / player_balls * 100 DESC, player_id DESC LIMIT 10";
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_balls'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_runs'] ?>
                            </a>
                        </td>
                        <?php
                        if($row['player_balls'] > 0 ){
                            $strike_rate = $row['player_runs'] / $row['player_balls'] * 100;  
                        }
                        else{
                            $strike_rate = 0;
                        }
                    ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= substr($strike_rate, 0, 6) ?>
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
        <a href="strike_rate.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>

    <!-- Most 6s by a Bastman  -->
<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Most 6s by a Bastman</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Balls</th>
                        <th scope="col">6s</th>
                        <th scope="col">6 per Ball</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_six DESC, player_balls / player_six DESC, player_id DESC LIMIT 10";
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
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
        <a href="most_six.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>
    <!-- Most Dot Balls by a Bastman  -->
<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Most Dot Balls by a Bastman</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Balls</th>
                        <th scope="col">Dot Balls</th>
                        <th scope="col">Dot Balls %</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_dot_balls DESC, player_dot_balls / player_balls DESC, player_id DESC LIMIT 10";
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
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
        <a href="dot_balls.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>
    <!-- Best Bowling Average  -->
<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Best Bowling Average Per Runs</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Runs Conclude</th>
                        <th scope="col">Wickets</th>
                        <th scope="col">Bowling Average Per Runs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_wickets DESC, player_bowling_runs / player_wickets ASC, player_id DESC LIMIT 10";
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_bowling_runs'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_wickets'] ?>
                            </a>
                        </td>
                        <?php
                            if($row['player_wickets'] > 0 ){
                                $bowling_runs_average = $row['player_bowling_runs'] / $row['player_wickets'];
                            }
                            else{
                                $bowling_runs_average = 0;
                            }
                        ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= substr($bowling_runs_average, 0, 4) ?>
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
        <a href="bowling_runs_avg.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>
    <!-- Best Bowling Average  -->
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
                        <th scope="col">Bowling Average Per Wicket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_overs / player_wickets ASC, player_id DESC LIMIT 15";
                        $result = $conn->query($sql);
                        $sno = 1;
                        while($row = $result->fetch_assoc())
                        {
                            if($row['player_wickets'] != 0 )
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
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
        <a href="bowling_avg.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>
    <!-- Most Economy Rate by a Bowler  -->
<div class="container my-3">
    <h2 class="my-3 bg-danger text-center text-white p-3 heading">Most Economy Rate by a Bowler</h2>
    <div>
        <div class="table-responsive">
            <table class="table text-center table-hover fs-5">
                <thead class="bg-danger text-white heading fs-5">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Players</th>
                        <th scope="col">Overs</th>
                        <th scope="col">Runs Conclude</th>
                        <th scope="col">Economy Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connection.php');
                        $sql = "SELECT * FROM `players` ORDER BY player_bowling_runs / player_overs ASC, player_id ASC LIMIT 10";
                        $result = $conn->query($sql);
                        $sno = 1;
                        while($row = $result->fetch_assoc())
                        {
                            if($row['player_overs'] != 0 )
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
                                <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" alt="Player Image" class="rounded-circle border border-2" width="60" height="60">
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_overs'] ?>
                            </a>
                        </td>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                                <?= $row['player_bowling_runs'] ?>
                            </a>
                        </td>
                        <?php 
                        if($row['player_overs'] > 0 ){
                            $economy = $row['player_bowling_runs'] / $row['player_overs'];
                        }
                        else{
                            $economy = 0;
                        }
                    ?>
                        <td class="number">
                            <a href="player_profile.php?player_id=<?= $row['player_id'] ?>">
                            <?= substr($economy, 0, 4) ?>
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
        <a href="economical.php" type="button" class="btn btn-outline-danger mb-3 fs-4 note w-100">Full Table</a>
    </div>
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>