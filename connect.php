<?php
$servername = "localhost"; // MySQL server ka address (local server hai to localhost)
$username = "root"; // Default MySQL username (often 'root')
$password = ""; // Default MySQL password (blank)
$database = "abdulhadi"; // Database ka naam jismein aapka table hai

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert data into table
function insertData($name, $email, $subject, $message, $conn) {
    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $subject = $conn->real_escape_string($subject);
    $message = $conn->real_escape_string($message);
    
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Example usage:
$name = $_POST['name']; // Assuming 'name' is the name attribute of the input field in your form
$email = $_POST['email']; // Assuming 'email' is the name attribute of the input field in your form
$subject = $_POST['subject']; // Assuming 'subject' is the name attribute of the input field in your form
$message = $_POST['message']; // Assuming 'message' is the name attribute of the input field in your form

insertData($name, $email, $subject, $message, $conn);

$conn->close();

?>
