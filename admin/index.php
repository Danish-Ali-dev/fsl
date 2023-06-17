<?php
    session_start();
    if (isset($_SESSION['admin_username'])) {
        $admin_email = $_SESSION['admin_username'];
    $title = 'Admin Panel - Family Super League'; 
    include('partials/admin_head.php');
    include('top-nav.php');
?>
<div class="container-fluid mb-5" style="margin-top: 40px; margin-left: -15px">
    <?php 
        include('sidebar.php');
        // Players 
        if(isset($_GET['players'])){
            include('players.php');
        }
        if(isset($_GET['add_player'])){
            include('add_player.php');
        }
        if(isset($_GET['delete_player_id'])){
            include('players.php');
        }
        if(isset($_GET['edit_player_id'])){
            include('edit_player.php');
        }
        if(isset($_GET['imp_edit_player_id'])){
            include('imp_edit_player.php');
        }

        // Weekly Report 
        if(isset($_GET['weekly_report'])){
            include('weekly_report.php');
        }
        if(isset($_GET['add_weekly_report'])){
            include('add_weekly_report.php');
        }
        if(isset($_GET['edit_weekly_report_id'])){
            include('edit_weekly_report.php');
        }

        // Overall Stats 
        if(isset($_GET['overall_stats'])){
            include('overall_stats.php');
        }
        if(isset($_GET['edit_overall_stats_id'])){
            include('edit_overall_stats.php');
        }
    ?>
</div>

    <?php 
    include('partials/admin_bottom.php'); 
        }
    else{
        header("location: admin_login.php");
    }
?>