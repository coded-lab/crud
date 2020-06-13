<?php
session_start();


function sms(){
    if(isset($_SESSION["sms"])){
        $result="<div class=\"sms\">";
        $result .=htmlentities($_SESSION["sms"]);
        $result .="</div>";
        $_SESSION["sms"]=null;
        return $result;
    }
}

function error(){
    if(isset($_SESSION["error"])){
        $result="<div class=\"error\">";
        $result .=htmlentities($_SESSION["error"]);
        $result .="</div>";
        $_SESSION["error"]=null;
        return $result;
    }
}

function username($username){

if(isset($_SESSION['username'])){
    $outpu="div class=\"sms\">";
    $outpu .=htmlentities($_SESSION['username']);
    $outpu .="</div>";
    $_SESSION['username']=null;
    return $outpu;
}
}
?>|