<?php
include('header.php');
// $connect = mysqli_connect("localhost", "root", "", "sound");
// if (!$connect) {
//     die("Connection Failed: " . mysqli_connect_error());
// }

if (isset($_POST['btn'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $contact  = $_POST['contact'];
    $city     = $_POST['city'];
    $password = $_POST['password'];

    $query = "INSERT INTO registration_form (name, email, contact, city, password) 
              VALUES ('$name', '$email', '$contact', '$city', '$password')";
    $run = mysqli_query($connect, $query);

    if ($run) {
        echo "<script>alert('User Registered Successfully!');</script>";
    } else {
        echo "<script>alert('Error: Registration failed.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
          .container {
            max-width: 500px;
            width: 90%;
            padding: 40px;
            /* background: linear-gradient(135deg, rgb(247, 107, 193), rgb(141, 156, 160), rgb(247, 168, 66)); */
            background: linear-gradient(135deg, rgb(260, 107, 193), rgb(141, 156, 160), rgb(200, 100, 200));
            background-size: 300% 300%;
            animation: animateGradient 10s ease infinite;
            border-radius: 20px;
            color: white;
            box-shadow: 0 0 6px rgba(248, 175, 224, 0.84);
        }

        @keyframes animateGradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: white;
        }

        input::placeholder {
            color: #ccc;
        }

        input:focus {
            background-color: rgba(255, 255, 255, 0.25);
            outline: none;
            border-color: #fff;
            box-shadow: 0 0 8px rgba(255,255,255,0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(252, 142, 243);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color:rgb(247, 224, 240);
        }
    
    </style>
</head>
<body>
  <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn padding:200;" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">Register</h1>
           
        </div>
    </div>
    <!-- Page Header End -->
<div class="container">
    <h2>User Registration</h2>
    <form method="POST">
        <label>Your Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Your Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Contact Number</label>
        <input type="text" name="contact" placeholder="Enter your contact" required>

        <label>City</label>
        <input type="text" name="city" placeholder="Enter your city" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="btn">Register</button>
    </form>
</div>
<br><br>
  
<br><br>

</body>
</html>

<?php
include('footer.php'); 
?>
