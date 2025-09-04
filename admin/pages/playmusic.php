<?php
include('config.php');
include('header.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('No song selected'); window.location.href='showmusic.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM music WHERE id = $id";
$result = mysqli_query($connect, $query);
$song = mysqli_fetch_assoc($result);

if (!$song) {
    echo "<script>alert('Song not found'); window.location.href='showmusic.php';</script>";
    exit;
}
?>

<style>
.player-container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #222;
    padding: 20px;
    color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(255,255,255,0.2);
    text-align: center;
}

.player-container img {
    width: 200px;
    height: 200px;
    border-radius: 10px;
    margin-bottom: 20px;
    object-fit: cover;
}

audio {
    width: 100%;
    margin-top: 20px;
}
</style>

<div class="player-container">
    <h2><?= htmlspecialchars($song['name']) ?></h2>
    <p><?= htmlspecialchars($song['description']) ?></p>
    <p><strong>Duration:</strong> <?= htmlspecialchars($song['duration']) ?> | <strong>Year:</strong> <?= htmlspecialchars($song['year']) ?></p>
    <p><strong>Artist:</strong> <?= htmlspecialchars($song['artist']) ?> | <strong>Album:</strong> <?= htmlspecialchars($song['album']) ?></p>

    <?php if (!empty($song['image']) && file_exists('images/' . $song['image'])): ?>
        <img src="images/<?= htmlspecialchars($song['image']) ?>" alt="Song Image">
    <?php else: ?>
        <p><em>No Image Available</em></p>
    <?php endif; ?>

    <?php if (!empty($song['audio']) && file_exists('audio/' . $song['audio'])): ?>
        <audio controls autoplay>
            <source src="audio/<?= htmlspecialchars($song['audio']) ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    <?php else: ?>
        <p><em>Audio file not found!</em></p>
    <?php endif; ?>

    <br><br>
    <a href="showmusic.php" class="btn btn-light">⬅ Back to List</a>
</div>

<?php include('footer.php'); ?>
