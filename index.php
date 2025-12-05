<?php

require_once 'config.php';

$insert = false;
$error = "";

if(isset($_POST['name'])){ 

    $conn = mysqli_connect($server, $username, $password);

    mysqli_select_db($conn, $database);

    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connection to the db." . "<br>";

    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $age = mysqli_real_escape_string($conn, trim($_POST['age']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $desc = mysqli_real_escape_string($conn, trim($_POST['desc']));
        
        // $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // // echo $sql;

    //     if($conn->query($sql) == true){
    //         $insert = true;
    //         // echo "Successfully inserted";
    //     }
    //     else {
    //         echo "ERROR: $sql <br> $conn->error";
    //     }

    //     $conn->close();
    // }

    // Basic validation
    if(empty($name) || empty($age) || empty($gender) || empty($email) || empty($phone)){
        $error = "All fields except 'other details' are required!";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format!";
    }
    elseif(!is_numeric($age) || $age < 1 || $age > 120){
        $error = "Please enter a valid age!";
    }
    else {
        // Using prepared statements
        $stmt = $conn->prepare("INSERT INTO trip (name, age, gender, email, phone, other, date) VALUES (?, ?, ?, ?, ?, ?, current_timestamp())");
        $stmt->bind_param("sissss", $name, $age, $gender, $email, $phone, $desc);
        
        if($stmt->execute()){
            // $insert = true;
            header("Location: index.php?success=1");
            exit;
        }
        else {
            $error = "Error submitting form. Please try again.";
        }
        
        $stmt->close();
    }

    $conn->close();
}

if(isset($_GET['success']) && $_GET['success'] == 1){
    $insert = true;
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
</head>
<body>
    <img src="./univ.jpg" alt="building_img" class="bg">
    <div class="container">
        <h1>
            Welcome to BBDEC College 🛫 Trip Form
        </h1>
        <p>
            Enter Your details and submit this form to confirm your participation in the trip.
        </p>

        <?php 
        if($insert == true){
            echo "<p class='submitMsg'> Thanks for submitting the form. We are happy to see you joining this trip.
            </p>";
        }
        if(!empty($error)){
            echo "<p class='errorMsg'>" . htmlspecialchars($error) . "</p>";
        }
        ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="number" name="age" id="age" placeholder="Enter your age" min="5" max="100" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" rows="6" cols="30" placeholder="Enter other details here"></textarea>
            <button class="btn">Submit here</button>

        </form>

    </div>
        <script src="./script.js"></script>
    </body>
</html>