<?php

    $conn = new mysqli('localhost', 'root', '', 'mood_playlist');

    if($conn->connect_error) {
        die('Connection failed : ' . $conn->connect_error);
    }

    $subscriber_email = $conn->real_escape_string($_POST['email']);

    $sql = "INSERT INTO subscribers (email) VALUES ('$subscriber_email')";
    if($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>You have been successfully added to our <span class='color-variant'>special waitlist</span>. Look out for updates</p>";
    } else {
        if($conn->errno === 1062) {
            echo "duplicate-err";
        } else {
            echo "other-err";
        }
    }
    
    $conn->close();
?>