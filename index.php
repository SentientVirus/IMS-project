<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="indexcss.css">
        <title>F2FD</title>
        <div class = "header">
            <img src="f2fd_logo.png" alt="F2FD"
               style="width: 150px; height: 150px; margin-left: 80px" id="logo"/>
            <h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
        </div>
    </head>
    <body>
        <!-- <div class="sidebar">
            <img src="f2fd_logo.png" alt="A generic logo"
                 style="width: 150px;height: 150px" id="logo">
        </div> -->
        <div id="main" style = "margin:auto;">
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
            <br>
            <!-- <div class = "table" style = "margin: auto; border-style: outset;
            width: 500px; height:150px; padding:30px;">-->
            <div id = "block_container" style = "margin-top: 50px;">
            <div id = "bloc1" class = "table" style = "margin-right: 10px; width: 500px;">
              <h1>About</h1>
              <p>We provide questionnaires based on GWAS studies from UK Biobank.
              By taking this questionnaires, which are about some of your
              manifested traits (phenotype), you will get some insight about
              whether you are likely to develop an illness (which is also a
              trait, hence the name phenotype-to-phenotype).</p>
              <img src="tacita.png" alt="Tea cup"
                 style="width: 120px; height: 100px; margin-left: 50px;"/>
              <img src="flecha.gif" alt="Arrow"
                  style="width: 150px; height: 50px; margin-bottom: 20px;"/>
              <img src="eye.png" alt="Depression"
                  style="width: 100px; height: 100px;"/>
              <p>
            </div>
            <div id = "bloc2" class = "table" style = "margin-left: 10px; width: 500px;">
              <h1>Why take our test</h1>
              <p>add content</p></div>
            </div>
            <br>
              <div class = "typewriter" style = "margin: auto; border-radius: 10px; width: 500px; height:120px; padding:30px;">
                <h1 style = "text-align: center;">What do you want to do?</h1>
                <hr style = "border: 0; height: 1px; background: #333;
                background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                <br>
                <br>
            <!--<a class = "btn btn1" href='questionnaire.php'
            style = "text-decoration: none; margin-left:70px;
            font-family: 'Tahoma', sans-serif; font-size: 14px;">
              Take the test</a>-->
              <select autofocus name = "illness" onchange="location = this.value;" class = "btn btn1"; style = "text-decoration: none; margin-left:70px;
              margin-top: -20px; height: 56px; font-family: 'Tahoma', sans-serif; font-size: 14px;">
              <option value = "" selected = "selected">Choose test</option>
              <option value= "depression.php">Depression</option>
              <option value= "illness2.php">Illness2</option></select>

              <a href='login.php' class = "btn btn1" href='login.php'
              style = "text-decoration: none; margin-left: 50px; margin-right:50px;
              font-family: 'Tahoma', sans-serif; font-size: 14px;">To log in page</a>
              </div>
            <br>
            <div id = "block_container">
            <div id = "bloc1" class = "table" style = "margin-right: 10px; width: 500px;">
              <p>add content</p></div>
            <div id = "bloc2" class = "table" style = "margin-left: 10px; width: 500px;">
              <p>To be completed</p></div>
            </div>
            <!--<form id="form">
                <div>
                <h1>What do you want to do?</h1>
                <hr>
                <a href='questionnaire.php'><button>Go to the questionnaire</button></a>
                <label><b>Email:</b></label>
                <input type="text" placeholder="Enter Email" name="useremail" required><br><br>
                <label><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="userpassword" required><br><br>
                <label><b>Confirm Password:</b></label>
                <input type="password" placeholder="Confirm Password" name="confirmpassword" required><br><br>
                <br>
               <label><b>Enter below image text here:</b></label>
                    <input name="captchacode" type="text">
                    <img src="captcha.php" /><br>
                <p>By creating an account you agree to our <a href="linktotermsandprivacypage.html" style="color:dodgerblue">Terms & Privacy</a>.</p>
                    <div>
                        <button type="submit">Log in</button>
                    </div>-->
                </div>
            </form>
        </div></aside>
    </body>
    <footer>

    </footer>
</html>
