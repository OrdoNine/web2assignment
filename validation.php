<?php
    function validateString($s){
        $new_s = trim($s);
        $new_s = htmlspecialchars($s);
        $new_s = stripslashes($s);
        return $new_s;
    }

    function is_valid_Email($e){
        return filter_var($e, FILTER_VALIDATE_EMAIL);
    }

    function matches_pattern($s, $pattern = "/^[a-zA-Z']*$/"){
        return preg_match($pattern, $s);
    }
?>