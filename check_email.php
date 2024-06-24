<?php
include("conn.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    $existing_email_query = "SELECT * FROM appointment1 WHERE email='$email'";
    $existing_email_result = $conn->query($existing_email_query);

    if ($existing_email_result->num_rows > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
} else {
    echo 'invalid_request';
}

?>
