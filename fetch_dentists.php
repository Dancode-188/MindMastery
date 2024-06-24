<?php
include "conn.php";
// Example query to fetch dentists (replace with your actual query)
$query = "SELECT id, name, working_hours FROM dentists";
$result = mysqli_query($conn, $query);

$dentists = array();

while ($row = mysqli_fetch_assoc($result)) {
    // Adjust the format of working hours as needed
    // Example: 'thur: 1:00pm - 6:00pm'
    $dentists[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'workingHours' => $row['working_hours']
    );
}

// Return dentists data as JSON
header('Content-Type: application/json');
echo json_encode($dentists);
?>
