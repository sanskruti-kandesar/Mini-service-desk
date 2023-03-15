<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Service Desk</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>" type="text/css" media="all">
    <script src="<?php echo base_url('js/script.js')?>"></script>
</head>
<body>
<?php 
?>
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
                        <li class="app__header-menu-item">
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
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item active" title="Home"><a href="<?php base_url()?>">Home</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url('showtickets') ?>">My Area</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url()?>">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="<?php echo base_url()?>">Community</a></li>
        
            <li class='app__header-list-item'><a href="<?php echo base_url('addticket') ?>">Add Ticket</a></li>
            <li class='app__header-list-item'><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>