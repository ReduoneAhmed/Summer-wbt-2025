<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="#" class="logo">XCompany</a>
            <nav>
                <a href="home.html">Home</a> |
                <a href="login.html">Login</a> |
                <a href="registration.html">Registration</a>
            </nav>
        </header>
        <div class="form-container">
            <h2>Registration</h2>
            <form action="#" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="username">User Name</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <label for="gender">Gender</label>
                <input type="radio" id="male" name="gender" value="Male"><label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female"><label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="Other"><label for="other">Other</label>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>

                <div class="form-buttons">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>

</html>