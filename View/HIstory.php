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
    <title>Sign In</title>
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
    <section class="flex-centered hero">
        <div class="bg-secondary card col-xl-7 landingTitle">
            <span class="text-primary h1 text-bold"> LOG HISTORY </span> <br>
            <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Usename</th>
                            <th>Log</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require("../Backend/conection.php");
                            $link = connect();
                            $id = $_SESSION['idx'];
                            $tablename = "user_log";
                            $sqlstr = "SELECT * FROM $tablename WHERE id_user_log=$id ORDER BY id_log DESC";
                            $query = mysqli_query($link, $sqlstr);
                            // if(!$query){
                            //     printf("Error: %s\n", mysqli_error($link));
                            //     exit();
                            // }
                            $num = 1;
                            while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $_SESSION['uname']; ?></td>
                                <td><?php echo $data['catat']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                        </tr>
                        <?php } 
                            mysqli_close($link);
                        ?>
                    </tbody>
            </table>
        </div>
    </section>
</body>
</html>