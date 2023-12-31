<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a href="index.php"><img class="logo rounded-circle" src="images/logo_images/logo-5.jpg" alt="Circket"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="all_players.php">Player Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="rankings.php">Rankings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="player_stats.php">Stats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="weekly_report.php">Weekly Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="points_table.php">Points Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="fund_details.php">Fund Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="team.php">Teams and Pairs</a>
        </li>
      </ul>
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit" name="search_button">Search</button>
      </form>
    </div>
  </div>
</nav>