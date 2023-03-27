<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="SignIn.css">
    <script src="../script.js"></script>
</head>
<body>

<?php
    session_start();

    $emailErr = $passwordErr = "";
    $email = $password = $showAlert = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../Register/connect.php';

        if(empty($_POST["email"])) {
            $emailErr = "* Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if(empty($_POST["password"])) {
            $passwordErr = "* Password is required";
        } else {
            $password = isset($_POST["password"]) ? test_input($_POST["password"]) : "";
        }

        $sql = "SELECT * FROM `users` WHERE `userEmail` = '$email'";
        $result = mysqli_query($conn , $sql);
        $num = mysqli_num_rows($result);

        if($num == 1) {
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE userEmail = '$email' AND userPassword = '$password'";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num == 1) {
                $row = mysqli_fetch_array($result);
                if(is_array($row)) {
                    $_SESSION['id'] = $row['userID'];
                    $_SESSION['name'] = $row['userName'];
                }
                $showAlert = "<h1>" . "Logged In Successfully" . "</h1>" . "userID is :" . $_SESSION['id'];
            }
            else {
                $showAlert = "<h1>" . "Wrong password entered" . "</h1>";
            }
        }
        else {
            $showAlert = "<h1>" . "User NOT exists" . "</h1>";
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_SESSION['id'])){
        header("Location: ../index.php");
    }
?>
    <header class="app__header">
        <div class="app__header-div">
            <img class="app__header-logo" src="../images/logo.png" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button type="button" onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" alt="" src="../images/menu.png" style="display: block;">
                <img id="cancel" class="app__header-img" src="../images/cancel.png" style="display: none;padding: 10px;width: 60px;height: 60px;" >
            </button>
                  <ul id="list" class="app__header-menu-list" style="display: none;">
                      <li class="app__header-menu-item">
                          <a href="../index.php">Home</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="../index.php">My Area</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="../index.php">Knowledge Base</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="../index.php">Community</a>
                      </li>
                    <li class="app__header-menu-item">
                          <a href="SignIn.php">Sign In</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="../Register/Register.php">Sign Up</a>
                      </li>
               
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item active" title="Home"><a href="../index.php">Home</a></li>
            <li class="app__header-list-item"><a href="../index.php">My Area</a></li>
            <li class="app__header-list-item"><a href="../index.php">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="../index.php">Community</a></li>
            <li class="app__header-list-item"><a href="SignIn.php">Sign In</a></li>
            <li class="app__header-list-item"><a href="../Register/Register.php" title="Sign Up">Sign Up</a></li>

            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>
    <div style="height: 1px;"></div>
    <div class="app__createAcc-line">
        <span>Home  /   SignIn</span>
        <div class="search-container">
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search articles">
                <input class="app__div1-button" type="image" src="../images/search.png" alt="search">
            </form>
        </div>
    </div>

    <div class="app__register-main">
        <div class="app__register-form">
            <h1>Already a member?</h1>
            <span>SignIn</span>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <input class="app__register-form-input" placeholder="Email Address" name = "email">
                <span style="color: #FF0000"><br><?php echo $emailErr ?></span>

                <input class="app__register-form-input" placeholder="Password" name = "password">
                <span style="color: #FF0000"><br><?php echo $passwordErr ?></span>

                <span style="color: #FF0000"><?php echo $showAlert ?></span>
                <input type="submit" value="submit" name="submit" class="signup_form_button"></input>
                <!-- <input class="signup_form_button" type="button" value="Sign In" name="submit"> -->
            </form>
        </div>

        <div class="app__register-list">
            <div class="app__register-list-item">
                <img src="../images/user.png" alt="User">
                <div>
                    <span>New User?</span>
                    <span style="color: #ff6600;">Sign Up</span>
                    <p>Create an account to submit tickets, read articles and engage in our community.</p>
                </div>
            </div>
            <div class="app__register-list-item">
                <img src="../images/lock.png" alt="Forgot Password">
                <div>
                    <span>Forgot Password?</span>
                    <span style="color: #ff6600;">Reset</span>
                
                    <p>We will send a password reset link to your email address.</p>
                </div>
            </div>
            <div class="app__register-list-item">
                <img src="../images/agent.png" alt="Agent">
                <div>
                    <span>Are you an Agent?</span>
                    <span style="color: #ff6600;">Login here</span>
                
                    <p>You will be taken to the agent interface.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="app__footer">
        <p class="app__footer-p">Still can't find an answer ?</p>
        <span class="app__footer-text">Send us a ticket and we will get back to you.</span>
        <button class="app__footer-button" type="submit" value="Submit">Submit a ticket</button>
    </footer>
</body>
</html>