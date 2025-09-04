<?php
include('header.php');

if (isset($_POST['btn'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $contact  = $_POST['contact'];
    $role  = $_POST['role'];
    $age  = $_POST['age'];
    $city     = $_POST['city'];
    $password = $_POST['password'];

    $query = "INSERT INTO register (name,role,email,contact,age,password,city) 
              VALUES ('$name', '$email', '$contact','$role','$age', '$city', '$password')";
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
            background: linear-gradient(135deg, rgb(260, 107, 193), rgba(189, 88, 5, 1), rgba(182, 142, 31, 1));
            background-size: 300% 300%;
            animation: animateGradient 10s ease infinite;
            border-radius: 20px;
            color: white;
            box-shadow: 0 0 6px rgba(192, 120, 26, 0.84);
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
            background-color: rgba(15, 11, 6, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: white;
        }

        input::placeholder {
            color: #ccc;
        }

        input:focus {
            background-color: rgba(27, 5, 5, 0.25);
            outline: none;
            border-color: #fff;
            box-shadow: 0 0 8px rgba(224, 150, 52, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgba(24, 5, 22, 1);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color:rgba(29, 185, 185, 1);
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

         <label>Your Role</label>
         <?php
                                    $showrole = "SELECT * FROM role";
                                    $run = mysqli_query($connect, $showrole);
                                    while($final = mysqli_fetch_array($run)) {                                      
                                    ?>
                                      <?php } ?>
             
        <input type="text" name="role" placeholder="Enter your role" required>

         <label>Your age</label>
        <input type="text" name="age" placeholder="Enter your age" required>

        <label>Contact Number</label>
        <input type="text" name="contact" placeholder="Enter your contact" required>

        <label>City</label>
        <input type="text" name="city" placeholder="Enter your city" required>

        <label>Password</label>
        <input type="text" name="password" placeholder="Enter your password" required>

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
