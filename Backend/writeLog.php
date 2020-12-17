<?php
    session_start();
    $login = false;
    if(isset($_SESSION['idx'])){
        $login = true;
    }
    require("conection.php");
    $link = connect();
    $id = $_SESSION['idx'];
    $log = $_SESSION['uname']." telah berhasil mengupload foto";
    $datetime = date('Y-m-d H:i:s');
    $tablename = "user_log";
    $sqlstr = "INSERT INTO $tablename(id_user_log, catat, tanggal) VALUES($id, '$log', '$datetime')";
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