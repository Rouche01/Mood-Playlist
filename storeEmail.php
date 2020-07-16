<?php
    $hostname = "us-cdbr-east-02.cleardb.com";
    $username = "b6c1bc3da7071e";
    $database = "heroku_cfce7cd27f0af17";
    $password = "3660ab13";

    $conn = new mysqli($hostname, $username, $password, $database);

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
            echo $conn->connect_error;
        }
    }
    
    $conn->close();
?>