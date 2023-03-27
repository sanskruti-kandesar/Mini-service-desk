<?php session_start(); ?>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Register.css">
    <script src="Register.js"></script>
</head>
<body>

<?php
    // define empty variables
    $nameErr = $emailErr = $passwordErr = $confirmErr = $showAlert = "";
    $name = $email = $password = $confirmPassword = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'connect.php';

        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }

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

        if(empty($_POST["confirmPassword"])){
            $confirmErr = "* Confirm Password is required";
        } else {
            $confirmPassword = isset($_POST["confirmPassword"]) ? test_input($_POST["confirmPassword"]) : "";
            if($password != $confirmPassword){
                $confirmErr = "passwords do not match";
            }
        }

        // check if user is already a user
        $sql = "SELECT * FROM users WHERE userEmail = '$email'";
        // store result in a variable
        $result = mysqli_query($conn , $sql);
        // count number of rows of result
        $num = mysqli_num_rows($result);

        if($num == 0) {

            // password hashing
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $password = md5($password);
            $sql = "INSERT INTO `users` (`userName`,`userEmail`,`userPassword`, `PhoneNo`) 
                    VALUES ('$name', '$email', '$password', 000)";
            $result = mysqli_query($conn, $sql);
        }
        else if($num > 0) {
            $showAlert = "<h1>" . "User alreay exists" . "</h1>";
        }
        if(!isset($_SESSION['id'])){
            header("Location: ../index.php");
        }
    }

    function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
?>

    <header class="app__header">
        <div class="app__header-div">
            <img class="app__header-logo" src="../images/logo.png" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" src="../images/menu.png" style="display: block;">
                <img id="cancel" class="app__header-img" src="../images/cancel.png" style="display: none;padding: 10px;width: 60px;height: 60px;" >
            </button>
                  <ul id="list" class="app__header-menu-list" style="display: none;">
                      <li class="app__header-menu-item">
                          <a href="./index.php">Home</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="./about.html">My Area</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="./contact.html">Knowledge Base</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="./contact.html">Community</a>
                      </li>
                    <li class="app__header-menu-item">
                          <a href="./SignIn/SignIn.php">Sign In</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="./Register/Register.php">Sign Up</a>
                      </li>
                    
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item" title="Home"><a href="../index.php">Home</a></li>
            <li class="app__header-list-item"><a href="../index.php">My Area</a></li>
            <li class="app__header-list-item"><a href="../index.php">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="../index.php">Community</a></li>
            <li class="app__header-list-item"><a href="../SignIn/SignIn.php">Sign In</a></li>
            <li class="app__header-list-item"><a href="Register.php" title="Sign Up">Sign Up</a></li>
            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>
    <div style="height: 1px;"></div>
    <div class="app__createAcc-line">
        <span>Create Account</span>
        <div class="search-container">
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search articles">
                <input class="app__div1-button" type="image" src="../images/search.png" alt="search">
            </form>
        </div>
    </div>

    <div class="app__register-main">

        <div class="app__register-form">
            <h1>Sign Up</h1>
            <span>Create an account to submit tickets, read articles and engage in out community.</span>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <input class="app__register-form-input" type="text" placeholder="Name" name="name">
                <span style="color: #FF0000"><br><?php echo $nameErr ?></span>
                
                <input class="app__register-form-input" type="text" placeholder="Email" name="email">
                <span style="color: #FF0000"><br><?php echo $emailErr ?></span>
                
                <input class="app__register-form-input" type="password" placeholder="Password" name="password">
                <span style="color: #FF0000"><br><?php echo $passwordErr ?></span>

                <input class="app__register-form-input" type="password" placeholder="Confirm Password" name="confirmPassword">
                <span style="color: #FF0000"><br><?php echo $confirmErr ?></span>

                <span style="color: #FF0000"><?php echo $showAlert ?></span>
                <input type="submit" value="submit" name="submit" class="signup_form_button"></input>
            </form>

        </div>
        <div class="app__register-list">
            <div class="app__register-list-item">
                <img src="../images/user.png">
                
                <div>
                    <span>Already a member?</span>
                    <span style="color: #ff6600;">Sign In</span>
                
                    <p>To submit tickets, browse through articles and participate in the community.</p>
                </div>
            </div>
            
            <div class="app__register-list-item">
                <img src="../images/agent.png">
                <div>
                    <span>Are you an Agent?</span>
                    <span style="color: #ff6600";">Login here</span>
                
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