<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <br>
    <br>
        <div class="cont">
            <div class="form sign-in">
                <h2>Welcome</h2>
                <form class="sign-in" action="login-validation.php" method="POST">
                    <label>
                        <span>Email</span>  
                        <input type="email" name="email" />
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" />
                    </label>
                    <label id="custom-style-checkbox">
                        <span>Remember Me.</span><input type="checkbox" name="remember_me">
                    </label>
                    <button type="submit" class="submit">Log In</button>
                </form>
            
            </div>
            <div class="sub-cont">
                <div class="img">
                    <div class="img__text m--up">
                    
                        <h3>Don't have an account? Please Sign up!<h3>
                    </div>
                    <div class="img__text m--in">
                    
                        <h3>If you already has an account, just Log in.<h3>
                    </div>
                    <div class="img__btn">
                        <span class="m--up">Sign Up</span>
                        <span class="m--in">Log In</span>
                    </div>
                </div>
                <div class="form sign-up">
                    <h2>Create your Account</h2>
                    <form class="sign-up" onsubmit="return validatePassword();" action="signup-validation.php" method="post">
                        <label>
                            <span>Full Name</span>
                            <input type="text" name="full_name" required>
                        </label>
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" required>
                        </label>
                        <label>
                            <span>Mobile</span>
                            <input type="tel" name="mobile_number" required>
                        </label>
                        <label>
                            <span>Country</span>
                            <input type="text" name="country" required>
                        </label>
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" id="password" required>
                        </label>
                        <label>
                            <span>Confirm Password</span>
                            <input type="password" name="confirm_password" required>
                        </label>
                        <button type="submit" class="submit">Sign Up</button>
                    </form>
                    
                </div>
            </div>
        </div>

        <script>
            document.querySelector('.img__btn').addEventListener('click', function() {
                document.querySelector('.cont').classList.toggle('s--signup');
            });
        </script>
        <script src="./password_validation.js"></script>
</body>
</html>