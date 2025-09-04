<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$profilePic = !empty($_SESSION['profile_image']) && file_exists("uploads/" . $_SESSION['profile_image']) 
    ? "uploads/" . $_SESSION['profile_image'] 
    : "uploads/default.jpg";
?>


<?php
include('config.php');
$notif_query = mysqli_query($connect, "SELECT * FROM notification ORDER BY id DESC LIMIT 5");
$message = "New admin has logged in: " . $_SESSION['user'];

mysqli_query($connect, "INSERT INTO notification (message) VALUES ('$message')");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>E-PROJECT</title>

<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<link href="../assets/demo/demo.css" rel="stylesheet" />
<style>
/* modal style */
#profileModal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.8);
  justify-content: center;
  align-items: center;
}
#profileModal img {
  max-height: 80%;
  max-width: 80%;
  border-radius: 10px;
}
#profileModal .close-btn {
  position: absolute;
  top: 20px; right: 30px;
  font-size: 30px;
  color: #fff;
  cursor: pointer;
}
</style>
</head>

<body>
<div class="wrapper">
<div class="sidebar">
<div class="sidebar-wrapper">
<div class="logo" style="text-align: center;">
  <a href="profile.php" class="simple-text logo-normal">
    <span class="ms-1 font-weight-bold" style="font-size:18px;"><?php echo $_SESSION['user'] ?></span>
  </a>
</div>

<ul class="nav">
  <li class="active"><a href="dashboard.php"><i class="tim-icons icon-chart-pie-36"></i><p>Dashboard</p></a></li>
  <li><a href="addrole.php"><i class="tim-icons icon-atom"></i><p>Role</p></a></li>
  <li><a href="addmusic.php"><i class="tim-icons icon-pin"></i><p>Add Music</p></a></li>
  <li><a href="showmusic.php"><i class="tim-icons icon-bell-55"></i><p>Show Music</p></a></li>
  <li><a href="addvideo.php"><i class="tim-icons icon-single-02"></i><p>Add Video</p></a></li>
  <li><a href="showvideo.php"><i class="tim-icons icon-puzzle-10"></i><p>Show Video</p></a></li>
  <li><a href="artist.php"><i class="tim-icons icon-puzzle-10"></i><p>Artist</p></a></li>
  <li><a href="album.php"><i class="tim-icons icon-puzzle-10"></i><p>Album</p></a></li>
  <li><a href="year.php"><i class="tim-icons icon-puzzle-10"></i><p>Year</p></a></li>
  <li><a href="logout.php"><i class="tim-icons icon-align-center"></i><p>Log out</p></a></li>
  <li><a href="register.php"><i class="tim-icons icon-world"></i><p>Register</p></a></li>
</ul>
</div>
</div>

<div class="main-panel">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
<div class="container-fluid">
<div class="navbar-wrapper">
  <div class="navbar-toggle d-inline">
    <button type="button" class="navbar-toggler">
      <span class="navbar-toggler-bar bar1"></span>
      <span class="navbar-toggler-bar bar2"></span>
      <span class="navbar-toggler-bar bar3"></span>
    </button>
  </div>
  <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
</div>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-bar navbar-kebab"></span>
  <span class="navbar-toggler-bar navbar-kebab"></span>
  <span class="navbar-toggler-bar navbar-kebab"></span>
</button>

<div class="collapse navbar-collapse" id="navigation">
<ul class="navbar-nav ml-auto">

  <!-- Notifications -->
<li class="dropdown nav-item">
  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
    <i class="tim-icons icon-sound-wave"></i>
    <p class="d-lg-none">Notifications</p>
  </a>
  <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
    <?php while($row = mysqli_fetch_assoc($notif_query)): ?>
      <li class="nav-link">
        <a href="#" class="nav-item dropdown-item">
          <?php echo htmlspecialchars($row['message']); ?>
        </a>
      </li>
    <?php endwhile; ?>
    <li class="dropdown-divider"></li>
  </ul>
</li>


  <!-- Profile -->
  <li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
      <div class="photo">
        <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Photo"
             style="border-radius:50%; width:40px; height:40px; object-fit:cover;">
      </div>
      <b class="caret d-none d-lg-block d-xl-block"></b>
      <p class="d-lg-none">Profile</p>
    </a>

    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar text-center">
      <li class="nav-link">
        <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Photo"
             style="border-radius:50%; width:80px; height:80px; object-fit:cover; margin:10px auto;">
      </li>
      <li class="nav-link">
        <a href="javascript:void(0)" onclick="showModal()" class="nav-item dropdown-item">
          See Profile Picture
        </a>
      </li>
      <li class="dropdown-divider"></li>
      <li class="nav-link"><a href="logout.php" class="nav-item dropdown-item">Log out</a></li>
    </ul>
  </li>

</ul>
</div>
</div>
</nav>
<!-- End Navbar -->

<!-- Modal -->
<div id="profileModal">
  <span class="close-btn" onclick="closeModal()">&times;</span>
  <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Photo">
</div>

<script>
function showModal() {
  document.getElementById('profileModal').style.display = 'flex';
}
function closeModal() {
  document.getElementById('profileModal').style.display = 'none';
}
</script>
