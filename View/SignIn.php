<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form name="loginform" action="../Backend/signin.php" method="POST" onsubmit="return validating(loginform)">
        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname"><br><br>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"> <br>
        <input type="submit">
    </form>
    <script>
        function validating(form){
            if(form.uname.value=="" || form.pass.value==""){
                alert("Uname or Password cant be empty");
                return false;
            }
            return true;
        }    
    </script>
</body>
</html>