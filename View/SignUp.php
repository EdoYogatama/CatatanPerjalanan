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
                <button class="btn btn-primary" onclick="location.href='./SignIn.php';">Sign In</button>
            </section>
        </header>
    </div>
    <section class="form-group flex-centered">
        <form name="loginform" action="../Backend/signup.php" method="POST" onsubmit="return validating(loginform)">
            <label class="form-label" for="email">Email</label>
            <input class="form-input" type="text" name="email" id="email">
            <label class="form-label" for="uname">Username</label>
            <input class="form-input" type="text" name="uname" id="uname">
            <label class="form-label" for="pass">Password</label>
            <input class="form-input" type="password" name="pass" id="pass"><br>
            <input class="btn btn-primary" type="submit" value="Sign Up">
        </form>
    </section>
    <script>
        function validating(form){
            if(form.uname.value=="" || form.pass.value=="" || form.email.value==""){
                alert("Cant be empty");
                return false;
            }
            return true;
        }    
    </script>
</body>
</html>