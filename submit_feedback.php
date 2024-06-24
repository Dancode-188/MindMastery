<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>QosolBile dental clinic Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="main/feedback.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $opinion = $_POST['opinion'];
    $email = ""; 
   
    // Retrieve email from the appointment1 table
    $email_query = "SELECT email FROM appointment1 ORDER BY appointment_date DESC LIMIT 1";
    $email_result = $conn->query($email_query);

    if ($email_result->num_rows > 0) {
        $row = $email_result->fetch_assoc();
        $email = $row['email']; 
    } else {
        die("Error retrieving email: " . $conn->error);
    }

    // Check if the email already exists in the feedback table
    $existing_email_query = "SELECT email FROM feedback WHERE email = '$email'";
    $existing_email_result = $conn->query($existing_email_query);

    if ($existing_email_result) {
        // If the query was successful
        if ($existing_email_result->num_rows > 0) {
            // If the email exists, update the existing comment and rating
            $opinion = mysqli_real_escape_string($conn, $opinion); // Escape special characters
            $update_query = "UPDATE feedback SET opinion = '$opinion', rating = '$rating' WHERE email = '$email'";

            if ($conn->query($update_query) === TRUE) {
                echo "<script>Swal.fire('Feedback updated successfully!').then(() => { window.location.href = 'returningpatient.php'; });</script>";
            } else {
                echo "<script>Swal.fire('Error updating feedback: " . $conn->error . "');</script>";
            }
        } else {
            // If the email does not exist, insert a new feedback entry
            $opinion = mysqli_real_escape_string($conn, $opinion); // Escape special characters
            $insert_query = $conn->prepare("INSERT INTO feedback (email, rating, opinion) VALUES (?, ?, ?)");
            $insert_query->bind_param("sis", $email, $rating, $opinion);
            
            if ($insert_query->execute() === TRUE) {
                echo "<script>Swal.fire('Feedback submitted successfully!').then(() => { window.location.href = 'returningpatient.php'; });</script>";
            } else {
                echo "<script>Swal.fire('Error submitting feedback: " . $conn->error . "');</script>";
            }
        }
    } else {
        echo "<script>Swal.fire('Error checking existing email: " . $conn->error . "');</script>";
    }
        
} else {
    echo "<script>Swal.fire('Invalid request');</script>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</body>
</html>
