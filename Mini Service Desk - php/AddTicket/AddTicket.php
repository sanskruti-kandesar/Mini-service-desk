<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="AddTicket.css">
    <script src="../script.js"></script>
</head>
<body>
<?php

    $subject = $message = $category = "";
    $subErr = $msgErr = $alert = ""; 

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            include '../Register/connect.php';

             //                  VALIDATING DATA 
            $subject = test_input($_POST["subject"]);
            if(empty($subject)) {
                $subErr = "* Subject is required";
            }
            $message = test_input($_POST["message"]);
            if(empty($message)) {
                $msgErr = "* Message is required";
            }

            $category = test_input($_POST["category"]);

            //                  FILE UPLOAD

            if(isset($_FILES['attachment'])) {
                $file = $_FILES['attachment'];
                $userID = $_SESSION['id'];
                
                $file_name = pathinfo($file['name'], PATHINFO_FILENAME);
                $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = $file_name . "_" .  round(microtime(true) * 1000) . "." .  $file_extension;
                $upload = '../uploads/' . $userID . '/';
                $filepath = $upload . $filename;
                
                if(!is_dir($upload)){
                    mkdir($upload);
                }
                
                move_uploaded_file($file['tmp_name'], $filepath);
            }

            //              INSERT DATA INTO DATABASE

            if(!empty($subject) && !empty($message)) {
                $sql = "INSERT INTO tickets (ticketSubject, ticketMessage, category, userID, ticketStatus, imagePath)
                        VALUES ('$subject', '$message', '$category', {$_SESSION['id']} , 'sent', '$filepath')";
                $result = mysqli_query($conn , $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    header("Location: ../showTickets/showTickets.php");
                } else {
                    $alert = "<h1>Couldn't add ticket</h1>";
                }
            }

        }
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(!isset($_SESSION['id'])){
    header("Location: ../SignIn/SignIn.php");
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
                        <a href="AddTicket.php">Add Ticket</a>
                        </li>
                        <li class="app__header-menu-item">
                        <a href="./SignIn/Logout.php">Log out</a>
                        </li>
                    
                      </li>
                  </ul>
          </div> 
        
        <ul id="menu-list" class="app__header-list">
            <li class="app__header-list-item" title="Home"><a href="../index.php">Home</a></li>
            <li class="app__header-list-item"><a href="../index.php">My Area</a></li>
            <li class="app__header-list-item"><a href="../index.php">Knowledge Base</a></li>
            <li class="app__header-list-item"><a href="../index.php">Community</a></li>
            <li class='app__header-list-item active'><a href='AddTicket.php'>Add Ticket</a></li>
            <li class='app__header-list-item'><a href='./SignIn/Logout.php.php'>Log out</a></li>
            <li class="app__header-list-item">A<sup><small>+</small></sup></li>
        </ul>
    </header>

    <div style="height: 1px;"></div>
    <div class="app__createAcc-line">
        <span>MyArea / Submit a Tickets</span>
        <div class="search-container">
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search articles">
                <input class="app__div1-button" type="image" src="../images/search.png" alt="search">
            </form>
        </div>
    </div>
    <div class="addticket-main">
        <div class="submit_ticket-form">
            <h1>Submit a ticket</h1>
            <p>Ticket Information</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">

                <label for="subject">Subject</lable><br>
                <input type="text" name="subject" class="submit_ticket-form-sub">
                <span style="color: #FF0000"><br><?php echo $subErr ?></span>
                <br>

                <label for="message">Message</lable><br>
                <textarea name="message"></textarea>
                <span style="color: #FF0000"><br><?php echo $msgErr ?></span>
                <br>

                <label for="category">Issue Type</lable><br>
                <select name="category">
                    <option>Manage Account</option>
                    <option>Privacy</option>
                    <option>Report</option>
                    <option>Terms and Policies</option>
                    <option>Others</option>
                </select><br>

                <label for="attachment">Attach file</label><br>
                <input type="file" name="attachment" class="submit_ticket-form-file"><br><br>

                <span style="color: #FF0000"><?php echo $alert ?></span>
                <input type="submit" value="submit" name="submit">
                <input type="reset" value="Discard" name="reset">
            </form>
        </div>
        <div class="app__section-div3">
                <h2 class="div3-h2">Popular Articles</h3><hr>

                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="../images/article.png" alt="">
                        <p class="article-text">How to add ticket ?</p>
                    </div>
                    <br>
                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="../images/article.png" alt="">
                        <p class="article-text">How to add members ?</p>
                    </div>
                    <br>
                    <div style="display: flex;flex-direction: row;align-items: center;">
                        <img class="article-img" src="../images/article.png" alt="">
                        <p class="article-text">How to see ticket status ?</p>
                    </div>
        </div>
    </div>

</body>
</html>