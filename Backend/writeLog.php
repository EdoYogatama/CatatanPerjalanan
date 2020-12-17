<?php
    session_start();
    $login = false;
    if(isset($_SESSION['idx'])){
        $login = true;
    }
    require("connection.php");
    $link = connect();
    $id = $_SESSION['idx'];
    $log = "User telah berhasil mengupload foto";
    $datetime = date("Y-m-d").time("h:i:sa");
    $tablename = "user_log";

    $sqlstr = "INSERT INTO $tablename(id_user_log, log, date) VALUES($id, $log, $datetime)";
    // $query = mysqli_query($link, $sqlstr);
    // if(!$query){
    //     printf("Error: %s\n", mysqli_error($link));
    //     exit();
    // }
    if(!mysqli_query($link,$sqlstr)){
        mysqli_close($link);
        header("Location: ../index.php?msg=fail");
        exit;
    }
    mysqli_close($link);
    header("Location: ../index.php?msg=up");
    exit;
?>