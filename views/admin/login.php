<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="views/assets/css/login.css" rel="stylesheet">
</head>

<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <!-- Cambié action a tu controlador y acción -->
        <form action="index.php?controller=login&action=auth" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
            </div>
            <span>or use your account</span>
            <!-- Los inputs tienen los nombres correctos para enviar los datos -->
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <a href="#">Forgot your password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <ul class="wrapper">
                    <li class="icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </li>
                    <li class="icon twitter">
                        <i class="fab fa-twitter"></i>
                    </li>
                    <li class="icon instagram">
                        <i class="fab fa-instagram"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>

</html>