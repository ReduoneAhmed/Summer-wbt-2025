<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="navbar">
        <h2>Company</h2>
        <div class="link">
            <a href="../php/home.php">Home</a>
            <a href="../php/login.php">Login</a>
            <a href="../php/registration.php">Registration</a>
        </div>


    </div>

    <div class="main">
        <fieldset>
            <legend>Login</legend>
            <label for="Uname">User Name :</label>
            <input type="text" name="Uname">
            <br><br>
            <label for="Pass">Password :</label>
            <input type="password" name="Pass">
            <hr>

            <input type="checkbox" name="remember">Remember me
            <br>

            <button type="submit" value="submit">submit</button>

            <a href="../php/forgotPass.php">Forgot Password</a>
            <br>
            <a href="../php/dashboard.php">Dashboard</a>

        </fieldset>
    </div>

    <div class="footer">
        <p>copyright 2017</p>
    </div>

</body>

</html>