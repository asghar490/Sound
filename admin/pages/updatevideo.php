<?php
include('config.php');
include('header.php');

// Get ID and fetch existing data
if (isset($_GET['up_id'])) {
    $id = intval($_GET['up_id']);
    $query = "SELECT * FROM video WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    die("Invalid Request:  Video ID not provided.");
}

// Update Logic
if (isset($_POST['update'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $duration    = $_POST['duration'];
    $year        = $_POST['year'];
    $artist      = $_POST['artist'];
    $album       = $_POST['album'];

    // Old image as default
    $image = $data['image'];

    // If new image uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $temp  = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp, "images/" . $image);
    }

    $updateQuery = "UPDATE  video SET 
        name='$name', 
        description='$description', 
        duration='$duration', 
        year='$year', 
        artist='$artist', 
        album='$album', 
        image='$image' 
        WHERE id=$id";

    if (mysqli_query($connect, $updateQuery)) {
        echo "<script>alert(' video Updated Successfully'); window.location.href='showvideo.php';</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>
<style>
    .gradient-border {
    position: relative;
    padding: 18px;
    border-radius: 20px;
    background: conic-gradient(from 0deg,rgb(255, 110, 226),rgb(245, 186, 245),rgb(228, 121, 250));
    background-size: 500% 300%;
            animation: animateGradient 30s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
}






        @keyframes animateGradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
            to {
                opacity: 1;
                transform: translateY(1);
            }
        



/* Purple button */
.purple {
    background: conic-gradient(from 0deg,rgb(255, 70, 218),rgb(243, 234, 243),rgb(213, 52, 245));
    background-size: 300% 300%;
            animation: animateGradient 30s ease infinite;
    color: white;
    font-size: 1.2rem;
    padding: 10px 30px;
    border-radius: 8px;
    border: none;
}
.purple:hover {
    background-color: #800080;
}
</style>
<br>
<!-- Centered Update Form -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="gradient-border" style="width: 520px;">
        <div class="inner-card">
        <h3 class="text-center mb-4">Update  video</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label>Name:</label>
                <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Description:</label>
                <input type="text" name="description" value="<?= $data['description'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Duration:</label>
                <input type="text" name="duration" value="<?= $data['duration'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Year:</label>
                <input type="number" name="year" value="<?= $data['year'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Artist:</label>
                <input type="text" name="artist" value="<?= $data['artist'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Album:</label>
                <input type="text" name="album" value="<?= $data['album'] ?>" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label>Current Image:</label><br>
                <img src="images/<?= $data['image'] ?>" width="100" class="mb-2"><br>
                <label>Change Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" name="update" class="btn btn-primary w-100">Update  video</button>
            </div>
        </form>
    </div>
</div>
</div>
<?php include('footer.php'); ?>
