<?php
include('config.php');
include('header.php');

// Validate & fetch video
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('No video selected'); window.location.href='showvideo.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM video WHERE id = $id";
$result = mysqli_query($connect, $query);
$video = mysqli_fetch_assoc($result);

if (!$video) {
    echo "<script>alert('Video not found'); window.location.href='showvideo.php';</script>";
    exit;
}
?>

<style>
.player-container {
    max-width: 700px;
    margin: 50px auto;
    background-color: #222;
    padding: 20px;
    color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(255,255,255,0.2);
    text-align: center;
}

.player-container img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
}

video {
    width: 100%;
    height: auto;
    margin-top: 20px;
    border-radius: 8px;
}
</style>

<div class="player-container">
    <h2><?= htmlspecialchars($video['name']) ?></h2>
    <p><?= htmlspecialchars($video['description']) ?></p>
    <p>
        <strong>Duration:</strong> <?= htmlspecialchars($video['duration']) ?> |
        <strong>Year:</strong> <?= htmlspecialchars($video['year']) ?>
    </p>
    <p>
        <strong>Artist:</strong> <?= htmlspecialchars($video['artist']) ?> |
        <strong>Album:</strong> <?= htmlspecialchars($video['album']) ?>
    </p>

    <img src="images/<?= htmlspecialchars($video['image']) ?>" alt="Thumbnail">

    <video controls autoplay poster="images/<?= htmlspecialchars($video['image']) ?>">
        <source src="videos/<?= htmlspecialchars($video['music_video']) ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <br><br>
    <a href="showvideo.php" class="btn btn-light">⬅ Back to List</a>
</div>

<?php include('footer.php'); ?>










