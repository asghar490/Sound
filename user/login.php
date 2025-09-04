<?php
include('header.php');
include('config.php'); 

session_start();

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_contact'] = $row['contact'];
        $_SESSION['user_age'] = $row['age'];
        $_SESSION['user_city'] = $row['city'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_password'] = $row['password'];

        echo "<script>alert('Login Successful!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
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
            /* background: linear-gradient(135deg, rgba(19, 6, 14, 1), rgba(206, 171, 55, 1), rgb(247, 168, 66)); */
            background: linear-gradient(135deg, rgb(260, 107, 193), rgba(124, 61, 10, 1), rgba(211, 141, 36, 1));
            background-size: 300% 300%;
            animation: animateGradient 10s ease infinite;
            border-radius: 20px;
            color: white;
            box-shadow: 0 0 6px rgba(179, 154, 43, 0.84);
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
            background-color: rgba(196, 109, 11, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: white;
        }

        input::placeholder {
            color: #ccc;
        }

        input:focus {
            background-color: rgba(17, 1, 1, 0.86);
            outline: none;
            border-color: #fff;
            box-shadow: 0 0 8px rgba(247, 125, 55, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgba(12, 10, 12, 1);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color:rgba(73, 211, 230, 1);
        }
    
    </style>
</head>
<body>
  <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn padding:200;" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">LOGIN</h1>
           
        </div>
    </div>
    <!-- Page Header End -->
<div class="container">
    <h2>USER LOGIN</h2>
    <form method="POST">
        <label>Your Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Your Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="btn">LOGIN</button>
    </form>
</div>

        
        </body>
</html>
<?php
include('footer.php');
?>