<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="showTickets.css">
    <script src="../script.js"></script>
    <style>
    </style>
</head>
<body>
<?php
    include '../Register/connect.php';
    if(!isset($_SESSION['id'])){
        header("Location: ../SignIn/SignIn.php");
    }
    $sql = "SELECT ticketMessage, ticketSubject, dateCreated, category FROM tickets WHERE userID = {$_SESSION['id']} ORDER BY dateCreated DESC";
    $result = mysqli_query($conn, $sql);

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
                        <li class="app__header-menu-item active">
                        <a href="../AddTicket/AddTicket.php">Add Ticket</a>
                        </li>
                        <li class="app__header-menu-item">
                        <a href="../SignIn/Logout.php">Log out</a>
                        </li>
                    
                      </li>
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item" title="Home"><a href="../index.php">Home</a></li>
            <li class="app__header-list-item"><a href="../index.php">My Area</a></li>
            <li class="app__header-list-item"><a href="../index.php">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="../index.php">Community</a></li>
            <li class='app__header-list-item active'><a href='../AddTicket/AddTicket.php'>Add Ticket</a></li>
            <li class='app__header-list-item'><a href='./SignIn/Logout.php.php'>Log out</a></li>
            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>

    <div style="height: 1px;"></div>

    <div class="app__showTicket-main">
        <div class="app__showTicket-table" >
            <?php 
                $ticket_count = 1;
                while($row = mysqli_fetch_array($result)) {
                    echo "Ticket : " . $ticket_count;
                    echo '<div class="app__showTicket-ticket">' .
                    '<h2>' . $row['ticketSubject'] . '</h2>
                    <p>' . $row['ticketMessage'] . '</p>' .
                    '<span> issue type : ' . $row['category'] . '</span><br><br>' .
                    '<span>' . $row['dateCreated'] . '</span> <hr>' .
                    '</div>';
                    $ticket_count++;
                }
            ?>
        </div>
    </div>

</body>
</html>