<?php 
    session_start();
    $login = false;
    if(isset($_SESSION['idx'])){
        $login = true;
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="Style/myLayout.css">
    <title>Tugas</title>
</head>
<body>
    <div class="card-header myNav">
        <header class="navbar">
            <section class="navbar-section">
                <a href="#" class="navbar-brand mr-2"><span class="text-bold">ODiaries</span></a>
                <a href="View/Graph.php" class="btn btn-link">Graph</a>
                <a href="View/History.php" class="btn btn-link">History</a>
            </section>
            <section class="navbar-section">
                <?php
                    if($login){
                ?>
                    <button class="btn btn-primary" onclick="location.href='Backend/signout.php';">Sign Out</button>
                <?php
                    } else {
                ?>
                    <button class="btn btn-primary" onclick="location.href='View/SignIn.php';">Sign In</button>
                <?php
                    }
            ?>
            </section>
        </header>
    </div>
    <section class="flex-centered hero">
        <div class="bg-secondary card col-xl-7 landingTitle">
            <div class="text-primary h1 text-bold">
                <?php
                    if($login){
                        echo "SELAMAT DATANG ".$_SESSION['uname'];
                    } else {
                        echo "SELAMAT DATANG!";
                    }
                ?>
            </div>
            <div class="h5 text-bold">
                <?php
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        if($msg == "fail"){
                            echo "Something Went Wrong";
                        } else if($msg == "success") {
                            echo "Sign Up Success";
                        } else if($msg == "logreq"){
                            echo "Login Required";
                        } else if($msg == "dirfail"){
                            echo "Fail Creating Folder";
                        } else if($msg == "upfail"){
                            echo "Failed to Upload";
                        } else if($msg == "up"){
                            echo "Upload Success";
                        } else if($msg == "notimg"){
                            echo "Is it an image?";
                        } else if($msg == "notext"){
                            echo "File not supported";
                        }
                    }
                ?>
            </div>
        </div> <br>
        <button class="btn btn-primary" onclick="location.href='View/Upload.php';">Upload Image</button>
    </section>
</body>
</html>