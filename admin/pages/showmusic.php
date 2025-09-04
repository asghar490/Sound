<?php
include('config.php');
include('header.php');

// Delete logic
if (isset($_GET['del_id'])) {
    $delete_id = intval($_GET['del_id']);
    $stmt = $connect->prepare("DELETE FROM music WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        echo "<script>alert('Music Deleted'); window.location.href='showmusic.php';</script>";
    } else {
        echo "<script>alert('Delete Failed');</script>";
    }
}
?>

<style>
.music-container {
    max-width: 900px;
    margin-left: 88px; 
    width: 70%;
    background-color: rgba(138, 122, 122, 0.99);
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(250, 250, 250, 0.99);
}

.table img {
    border-radius: 8px;
}
</style>

<br><br>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="music-container">
        <h3 class="text-center mb-4">Music List</h3>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Time</th>
                        <th>Year</th>
                        <th>Image</th>
                        <th>Artist</th>
                        <th>Album</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM music";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['duration'] ?></td>
                        <td><?= $row['year'] ?></td>
                        <td><img src="images/<?= $row['image'] ?>" width="50" height="50"></td>
                        <td><?= $row['artist'] ?></td>
                        <td><?= $row['album'] ?></td>
                        <td>
                            <a href="updatemusic.php?up_id=<?= $row['id'] ?>" class="btn btn-warning btn-sm mb-1">Update</a>
                            <a href="showmusic.php?del_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Are you sure to delete?')">Delete</a>
                            <a href="playmusic.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Play Music</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?php include('footer.php'); ?>
