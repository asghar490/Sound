<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// get current user info
$query = $connect->prepare("SELECT * FROM login WHERE username=?");
$query->bind_param("s", $_SESSION['user']);
$query->execute();
$user = $query->get_result()->fetch_assoc();

if (isset($_POST['save'])) {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    $imageName = $user['profile_image'];

    if (!empty($_FILES['profile_pic']['name'])) {
        $imageName = time() . "_" . basename($_FILES['profile_pic']['name']);
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "uploads/" . $imageName);
    }

    $update = $connect->prepare("UPDATE login SET username=?, password=?, profile_image=? WHERE id=?");
    $update->bind_param("sssi", $newUsername, $newPassword, $imageName, $user['id']);
    if ($update->execute()) {
        $_SESSION['user'] = $newUsername;
        $_SESSION['profile_image'] = $imageName;
        echo "<script>alert('Profile updated'); window.location='dashboard.php';</script>";
        exit;
    } else {
        echo "Error: " . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile</title>
<style>
body {
    background-color: #2e2e2e;
    color: white;
    font-family: Arial;
}
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #3b3b3b;
    border-radius: 8px;
}
input {
    width: 100%;
    margin: 10px 0;
    padding: 12px;
    font-size: 1rem;
}
button {
    background-color: purple;
    color: white;
    padding: 12px;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    width: 100%;
}
button:hover {
    background-color: #6a0dad;
}
img {
    max-width: 100px;
    border-radius: 50%;
}
</style>
</head>
<body>
<div class="container">
    <h2>My Profile</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Upload New Profile Image (optional):</label>
        <input type="file" name="profile_pic">

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>

        <button type="submit" name="save">Save</button>
    </form>
</div>
</body>
</html>
