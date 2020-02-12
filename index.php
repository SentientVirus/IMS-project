<?php
	session_start();
?>
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
        </div>
        <div id = "overlayer" onclick="off()"></div>
        <div class = "typewriter" style = "margin: auto; border-radius: 10px;
        width: 500px; padding:30px; margin-top:20px;">
          <h1 style = "text-align: center;">What do you want to do?</h1>
          <hr style = "border: 0; height: 1px; background: #333;
          background-image: linear-gradient(to right, #ccc, #333, #ccc);">
          <br>
          <br>
        <select autofocus name = "illness" onchange="location = this.value;" class = "btn btn1"; style = "text-decoration: none; margin-left:70px;
        margin-top: -20px; height: 56px; font-family: 'Tahoma', sans-serif; font-size: 14px;">
        <option value = "" selected = "selected">Choose test</option>
        <option value= "depression.php">Depression</option>
        <option value= "illness2.php">Illness2</option></select>

        <a href='register.php' class = "btn btn1"
        style = "text-decoration: none; margin-left: 50px; margin-right:50px;
        font-family: 'Tahoma', sans-serif; font-size: 14px;">Register page</a>
      </div>-->
        <div id="main" style = "margin:auto;">
            <?php
                if (isset($_SESSION['error']))
                { $errormsg = $_SESSION['error'];
                 unset($_SESSION['error']);
                 echo '<p <strong> $errormsg </strong><br/></p>';
                }
            ?>
            <br>
            <div class="navbar" style = "margin-top:-18px;">
              <a class="active" href="index.php">Home</a>
              <div class="dropdown">
                <button class="dropbtn">Tests
                </button>
                <div class="dropdown-content">
                  <a href="questionnaire.php">Depression</a>
                  <a href="#">Illness2</a></div></div>
                  <div class="dropdown">
                    <button class="dropbtn">Login
                    </button>
                    <div class="dropdown-content">
                      <a href="login.php">Login</a>
                      <a href="register.php">Register</a></div></div>
              <a href="pro.php"> Profile</a>
            </div>
            <!-- <div class = "table" style = "margin: auto; border-style: outset;
            width: 500px; height:150px; padding:30px;">-->
            <div id = "block_container" style = "margin-top: 50px;">
            <div id = "bloc1" class = "container" style = "margin-right: 10px; width: 600px;">
              <img src="overlay.png" alt="Avatar" class="image">
              <div class="overlay" style = "margin-top: 60px;">
                <h1 style = "margin-bottom:-20px; margin-left:0px;width: 95%;">About</h1>
                <div class = "table" style = "height:392px;">
                  <div>
                  <p>We provide questionnaires based on GWAS studies from UK Biobank.
                    By taking this questionnaires, which are about some of your
                    manifested traits (phenotype), you will get some insight about
                    whether you are likely to develop an illness (which is also a
                    trait, hence the name phenotype-to-phenotype).</p>
                    <img src="tacita.png" alt="Tea cup"
                       style="width: 120px; height: 100px; margin-left: 15%;"/>
                    <img src="flecha.gif" alt="Arrow"
                        style="width: 150px; height: 50px; margin-bottom: 20px;"/>
                    <img src="eye.png" alt="Depression"
                        style="width: 100px; height: 100px;"/>
                  <p>For example, there is a correlation between tea intake
                    and depression. This means that, if you drink a lot of tea,
                    you are more likely to have depression.</p>
              <p>Based on this and other traits, our website assesses
                whether you are likely or not to have depression or other conditions
                according to your answers, but keep in mind that there are more
                factors to take into account and a positive result does <b>not</b> mean
                that you will develop the illness.</p>
              </div>
              </div>
              </div>
            </div>
            <div id = "bloc2" class = "container" style = "margin-left: 10px; width: 600px;">
              <img src="overlay2.png" alt="Avatar" class="image">
              <div class="overlay" style = "margin-top: 60px;">
                <h1 style = "margin-bottom:-20px; margin-left:0px; width: 95%;">
                Why take our test</h1>
                <div class = "table" style = "height:392px;">
                  <div>
                  <p>As it has been previously stated, out test is about common
                  illnesses such as depression. You can only get an actual diagnosis
                of an illness if you already suffer the disease. Otherwise, you
              have to undergo genetic testing, which is usually slow. That's
            why we recommend you to take our tests. They consist only of 20
          questions, so they will only take a few minutes and you will get a result.</p>
          <p>Of course, the result will not be as accurate as genetic testing,
            but it has preventive value. Not only does it tell you whether you
            are at risk of developing the illness, but the questions in our test
            are related to some of the risk factor, so you might be able to replace
            some of your unhealthy habits by healthy ones.</p>
            <p>However, when analyzing your results, keep in mind that correlation
              does not imply causation: for example, if you stop drinking tea,
              you won't become less likely to develop depression.</p>
              <select autofocus name = "illness" onchange="location = this.value;" class = "btn btn1"; style = "text-decoration: none; margin-left: 35%;
              height: 56px; font-family: 'Tahoma', sans-serif; font-size: 14px;">
              <option value = "" selected = "selected">Choose test</option>
              <option value= "questionnaire.php">Depression</option>
              <option value= "illness2.php">Illness2</option></select>
              </div>
              </div>
              </div>
            </div>
            </div>
            <br>
            </div>
            <br>
            <div id = "block_container">
            <div id = "bloc1" class = "table" style = "margin-right: 10px; width: 500px;">
              <p><a href= "terms_privacy.php" target="_blank">Terms & Privacy</a></p></div>
            <div id = "bloc2" class = "table" style = "margin-left: 10px; width: 500px;">
              <p>Data from <a href= "https://www.ukbiobank.ac.uk/" target="_blank">
                UK Biobank</a> and cover images from <a href = "https://pixabay.com/" target="_blank">
                  Pixabay</a></p></div>
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
        <script>
        function on() {
          document.getElementById("overlayer").style.display = "block";
        }

        function off() {
          document.getElementById("overlayer").style.display = "none";
          var x = document.getElementsByClassName("typewriter");
          var i;
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
        }
      </script>
    </body>
    <footer>

    </footer>
</html>
