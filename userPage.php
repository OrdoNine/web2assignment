<?php
    session_start();
    include "pages.php";


    load_userPage($_SESSION['user']);
?>