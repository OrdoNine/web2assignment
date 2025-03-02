<?php
    define("color", "<div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                    <label for='SelectCol' style='vertical-align: middle;'>Color: </label>
                    <select class='carved' name='color' id='SelectCol'>
                    <option value='black' selected>Black</option>
                    <option value='red'>Red</option>
                    <option value='blue'>Blue</option>
                    <option value='green'>Green</option>
                    </select>
                    </div>");

    function setup_item($item){
        switch ($item){
            case "pen":
                return "<div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                <label for='SelectPt' style='vertical-align: middle;'>Point: </label>
                <select class='carved' name='penpoint' id='SelectPt'>
                <option value='ballpoint' selected>Ballpoint</option>
                <option value='tripoint'>Tripoint</option>
                </select>
                </div>" . color;
            
            case "glue":
                return "<div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                        <label for='SelectPt' style='vertical-align: middle;'>Size: </label>
                        <select class='carved' name='size' id='SelectPt'>
                        <option value='small-1'>Small (1 JOD)</option>
                        <option value='medium-1.5' selected>Medium (1.5 JOD)</option>
                        <option value='big-2'>Big (2 JOD)</option>
                        </select>
                        </div>";

            case "notebook":
                return "<div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                        <label for='SelectLang' style='vertical-align: middle;'>Language Format: </label>
                        <select class='carved' name='language' id='SelectLang'>
                        <option value='arabic' selected>Arabic</option>
                        <option value='english'>English</option>
                        </select>
                        </div>                    
                        <div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                        <label for='SelectPages' style='vertical-align: middle;'>Pages: </label>
                        <select class='carved' name='pages' id='SelectPages'>
                        <option value='40-0.4' selected>40 (0.40 JOD)</option>
                        <option value='60-0.6'>60 (0.60 JOD)</option>
                        <option value='80-0.8'>80 (0.80 JOD)</option>
                        <option value='100-1'>100 (1 JOD)</option>
                        </select>
                        </div>" . color;
            return "";
        }
    }

    function load_userPage($username){
        $userCount = -1;
        $orderCount = -1;
        $revenueSum = -1;
        $conn = mysqli_connect("localhost", "root", "", "hadderdb");
        if ($conn){
            $tables = array("hadderdb.penorders", "hadderdb.glueorders", "hadderdb.bookorders", "hadderdb.paperorders", "hadderdb.colororders");
            $getUsersSQL = "SELECT COUNT(username) AS total FROM hadderdb.users";
            $x = mysqli_query($conn, $getUsersSQL);
            if ($x){
                $userCount = mysqli_fetch_assoc($x)['total'];
            }
            
            $orderCount = 0;
            for ($i=0; $i<count($tables); $i++){
                $getOrdersSQL = "SELECT COUNT(id) AS total FROM " . $tables[$i];
                $x = mysqli_query($conn, $getOrdersSQL);
                if ($x){
                    $orderCount += mysqli_fetch_assoc($x)['total'];
                }
            }

            $revenueSum = 0;
            for ($i=0; $i < count($tables); $i++){
                $getRevenueSQL = "SELECT SUM(price) AS total FROM " . $tables[$i];
                $x = mysqli_query($conn, $getRevenueSQL);
                if ($x){
                    $revenueSum += mysqli_fetch_assoc($x)['total'];
                }
            }
            $revenueSum = number_format($revenueSum, 2);
        }
        else{
            echo "<p style='background-color:red;'>Could not reach server :(<p>";
        }


        echo "<!DOCTYPE html>
        <html>
            <head>
                <link rel = 'stylesheet' href='hadder.css'>
                <title>Al-Hadder Pen Store</title>
                <link rel='icon' type='image/x-icon' href='icon.ico'>
            </head>
        
            <body>
                <div id = 'banner'>
                    <h1>Welcome to Al-Hadder Store, $username</h1>
                </div>

                <div class='sign' style = 'margin-left:0px; margin-right:10px; margin-top:0px; display: block; flex-direction: row; align-items: center; width:98%; height:100%;'>
                    <div class='firstrep' style='display: flex; flex-direction: row; align-items: center; justify-content: center;'>
                        <p>Register Users: $userCount</p>
                    </div>
               
                    <div class='secondrep' style='display: flex; flex-direction: row; align-items: center; justify-content: center;'>
                        <p>Orders: $orderCount</p>
                    </div>
                    <div class='firstrep' style='display: flex; flex-direction: row; align-items: center; justify-content: center;'>
                        <p>Revenue: $revenueSum JOD</p>
                    </div>
                </div>

                <div class='sign' style='background-color: brown; margin-left: 15%; flex-wrap: wrap; padding: 10px; display: inline-flex; width: 896px; height: auto;'>
                    <div class='carved' style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <a href='orderPage.php?item=pen' target='_self'>
                            <img src='imgs/Cross_Pens_Top_10_Pen_Brands.webp' height='256px' width='256' alt='Cross_Pens_Top_10_Pen_Brands'>
                        </a>
                        <a href='orderPage.php?item=pen' target='_self'>High Quality Pens</a>
                    </div>
        
                    <div class='separator'></div>
        
                    <div class='carved' style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <a href='orderPage.php?item=glue' target='_self'>
                            <img src='imgs/UHU-GLUE-STICK-21G-1.jpg' height='256px' width='256' alt='UHU-GLUE-STICK-21G-1'>
                        </a>
                        <a href='orderPage.php?item=glue' target='_self'>UHU Glue Sticks</a>
                    </div>
        
                    <div class='separator'></div>
        
                    <div class='carved' style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <a href='orderPage.php?item=notebook' target='_self'>
                            <img src='imgs/544761146_max.jpg' height='256px' width='256' alt='Notebooks'>
                        </a>
                        <a href='orderPage.php?item=notebook' target='_self'>Spiral Notebooks</a>
                    </div>
        
                    <div class='separator'></div>
        
                    <div class='carved' style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <a href='orderPage.php?item=paper' target='_self'>
                            <img src='imgs/ABC A4-1200x1200.jpg' height='256px' width='256' alt='ABC A4-1200x1200'>
                        </a>
                        <a href='orderPage.php?item=paper' target='_self'>Spiral Notebooks</a>
                    </div>
        
                    <div class='separator'></div>
        
                    <div class='carved' style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <a href='orderPage.php?item=watercolor' target='_self'>
                            <img src='imgs/FCwcseton12_1000x.webp' height='256px' width='256' alt='Watercolors'>
                        </a>
                        <a href='orderPage.php?item=watercolor' target='_self'>Watercolor Sets</a>
                    </div>
                </div>
                    
            </body>
        </html>";
    }

    function load_orderPage($item){
        $item_name = "";
        $item_img = "";
        switch ($item){
            case "pen":
                $item_name = "High Quality Pens";
                $item_img = "imgs/Cross_Pens_Top_10_Pen_Brands.webp";
                break;
            case "glue":
                $item_name = "Glue Sticks";
                $item_img = "imgs/UHU-GLUE-STICK-21G-1.jpg";
                break;
            case "notebook":
                $item_name = "Notebooks";
                $item_img = "imgs/544761146_max.jpg";
                break;
            case "paper":
                $item_name = "AA4 Paper";
                $item_img = "imgs/ABC A4-1200x1200.jpg";
                break;
            case "watercolor":
                $item_name = "Watercolor Set";
                $item_img = "imgs/FCwcseton12_1000x.webp";
                break;
        }
       
        
        echo "<!DOCTYPE html>
        <html>
            <head>
                <link rel = 'stylesheet' href='hadder.css'>
                <title>Al-Hadder Pen Store</title>
                <link rel='icon' type='image/x-icon' href='icon.ico'>
            </head>
        
            <body>
                <div id = 'banner'>
        
                </div>
        
                    <div style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>
                        <img src='$item_img', alt='Cross_Pens_Top_10_Pen_Brands' width='256px' height='256px'>
                        <h2>$item_name</h2>
                    </div>
        
                    <form action='processOrder.php?item=$item' method='post'>
                        <div id='login' style='height: 60%;display:inline-flex; flex-direction:column; align-items: center; justify-content: center;' class='sign'>
                            <div style='height:33%; display:flex; flex-direction: row; align-items: center;'>
                                <label for='amtTxt'>Order Amount:</label>
                                <input class='carved textlikes' type='number' min='1' id='amtTxt' name='amount' value='1' required>
                            </div>
                            
                            <hr>     
        
                            " .  setup_item($item) . "
        
                            <hr>
        
                            <br>
                            <div style='height: 25%; width: 75%; display: block; align-items: center; justify-content: center;'>
                                <input type='submit' value='ORDER'>
                            </div>
                        </div>
                    </form>
            </body>
        </html>";
    }
?>