<?php
    function connect(){
        $host = "localhost";
        $uname = "root";
        $pass = "";
        $databasename = "tugas";

        $link = mysqli_connect($host, $uname, $pass, $databasename) or die ("Failed to connect to the database");
        if(mysqli_connect_errno()){
            echo "Failed to Connect : ".mysqli_connect_error();
            exit;
        }

        return $link;
    }
?>