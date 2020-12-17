<?php
    require("conection.php");
    $link = connect();
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass  = md5($_POST['pass']);
    $tablename = "user";
    $sqlstr = "INSERT INTO $tablename(email_user,username_user,password_user) VALUES('$email','$uname','$pass')";
    if(!mysqli_query($link,$sqlstr)){
        mysqli_close($link);
        header("Location: ../index.php?msg=fail");
        exit;
    }
    mysqli_close($link);
    header("Location: ../index.php?msg=success");
    exit;
?>