<?php

    $conn = new mysqli('localhost', 'root', '', 'mood_playlist');

    if($conn->connect_error) {
        die('Connection failed : ' . $conn->connect_error);
    }

    $subscriber_email = $conn->real_escape_string($_POST['email']);

    $sql = "INSERT INTO subscribers (email) VALUES ('$subscriber_email')";
    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>