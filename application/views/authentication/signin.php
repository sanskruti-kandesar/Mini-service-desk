<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('css/SignIn.css')?>" type="text/css" media="all">
    <script src="<?php echo base_url('js/script.js')?>"></script>
</head>
<body>

    <header class="app__header">
        <div class="app__header-div">
            <img class="app__header-logo" src="<?php echo base_url('images/logo.png')?>" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button type="button" onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" alt="" src="<?php echo base_url('images/menu.png')?>" style="display: block;">
                <img id="cancel" class="app__header-img" src="<?php echo base_url('images/cancel.png') ?>" style="display: none;padding: 10px;width: 60px;height: 60px;" >
            </button>
                  <ul id="list" class="app__header-menu-list" style="display: none;">
                      <li class="app__header-menu-item">
                          <a href="<?php echo base_url() ?>">Home</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="<?php echo base_url('showtickets') ?>">My Area</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="<?php echo base_url() ?>">Knowledge Base</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="<?php echo base_url() ?>">Community</a>
                      </li>
                    <li class="app__header-menu-item">
                          <a href="<?php echo base_url('signin') ?>">Sign In</a>
                      </li>
                      <li class="app__header-menu-item">
                          <a href="<?php echo base_url('register') ?>">Sign Up</a>
                      </li>
               
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item active" title="Home"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url('showtickets')?>">My Area</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url() ?>">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url() ?>">Community</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url('signin') ?>">Sign In</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url('register') ?>" title="Sign Up">Sign Up</a></li>

            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>
    <div style="height: 1px;"></div>
    <div class="app__createAcc-line">
        <span>Home  /   SignIn</span>
        <div class="search-container">
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search articles">
                <input class="app__div1-button" type="image" src="<?php echo base_url('images/search.png') ?>" alt="search">
            </form>
        </div>
    </div>

    <div class="app__register-main">
        <div class="app__register-form">
            <h1>Already a member?</h1>
            <span>SignIn</span>
            <?php echo form_open('signin'); ?>

                <input class="app__register-form-input" placeholder="Email Address" name = "email">
                <span style="color: #FF0000"><?php echo form_error('email'); ?></span><br>

                <input class="app__register-form-input" placeholder="Password" name = "password">
                <span style="color: #FF0000"><?php echo form_error('password'); ?></span><br>

                <input type="submit" value="signin" name="submit" class="signup_form_button"></input>
            </form>
        </div>

        <div class="app__register-list">
            <div class="app__register-list-item">
                <img src="<?php echo base_url('images/user.png') ?>" alt="User">
                <div>
                    <span>New User?</span>
                    <span style="color: #ff6600;">Sign Up</span>
                    <p>Create an account to submit tickets, read articles and engage in our community.</p>
                </div>
            </div>
            <div class="app__register-list-item">
                <img src="<?php echo base_url('images/lock.png') ?>" alt="Forgot Password">
                <div>
                    <span>Forgot Password?</span>
                    <span style="color: #ff6600;">Reset</span>
                
                    <p>We will send a password reset link to your email address.</p>
                </div>
            </div>
            <div class="app__register-list-item">
                <img src="<?php echo base_url('images/agent.png') ?>" alt="Agent">
                <div>
                    <span>Are you an Agent?</span>
                    <span style="color: #ff6600;">Login here</span>
                
                    <p>You will be taken to the agent interface.</p>
                </div>
            </div>
        </div>
    </div>