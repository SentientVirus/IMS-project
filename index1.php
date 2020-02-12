<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="indexcss.css">
        <title>F2FD</title>
        <header>
            <h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
        </header>
    </head>
    <body>
        <div class="sidebar">
            <img src="generic-logo.jpg" alt="A generic logo" 
                 style="width: 140px;height: 42px" id="logo">
        </div>
        <div id="main">
            <?php
                session_start();
            ?>
            <?php
                if (isset($_SESSION['error']))
                { $errormsg = $_SESSION['error'];
                 unset($_SESSION['error']);
                 echo '<p <strong> $errormsg </strong><br/></p>';
                }
            ?>
            <form action="login.php" id="form">
                <div>
                <h1>Log in to an existing account</h1>
                <hr>
                <label><b>Email:</b></label>
                <input type="text" placeholder="Enter Email" name="useremail" required><br><br>
                <label><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="userpassword" required><br><br>
                <label><b>Confirm Password:</b></label>
                <input type="password" placeholder="Confirm Password" name="confirmpassword" required><br><br>
                <br>
<!--                <label><b>Enter below image text here:</b></label>
                    <input name="captchacode" type="text">
                    <img src="captcha.php" /><br> -->
                <p>By creating an account you agree to our <a href="linktotermsandprivacypage.html" style="color:dodgerblue">Terms & Privacy</a>.</p>
                    <div>
                        <button type="submit">Log in</button>
                    </div>
                </div>
            </form>
        </div></aside>
    </body>
    <footer>
        
    </footer>
</html>