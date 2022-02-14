<?php

session_start();
include_once "db_conn.php";

$message = $_POST['message'];

//Database Connection
$conn = new mysqli('localhost', 'root', '', 'sendmessage');
if($conn->$connection_error){
  die('Connection Failed : '.$conn->connect_error);
}else{
  $stmt = $conn->prepare("insert into messageuser(message)
                        values(?)");
  $stmt->bind_param($message);
  $stmt->execute();
  echo "Mesazhi juaj u dergua me suksese...";
  $stmt->close();
  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Feedbacks</title>

    <link rel="stylesheet" href="style.css" />

  </head>
  <body>

          <form action="" method="post" autocomplete="off">
            <h3 class="title">"Jepni një mendim për faqen tonë"</h3>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="message">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
          </form>

  </body>
</html>