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

    // $base64Img = $_POST['foto'];
    $imgTemp = $_FILES['foto']['tmp_name'];
    $imgExt = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $username = $_SESSION['uname'];
    $folderPathToUp = "../Images/".$username;
    
    $supportedFormat = ['image/jpg', 'image/jpeg', 'image/png'];
    if(!in_array(mime_content_type($imgTemp), $supportedFormat)){
        header('Location: ../index.php?msg=notext');
        exit;
    }

    if(getimagesize($imgTemp) == 0){
        header('Location: ../index.php?msg=notimg');
        exit;
    }

    if(!file_exists($folderPathToUp)){
        if(!mkdir($folderPathToUp, 0777,  true)) {
            header("Location: ../index.php?msg=dirfail");
            exit;
        }
    }

    $fiter = new FilesystemIterator($folderPathToUp, FilesystemIterator::SKIP_DOTS);
    $fcount = iterator_count($fiter) + 1;
    // $data = explode(',', $base64Img);
    $fullImgPath = $folderPathToUp."/X_".$fcount."_".date("YmdHis").".".$imgExt;

    if(!move_uploaded_file($imgTemp, $fullImgPath)){
        header('Location: ../index.php?msg=upfail');
        exit;
    }

    // $ifp = fopen($fullImgPath, "wb");
    // fwrite($ifp, base64_decode($data[1]));
    // fclose($ifp);
    // if(!$ifp){
    //     header("Location: ../index.php?msg=upfail");
    //     exit;
    // }

    header("Location: ./writeLog.php");
    exit;

?>