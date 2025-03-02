<?php 
    include "validation.php";

    $user = validateString($_POST["user"]); 
    $pass = validateString($_POST["pass"]);
    $email = validateString($_POST["email"]);
    $age = $_POST["ageVal"];
    $gender = $_POST["gender"];

    echo "<p> Please wait.</p><br>";
    $conn = mysqli_connect("localhost", "root", "", "hadderdb");
    if ($conn){
        echo "<p>Server Online.</p>";
    }
    else{
        echo "<p>Could not reach server :(<p>";
    }
    echo "<br>";

    $validUser = (matches_pattern($user) and strlen($user) >= 4);
    $validPass = strlen($pass) >= 8;
    $validEmail = is_valid_Email($email);
    $valid = ($validUser and $validPass and $validEmail);
    

    if ($valid){
        
        $loginSQL = "SELECT username FROM hadderdb.users WHERE username = '$user'";
        $existAcc = $conn->query($loginSQL);

        if (mysqli_num_rows($existAcc) > 0){
          echo "<p>Username is taken! Try again. </p>";
        }
        else{
            $insert = "INSERT INTO hadderdb.users(username, age, gender, email, password) VALUES ('$user', '$age', '$gender', '$email', '$pass')";
            $insertAcc = mysqli_query($conn, $insert);
            if ($insertAcc){
                echo "<p>Registration Successful!</p> <a href='mainPage.html' target='_self'>Click here to go back to the main page.</a>";  
            }
            else{
                echo "<p> An error occured :(</p>";
            }
        }
    }
        if (!$validUser){
            echo "<p>Invalid Username. Please make sure it is at least 4 characters, and only letters!</p>";
        }
        if (!$validPass){
            echo "<p>Password must be at least 8 characters long!</p>";
        }
        if (!$validEmail){
            echo "<p>Invalid Email Address!</p>";
        }

?>