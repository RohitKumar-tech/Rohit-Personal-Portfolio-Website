<?php
    $FullName = $_POST['FullName'];
    $EmailAddress = $_POST['EmailAddress'];
    $Mobilenumber = $_POST['Mobilenumber'];
    $EmailSubject = $_POST['EmailSubject'];
    $YourMessage = $_POST['YourMessage'];

    // Database connection
    $conn = new mysqli('localhost', 'u115385445_root', 'o!:wRNK7E6', 'u115385445_Rohitt');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Prepare and bind the statement
        $stmt = $conn->prepare("INSERT INTO Contact(FullName, EmailAddress, Mobilenumber, EmailSubject, YourMessage,Date) VALUES (?, ?, ?, ?, ?,current_timestamp())");
        $stmt->bind_param("ssiss", $FullName, $EmailAddress, $Mobilenumber, $EmailSubject, $YourMessage);

        // Execute the statement
        $execval = $stmt->execute();

        // Check for errors
        if ($stmt->error) {
            die("Execute failed: " . $stmt->error);
        }

        // Making alert
        echo '<script>alert("Thanks")</script>'; 

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        include "index.html";
    }
?>
