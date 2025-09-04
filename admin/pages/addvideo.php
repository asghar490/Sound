<?php
include('config.php');
include('header.php');

if (isset($_POST['video'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $duration    = $_POST['duration'];
    $year        = $_POST['year'];
    $artist      = $_POST['artist'];
    $album       = $_POST['album'];

    // create folders if they don’t exist
    if (!is_dir('images')) mkdir('images', 0777, true);
    if (!is_dir('videos')) mkdir('videos', 0777, true);

    // Image upload
    $imageName = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    $imagePath = "images/" . basename($imageName);

    // Video upload
    $videoName = $_FILES['video_file']['name'];
    $tempVideo = $_FILES['video_file']['tmp_name'];
    $videoPath = "videos/" . basename($videoName);

    $imageUploaded = move_uploaded_file($tempImage, $imagePath);
    $videoUploaded = move_uploaded_file($tempVideo, $videoPath);

    if ($imageUploaded && $videoUploaded) {
        $insertQuery = "INSERT INTO video 
            (name, description, duration, year, image, music_video, artist, album) 
            VALUES 
            ('$name', '$description', '$duration', '$year', '$imageName', '$videoName', '$artist', '$album')";

        if (mysqli_query($connect, $insertQuery)) {
            echo "<script>alert('Video Added Successfully'); window.location.href='showvideo.php';</script>";
        } else {
            echo "<script>alert('Failed to Add Video: " . mysqli_error($connect) . "');</script>";
        }
    } else {
        echo "<script>alert('Image or Video Upload Failed');</script>";
    }
}
?>

<style>
.gradient-border {
    position: relative;
    padding: 12px;
    border-radius: 20px;
    background: conic-gradient(from 0deg,rgb(255, 110, 226),rgb(243, 234, 243),rgb(228, 121, 250));
    background-size: 250% 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.inner-card {
    background-color: rgba(194, 181, 197, 0.49);
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 0 20px rgba(180, 38, 38, 0.9);
    position: relative;
    z-index: 1;
}

.inner-card input[type="text"],
.inner-card input[type="number"],
.inner-card input[type="file"],
.inner-card select {
    color: black;
    background-color: rgb(253, 253, 253);
}

.inner-card label {
    color: #111;
    font-weight: 500;
}

.purple {
    background: conic-gradient(from 0deg, rgb(255, 70, 218), rgb(243, 234, 243), rgb(213, 52, 245));
    background-size: 300% 300%;
    color: white;
    font-size: 1.2rem;
    padding: 10px 30px;
    border-radius: 8px;
    border: none;
}

select option {
    color: black;
    background-color: white;
}
</style>

<br>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="gradient-border" style="width: 520px;">
        <div class="inner-card">
            <h3 class="text-center mb-4">Add New Video</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Duration:</label>
                    <input type="text" name="duration" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Year:</label>
                    <select name="year" class="form-control" required>
                        <option value="">-- Select Year --</option>
                        <?php
                        $yearQuery = "SELECT id, year_name FROM year ORDER BY year_name DESC";
                        $yearRun = mysqli_query($connect, $yearQuery);
                        while ($yearRow = mysqli_fetch_assoc($yearRun)) {
                            echo '<option value="'.$yearRow['id'].'">'.$yearRow['year_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Artist:</label>
                    <select name="artist" class="form-control" required>
                        <option value="">-- Select Artist --</option>
                        <?php
                        $artistQuery = "SELECT id, artist_name FROM artist ORDER BY artist_name ASC";
                        $artistRun = mysqli_query($connect, $artistQuery);
                        while ($artistRow = mysqli_fetch_assoc($artistRun)) {
                            echo '<option value="'.$artistRow['id'].'">'.$artistRow['artist_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Album:</label>
                    <select name="album" class="form-control" required>
                        <option value="">-- Select Album --</option>
                        <?php
                        $albumQuery = "SELECT id, album_name FROM album ORDER BY album_name ASC";
                        $albumRun = mysqli_query($connect, $albumQuery);
                        while ($albumRow = mysqli_fetch_assoc($albumRun)) {
                            echo '<option value="'.$albumRow['id'].'">'.$albumRow['album_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Upload Thumbnail Image:</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <div class="form-group mb-4">
                    <label>Upload Video File:</label>
                    <input type="file" name="video_file" class="form-control" accept="video/*" required>
                </div>

                <div class="text-center">
                    <button type="submit" name="video" class="purple">Add Video</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<?php include('footer.php'); ?>
