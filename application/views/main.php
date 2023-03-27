<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Service Desk</title>
    <base href="<?php echo base_url() ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.30/angular-ui-router.js" 
            integrity="sha512-5J08Lq3B2EfuPrNSYckUPHKYHaUhCQ4MdeObdcR0YZnr8eapZ7XMA2ejUyQYpWN+fwO48wuxsL5KDZYIVVVxvg==" 
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="js/scripts.js"></script>
    <script src="js/script.js"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/showtickets.css">
    <link rel="stylesheet" href="css/AddTicket.css">
    <link rel="stylesheet" href="css/Register.css">
    <link rel="stylesheet" href="css/SignIn.css">
</head>
<body ng-app="myModule">

    <header class="app__header">
        <div class="app__header-div">
        <img class="app__header-logo" src="images/logo.png" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" src="images/menu.png" style="display: block;">
                <img id="cancel" class="app__header-img" src="images/cancel.png" style="display: none;padding: 10px;width: 60px;height: 60px;" >
            </button>
                  <ul id="list" class="app__header-menu-list" style="display: none;">
                      <li class="app__header-menu-item">
                          <a ui-sref="home">Home</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a ui-sref="showtickets">My Area</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a ui-sref="home">Knowledge Base</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a ui-sref="home">Community</a>
                      </li>
                        <li class="app__header-menu-item">
                        <a ui-sref="addticket">Add Ticket</a>
                        </li>
                        <li class="app__header-menu-item">
                        <a ui-sref='logout'>
                        Logout</a>
                        </li>
                  </ul>
          </div> 
                        <!-- <li class="app__header-menu-item">
                        <a href='<php echo base_url()."logout"; ?>'>Logout</a></li> -->
            
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item active" title="Home" ng-show="!isLoggedin"><a ui-sref="signin">Home</a></li>
            <li class="app__header-list-item active" title="Home" ng-show="isLoggedin"><a ui-sref="home">Home</a></li>
            
            <li class="app__header-list-item" ng-show="!isLoggedin"><a ui-sref="signin">My Area</a></li>
            <li class="app__header-list-item" ng-show="isLoggedin"><a ui-sref="showtickets">My Area</a></li>
            
            <li class="app__header-list-item" ng-show="!isLoggedin"><a ui-sref="signin">Knowledge Base</a></li>
            <li class="app__header-list-item" ng-show="isLoggedin"><a ui-sref="home">Knowledge Base</a></li>

            <li class="app__header-list-item" ng-show="!isLoggedin"><a ui-sref="signin">Community</a></li>
            <li class="app__header-list-item" ng-show="isLoggedin"><a ui-sref="home">Community</a></li>

            <li class="app__header-list-item" ng-show="!isLoggedin"><a ui-sref="signin">Signin</a></li>
            <li class="app__header-list-item" ng-show="!isLoggedin"><a ui-sref="register">Register</a></li>

            <li class='app__header-list-item' ng-show="isLoggedin"><a ui-sref="addTicket">Add Ticket</a></li>
            <li class='app__header-list-item' ng-show="isLoggedin"><a ui-sref='logout'>Logout</a></li>
            <!-- <li class='app__header-list-item' ng-hide="!isLoggedin"><a ui-sref='logout'>Logout</a></li> -->

            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>

    <ui-view></ui-view>
    
    <footer class="app__footer">
        <p class="app__footer-p">Still can't find an answer ?</p>
        <span class="app__footer-text">Send us a ticket and we will get back to you.</span>
        <button class="app__footer-button" type="submit" value="Submit">Submit a ticket</button>
    </footer>
</body>
</html>