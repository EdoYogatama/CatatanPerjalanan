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
    <link rel="stylesheet" href="../Style/myLayout.css">
    <title>Upload</title>
</head>
<body>
    <div class="card-header myNav">
        <header class="navbar">
            <section class="navbar-section">
                <a href="../index.php" class="navbar-brand mr-2"><span class="text-bold">ODiaries</span></a>
                <a href="./Graph.php" class="btn btn-link">Graph</a>
                <a href="./History.php" class="btn btn-link">History</a>
            </section>
            <section class="navbar-section">
            <?php
                    if($login){
                ?>
                    <button class="btn btn-primary" onclick="location.href='../Backend/signout.php';">Sign Out</button>
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
    <section class="form-group flex-centered">
        <form name="loginform" action="../Backend/upload.php" method="POST" onsubmit="return validating()" enctype="multipart/form-data">
            <label class="form-label" for="foto">Image</label>
            <input class="form-input" type="file" name="foto" id="foto"> <br>
            <input class="btn btn-primary" type="submit" value="Upload">
        </form>
    </section>
    <script>
        function validating(){
            if( document.getElementById("foto").files.length === 0 ){
                alert("no files selected");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>