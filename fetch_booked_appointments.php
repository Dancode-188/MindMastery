<?php
// Include your database connection file
include("conn.php");

// Check if dentistId and appointmentDate are set and not empty
if (isset($_POST['dentistId']) && isset($_POST['appointmentDate'])) {
    $dentistId = $_POST['dentistId'];
    $appointmentDate = $_POST['appointmentDate'];

    // SQL query to fetch booked appointment times
    $query = "SELECT appointment_time FROM appointment1 WHERE dentist_id='$dentistId' AND appointment_date='$appointmentDate'";
    $result = $conn->query($query);

    // Array to store booked times
    $bookedTimes = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookedTimes[] = $row['appointment_time'];
        }
    }

    // Encode booked times array as JSON and echo it
    echo json_encode($bookedTimes);
} else {
    // Handle error if dentistId or appointmentDate is not set
    echo json_encode([]);
}
?>
