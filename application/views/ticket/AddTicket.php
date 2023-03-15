<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <base href="<php echo base_url('/index.php/a/')?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('css/AddTicket.css')?>" type="text/css" media="all">
    <script src="<?php echo base_url('js/script.js')?>"></script>
</head>
<body>

    <header class="app__header">
        <div class="app__header-div">
        <img class="app__header-logo" src="<?php echo base_url('images/logo.png')?>" alt="logo" />
            <h1 class="app__header-h1">Almashines</h1>
        </div>

        <div class="app__header-menu">
            <button onclick="openMenu()" style="background-color: transparent; border: none;">
                <img id="menu" class="app__header-img" src="<?php echo base_url('images/menu.png') ?>" style="display: block;">
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
                        <li class="app__header-menu-item active">
                        <a href="<?php echo base_url('addticket') ?>">Add Ticket</a>
                        </li>
                        <li class="app__header-menu-item">
                        <a href='
                        <?php 
                        echo base_url()."logout"; 
                        ?>
                        '>
                        Logout</a>  
                        </li>
                    
                      </li>
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item" title="Home"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url('showtickets')?>">My Area</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url() ?>">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url() ?>">Community</a></li>
            <li class='app__header-list-item active'><a href='<?php echo base_url('addticket') ?>'>Add Ticket</a></li>
            <li class='app__header-list-item'><a href='<?php echo base_url()."logout"; ?>'>Logout</a> </li>
            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>

    <div style="height: 1px;"></div>
    <div class="app__createAcc-line">
        <span>MyArea / Submit a Tickets</span>
        <div class="search-container">
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search articles">
                <input class="app__div1-button" type="image" src="<?php echo base_url('images/search.png') ?>" alt="search">
            </form>
        </div>
    </div>
    <div class="addticket-main">
        <div class="submit_ticket-form">
            <h1>Submit a ticket</h1>
            <p>Ticket Information</p>
        
            <?php echo form_open_multipart('addticket');?>

                <label for="subject">Subject</lable><br>
                <input type="text" name="subject" class="submit_ticket-form-sub">
                <span style="color: #FF0000"><?php echo form_error('subject'); ?></span><br>
                <br>

                <label for="message">Message</lable><br>
                <textarea name="message"></textarea>
                <span style="color: #FF0000"><?php echo form_error('message'); ?></span><br>
                <br>

                <label for="category">Issue Type</lable><br>
                <select name="category">
                    <option value="Manage Account" <?php echo set_select('category', 'manage account', TRUE); ?>>Manage Account</option>
                    <option value="Privacy" <?php echo set_select('category', 'Privacy'); ?>>Privacy</option>
                    <option value="Report" <?php echo set_select('category', 'Report'); ?>>Report</option>
                    <option value="Terms and Policies" <?php echo set_select('category', 'Terms and Policies'); ?>>Terms and Policies</option>
                    <option value="Others" <?php echo set_select('category', 'Others'); ?>>Others</option>
                </select><br>

                <label for="attachment">Attach file</label><br>
                <input type="file" name="attachment" class="submit_ticket-form-file"><br><br>

                <input type="submit" value="submit" name="submit">
                <input type="reset" value="Discard" name="reset">
            </form>
        </div>
        <div class="app__section-div3">
                <h2 class="div3-h2">Popular Articles</h3><hr>

                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                        <p class="article-text">How to add ticket ?</p>
                    </div>
                    <br>
                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                        <p class="article-text">How to add members ?</p>
                    </div>
                    <br>
                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                        <p class="article-text">How to see ticket status ?</p>
                    </div>
        </div>
    </div>

</body>
</html>