<?php
    session_start();
    $login = false;
    if(isset($_SESSION['idx'])){
        $login = true;
    }

    if(!$login){
        header("Location: ../index.php?msg=logreq");
        exit;
    }

    $base64Img = $_POST['foto'];
    $username = $_SESSION['uname'];
    $folderPathToUp = "../Images/".$username;
    
    if(!file_exists($folderPathToUp)){
        if(!mkdir($folderPathToUp, 0777,  true)) {
            header("Location: ../index.php?msg=dirfail");
            exit;
        }
    }

    $fiter = new FilesystemIterator($folderPathToUp, FilesystemIterator::SKIP_DOTS);
    $fcount = iterator_count($fiter) + 1;
    $data = explode(',', $base64Img);
    $fullImgPath = $folderPathToUp."/X_".$fcount."_".date("YmdHis").".png";

    $ifp = fopen($fullImgPath, "wb");
    fwrite($ifp, base64_decode($data[1]));
    fclose($ifp);
    if(!$ifp){
        header("Location: ../index.php?msg=upfail");
        exit;
    }

    header("Location: ./writeLog.php");
    exit;

?>