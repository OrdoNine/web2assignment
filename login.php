<?php
    include "validation.php";
    session_start();

    function checkLogin($conn, $sql){
        global $user;

        $reqAcc = mysqli_query($conn, $sql);

        if (mysqli_num_rows($reqAcc) > 0){
            $x = mysqli_fetch_array($reqAcc);
            $user = $x[0];
            echo "<p>Welcome back, $user </p>";
            $_SESSION["user"] = $user;
            header("Location: userPage.php");
            die();
        }
        else{
           echo "<p>Username or Password Incorrect.</p>";
           session_destroy();
        }
    }

    $user = validateString($_POST["user"]); //could be email
    $pass = validateString($_POST["pass"]);

    echo "<p> Please wait.</p>";
    $conn = mysqli_connect("localhost", "root", "", "hadderdb");
    if ($conn){
        echo "<p>Server Online.</p>";
    }
    else{
        echo "<p>Could not reach server :(<p>";
        session_destroy();
    }

    $empty = empty($user) or empty($pass);
    $validUser = matches_pattern($user);
    $validEmail = (!matches_pattern($user) and is_valid_Email($user));

    if ($empty){
        echo "<p> Empty field(s) detected.</p>";
        session_destroy();
    }

    $loginSQL = "";
    if ($validUser){
        $loginSQL = "SELECT username FROM hadderdb.users WHERE username = '$user' AND password = '$pass'";
        checkLogin($conn, $loginSQL);
    }
    elseif ($validEmail){
        $loginSQL = "SELECT username FROM hadderdb.users WHERE email = '$user' AND password = '$pass'";
        checkLogin($conn, $loginSQL);
    }
    else{
        echo "<p>Invalid Username or Email.</p>";
        session_destroy();
    }
?>