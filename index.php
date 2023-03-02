<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Service Desk</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<?php if(!isset($_SESSION['id'])){
    header("Location: SignIn/SignIn.php");
}
?>
    <header class="app__header">
        <div class="app__header-div">
            <img class="app__header-logo" src="./images/logo.png" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" src="./images/menu.png" style="display: block;">
                <img id="cancel" class="app__header-img" src="./images/cancel.png" style="display: none;padding: 10px;width: 60px;height: 60px;" >
            </button>
                  <ul id="list" class="app__header-menu-list" style="display: none;">
                      <li class="app__header-menu-item">
                          <a href="index.php">Home</a>
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
                <?php
                    if(isset($_SESSION['id'])){
                        echo '<li class="app__header-menu-item">
                        <a href="./SignIn">Add Ticket</a>
                        </li>
                        <li class="app__header-menu-item">
                        <a href="./SignIn/Logout.php">Log out</a>
                        </li>';
                    }
                    
                    else { echo '<li class="app__header-menu-item">
                          <a href="./SignIn/SignIn.php">Sign In</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="./Register/Register.php">Sign Up</a>
                      </li>';
                    }
                ?>
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item active" title="Home"><a href="index.php">Home</a></li>
            <li class="app__header-list-item"><a href="index.php">My Area</a></li>
            <li class="app__header-list-item"><a href="index.php">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="index.php">Community</a></li>
    <?php
        if(isset($_SESSION['id'])){
            echo "<li class='app__header-list-item'><a href='./AddTicket/AddTicket.php'>Add Ticket</a></li>";
            echo "<li class='app__header-list-item'><a href='./SignIn/Logout.php'>Log out</a></li>";
        }
        else {
            echo '<li class="app__header-list-item"><a href="./SignIn/SignIn.php">Sign In</a></li>';
            echo '<li class="app__header-list-item"><a href="./Register/Register.php" title="Sign Up">Sign Up</a></li>';
        }
    ?>

            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>

    <section class="app__section">

        <div class="app__section-div1">
            <h1 class="app__div1-h1">Welcome to Almashines</h1>
            <p class="app__div1-p">Search, ask and submit a ticket.</p>
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search">
                <input class="app__div1-button" type="image" src="./images/search.png" alt="search">
            </form>
        </div>

        <div class="app__section-div2">
            <div class="div2-support">
                <img class="support-img" src="./images/support1.png" alt="">
                <p class="support-text">Support</p>
            </div>
            <div class="div2-support">
                <img class="support-img" src="./images/support2.png" alt="">
                <p class="support-text">Talk to us</p>
            </div>
            <div class="div2-support">
                <img class="support-img" src="./images/support3.png" alt="">
                <p class="support-text">help</p>
            </div>
        </div>

        <div class="app__section-div3">
            <h2 class="div3-h2">Popular Articles</h3>

                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="./images/article.png" alt="">
                    <p class="article-text">How to add ticket ?</p>
                </div>
                <br>
                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="./images/article.png" alt="">
                    <p class="article-text">How to add members ?</p>
                </div>
                <br>
                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="./images/article.png" alt="">
                    <p class="article-text">How to see ticket status ?</p>
                </div>
        </div>
    </section>

    <footer class="app__footer">
        <p class="app__footer-p">Still can't find an answer ?</p>
        <span class="app__footer-text">Send us a ticket and we will get back to you.</span>
        <button class="app__footer-button" type="submit" value="Submit">Submit a ticket</button>
    </footer>
</body>
</html>