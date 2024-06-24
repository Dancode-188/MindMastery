<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];

    // Determine day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
    $dayOfWeek = date('N', strtotime($appointmentDate)) - 1;

    // Query to fetch dentists who are available on the selected day and time
    $availableDentistsQuery = "SELECT id, name, working_hours FROM dentists WHERE JSON_EXTRACT(working_hours, CONCAT('$[', '$dayOfWeek', ']')) IS NOT NULL";
    $availableDentistsResult = $conn->query($availableDentistsQuery);

    $availableDentists = [];

    if ($availableDentistsResult->num_rows > 0) {
        while ($row = $availableDentistsResult->fetch_assoc()) {
            $workingHours = json_decode($row['working_hours'], true)[$dayOfWeek];
            if (isWorkingHour($appointmentTime, $workingHours)) {
                $availableDentists[] = [
                    'id' => $row['id'],
                    'name' => $row['name']
                ];
            }
        }
    }

    // Return JSON response of available dentists
    echo json_encode($availableDentists);
}

// Helper function to check if a given time falls within the dentist's working hours for the selected day
function isWorkingHour($timeString, $workingHours) {
    $hours = intval(substr($timeString, 0, 2));
    $minutes = intval(substr($timeString, 3, 2));

    $startTime = strtotime($workingHours['start_time']);
    $endTime = strtotime($workingHours['end_time']);
    $currentTime = strtotime($timeString);

    return ($currentTime >= $startTime && $currentTime <= $endTime);
}
?>
