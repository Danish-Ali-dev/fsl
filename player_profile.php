<?php
if (!isset($_SESSION)){
    session_start();
}
    $title = "Player Profile - Family Super League";
    require_once('partials/head.php');
    require_once('partials/navbar.php');

    require_once('connection.php');
    if(isset($_GET['player_id'])){
        $player_id = $_GET['player_id'];
        $sql = "SELECT * FROM players WHERE player_id = '$player_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>

<div class="container all-pg">
    <div class="name-img container-fluid">
        <img src="admin/admin_images/player_images/<?= $row['player_dp'] ?>" class="border boder-2 border-info rounded" alt="Player Picture" width="130" height="120">
        <div class="name fs-1 note"> <?= $row['player_name'] ?> </div>
    </div>

    <div class="info">
        <div class="personal-info container-fluid">
            <h5 class="fw-bold p-2 fs-4 bg-danger text-white heading text-center text-wrap">Personal Info</h5>
            <div class="row p-info">
                <div class="col-md-4 col-sm-6 fw-bold">Born</div>
                <?php
                    $originalDate = $row['player_dob'];
                    $newDate = date("d-m-Y", strtotime($originalDate));
                ?>
                <div class="col-md-6 col-sm-6 number-1 fw-bold"> <?= $newDate ?> </div>
            </div>
            <div class="row p-info">
                <div class="col-md-4 col-sm-6 fw-bold">Age</div>
                <?php
                    $interval = date_diff(date_create(), date_create($row['player_dob']));
                    $age = $interval->format("%Y Year, %M Months, %d Days");
                    // $age = $interval->format("%Y Year, %M Months, %d Days, %H Hours, %i Minutes, %s Seconds");
                ?>
                <div class="col-md-6 col-sm-6 number-1 fw-bold"><?= $age ?></div>
            </div>
            <div class="row p-info">
                <div class="col-md-4 col-sm-6 fw-bold">Role</div>
                <div class="col-md-6 col-sm-6 number-1 fw-bold"> <?= $row['player_role'] ?> </div>
            </div>
            <div class="row p-info">
                <div class="col-md-4 col-sm-6 fw-bold">Batting Style</div>
                <div class="col-md-6 col-sm-6 number-1 fw-bold"> <?= $row['player_batting'] ?> </div>
            </div>
            <div class="row p-info">
                <div class="col-md-4 col-sm-6 fw-bold">Bowling Style</div>
                <div class="col-md-6 col-sm-6 number-1 fw-bold"> <?= $row['player_bowling'] ?> </div>
            </div>
            <h5 class="mt-3 fw-bold p-2 fs-4 bg-danger text-white heading text-center text-wrap fs-small">Family Super League Ranking</h5>
            <div class="row p-info">
                <div class="col-md-6 col-sm-8 fw-bold">Batting Ranking</div>
                <div class="col-md-6 col-sm-2 heading"><?= $row['player_batting_ranking'] ?></div>
            </div>
            <div class="row p-info">
                <div class="col-md-6 col-sm-7 fw-bold">Bowling Ranking</div>
                <div class="col-md-6 col-sm-2 heading"><?= $row['player_bowling_ranking'] ?></div>
            </div>
            <div class="row p-info">
                <div class="col-md-6 col-sm-7 fw-bold">All-Rounder Ranking</div>
                <div class="col-md-6 col-sm-2 heading"><?= $row['player_all-rounder_ranking'] ?></div>
            </div>
        </div>
        <div class="player-summary container-fluid">
            <!-- Player Description  -->
            <div class="player-detail">
                <p class="note fs-5 bg-info bg-opacity-25 mb-3"> <?= $row['player_desc'] ?> </p>
            </div>
            <h2 class="text-center my-2 fw-bold bg-danger text-white p-2">Overall Player Performance</h2>
            <div class="row overall">
                <div class="col-md-6">
                    <!-- Overall Batting Performance Start  -->
                    <h4 class="mt-2 fw-bold p-2 bg-dark text-white heading fs-4">Overall Batting Performance</h4>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Series Played</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_series'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Matches Played</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_matches'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Innings Played</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_innings'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Not Out</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_not_out'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Balls</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_balls'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Dot Balls</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_dot_balls'] ?></div>
                    </div>
                    <?php
                        if($row['player_balls'] > 0){
                            $dot_ball_per = $row['player_dot_balls'] / $row['player_balls'] * 100 ;
                        }
                        else{
                            $dot_ball_per = 0;
                        }
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Dot Balls Percentage</div>
                        <div class="col-md-2 col-sm-6 number"><?= substr($dot_ball_per, 0, 4) ?>%</div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Runs</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_runs'] ?></div>
                    </div>
                    <?php
                         if($row['player_balls'] > 0 ){
                             $strike_rate = $row['player_runs'] / $row['player_balls'] * 100;  
                         }
                         else{
                             $strike_rate = 0;
                         }
                      ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Strike Rate</div>
                        <div class="col-md-2 col-sm-6 number"><?= substr($strike_rate, 0, 6) ?></div>
                    </div>
                    <?php
                        if($row['player_innings'] > 0 ){
                            $batting_average = $row['player_runs'] / $row['player_innings'];  
                        }
                        else{
                            $batting_average = 0;
                        }  
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Batting Average</div>
                        <div class="col-md-2 col-sm-6 number"><?= substr($batting_average, 0, 4) ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total 6s</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_six'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total 4s</div>
                        <div class="col-md-2 col-sm-6 number"><?= $row['player_four'] ?></div>
                    </div>
                    <?php $total_boundaries = $row['player_six'] + $row['player_four'] ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Boundaries</div>
                        <div class="col-md-2 col-sm-6 number"><?= $total_boundaries ?></div>
                    </div>
                    <?php
                        if($row['player_six'] > 0 ){
                            $six_paer_ball = $row['player_balls'] / $row['player_six'];  
                        }
                        else{
                            $six_paer_ball = 0;
                        }
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">6s Per Ball</div>
                        <div class="col-md-2 col-sm-6 number"><?= substr($six_paer_ball, 0, 4) ?></div>
                    </div>
                </div>
                    <!-- Overall Batting Performance End -->

                    <!-- Overall Bowling Performance Start  -->
                <div class="col-md-6">
                    <h4 class="mt-2 fw-bold bg-dark text-white p-2 heading fs-4">Overall Bowling Performance</h4>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Series Played</div>
                        <div class="col-md-2 col-sm-5 number"><?= $row['player_series'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Matches Played</div>
                        <div class="col-md-2 col-sm-5 number"><?= $row['player_matches'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Overs</div>
                        <div class="col-md-2 col-sm-5 number"><?= $row['player_overs'] ?></div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Wickets</div>
                        <div class="col-md-2 col-sm-5 number"><?= $row['player_wickets'] ?></div>
                    </div>
                    <?php
                    if($row['player_wickets'] > 0 ){
                        $bowling_average = $row['player_wickets'] / $row['player_overs'];
                    }
                    else{
                        $bowling_average = 0;
                    }
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Bowling Average Per Wicket</div>
                        <div class="col-md-2 col-sm-5 number"> <?= substr($bowling_average, 0, 4) ?> </div>
                    </div>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Total Runs Conclude</div>
                        <div class="col-md-2 col-sm-5 number"><?= $row['player_bowling_runs'] ?></div>
                    </div>
                    <?php
                        if($row['player_wickets'] > 0 ){
                            $bowling_runs_average = $row['player_bowling_runs'] / $row['player_wickets'];
                        }
                        else{
                            $bowling_runs_average = 0;
                        }
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Bowling Average Per Runs</div>
                        <div class="col-md-2 col-sm-5 number"> <?= substr($bowling_runs_average, 0, 4) ?> </div>
                    </div>
                    <?php 
                        if($row['player_overs'] > 0 ){
                            $economy = $row['player_bowling_runs'] / $row['player_overs'];
                        }
                        else{
                            $economy = 0;
                        }
                    ?>
                    <div class="row p-info">
                        <div class="col-md-6 col-sm-5 fw-bold">Bowling Economy Rate</div>
                        <div class="col-md-2 col-sm-5 number"><?= substr($economy, 0, 4) ?></div>
                    </div>
                    <!-- Overall Bowling Performance End -->
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>