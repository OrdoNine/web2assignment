<?php
    echo "<p> Please wait.</p>";
    $conn = mysqli_connect("localhost", "root", "", "hadderdb");
    if ($conn){
        echo "<p>Server Online.</p>";
    }
    else{
        echo "<p>Could not reach server :(<p>";
    }

    $orderSQL = "";
    $amount = $_REQUEST['amount'];
    switch ($_REQUEST['item']){
        case "pen":
            $price = $amount * 0.3;
            $color = $_REQUEST['color'];
            $point = $_REQUEST['penpoint'];
            $orderSQL = "INSERT INTO hadderdb.penorders(amount, color, point, price) VALUES ('$amount', '$color', '$point', '$price')";
            break;
        case "glue":
            $sizeReq = explode("-",$_REQUEST['size']);
            $size = $sizeReq[0];
            $price = $amount * $sizeReq[1];
            $orderSQL = "INSERT INTO hadderdb.glueorders(amount, size, price) VALUES ('$amount', '$size', '$price')";  
            break;
        case "notebook":
            $color = $_REQUEST['color'];
            $lang = $_REQUEST['language'];
            $pagesReq = explode("-", $_REQUEST['pages']);
            $pages = $pagesReq[0];
            $price = $amount * $pagesReq[1];
            $orderSQL = "INSERT INTO hadderdb.bookorders(amount, color, language, pages, price) VALUES ('$amount', '$color', '$lang', '$pages', '$price')";
            break;
        case "paper":
            $price = $amount * 2.50;
            $orderSQL = "INSERT INTO hadderdb.bookorders(amount, price) VALUES ('$amount', '$price')";
        case "watercolor":
            $price = $amount * 2;
            $orderSQL = "INSERT INTO hadderdb.bookorders(amount, price) VALUES ('$amount', '$price')";
    }
    
    $insert = mysqli_query($conn, $orderSQL);
    if ($insert){
        echo "<p>Order is being processed!</p> <a href='userPage.php' target='_self'>Click here to go back to the store.</a>";  
    }
    else{
        echo "<p> An error occured :(</p>";
    }    
?>