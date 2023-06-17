<?php
    require_once('connection.php');
    $sql = "SELECT * FROM stats";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<div class="container">
    <h1 class="text-center heading mt-3 bg-danger text-white mx-auto p-3">Overall Stats of FSL</h1>
    <div class="row mx-5 text-center">
        <!-- 1st Card  -->
        <!-- Total Matches  --> 
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Matches</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $row['total_matches'] ?></h1>
                    <h3 class="text-white note">MATCHES</h3>
                </div>
            </div>
        </div>
        <!-- 2nd Card  -->
        <!-- Total Overs  -->
    <?php
        $total_sql = "SELECT SUM(player_balls / 6) AS total_overs FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Overs in</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= round($total_row['total_overs'], 0) ?></h1>
                    <h3 class="text-white note">OVERS</h3>
                </div>
            </div>
        </div>
        <!-- 3rd Card  -->
        <!-- Total Runs  -->
    <?php
        $total_sql = "SELECT SUM(player_runs) AS total_runs FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Runs</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_runs'] ?></h1>
                    <h3 class="text-white note">RUNS</h3>
                </div>
            </div>
        </div>
        <!-- 4th Card  -->
        <!-- Total Wickets  -->
    <?php
        $total_sql = "SELECT SUM(player_wickets) AS total_wickets FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Wickets</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_wickets'] ?></h1>
                    <h3 class="text-white note">WICKETS</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total 6s  -->
    <?php
        $total_sql = "SELECT SUM(player_six) AS total_six FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
    <div class="row mx-5 text-center">
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Sixes</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_six'] ?></h1>
                    <h3 class="text-white note">6s</h3>
                </div>
            </div>
        </div>

    <!-- Total 4s  -->
    <?php
        $total_sql = "SELECT SUM(player_four) AS total_four FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Fours</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_four'] ?></h1>
                    <h3 class="text-white note">4s</h3>
                </div>
            </div>
        </div>

    <!-- Total Boundaries  -->
    <?php
        $total_sql = "SELECT SUM(player_six + player_four) AS total_boundaries FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Boundaries</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_boundaries'] ?></h1>
                    <h3 class="text-white note">BOUNDARIES</h3>
                </div>
            </div>
        </div>

    <!-- Total Balls  -->
    <?php
        $total_sql = "SELECT SUM(player_balls) AS total_balls FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Balls</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_balls'] ?></h1>
                    <h3 class="text-white note">BALLS</h3>
                </div>
            </div>
        </div>

    <!-- Total Dot Balls  -->
    <?php
        $total_sql = "SELECT SUM(player_dot_balls) AS total_dot_balls FROM `players`";
        $total_result = $conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
    ?>
        <div class="col-md-3 col-sm-6 mt-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header note">
                    <h3>Total Dot Balls</h3>
                </div>
                <div class="card-body">
                    <h1 class="card-title heading"><?= $total_row['total_dot_balls'] ?></h1>
                    <h3 class="text-white note">DOT BALLS</h3>
                </div>
            </div>
        </div>
    </div>
</div>