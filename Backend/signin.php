<?php
    session_start();
    require("conection.php");
    $link = connect();
    $uname = $_POST['uname'];
    $pass  = md5($_POST['pass']);
    $tablename = "user";
    $sqlstr = "SELECT * FROM $tablename WHERE username_user='$uname' AND password_user='$pass'";
    $login = mysqli_query($link,$sqlstr);
    $cek = mysqli_num_rows($login);
    if($cek>0){
        $data = mysqli_fetch_assoc($login);
        $_SESSION['uname'] = $uname;
        $_SESSION['idx'] = $data['id'];
        header("Location: ../index.php");
        mysqli_close($link);
        exit;
    }
    header("Location: ../index.php?msg=fail");
    mysqli_close($link);
    exit;
?>