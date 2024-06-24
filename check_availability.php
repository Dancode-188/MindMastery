<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dentistId = $_POST['dentistId'];
    $appointmentDate = $_POST['appointmentDate'];
    $workingHours = json_decode($_POST['workingHours'], true);

    // Query to check existing appointments for the selected dentist and date
    $existingAppointmentsQuery = "SELECT appointment_time FROM appointment1 WHERE dentist_id='$dentistId' AND appointment_date='$appointmentDate'";
    $existingAppointmentsResult = $conn->query($existingAppointmentsQuery);

    $bookedTimes = [];

    if ($existingAppointmentsResult->num_rows > 0) {
        while ($row = $existingAppointmentsResult->fetch_assoc()) {
            $bookedTimes[] = $row['appointment_time'];
        }
    }

    // Define the available time slots based on the dentist's working hours for the selected day
    $availableTimeSlots = [];
    $startHour = 0; // Example start hour
    $endHour = 23; // Example end hour

    for ($hour = $startHour; $hour <= $endHour; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 30) {
            $time = sprintf('%02d:%02d', $hour, $minute);
            $isBooked = in_array($time, $bookedTimes);
            if (isWorkingHour($time, $workingHours, $appointmentDate)) {
                $availableTimeSlots[] = [
                    'time' => $time,
                    'booked' => $isBooked
                ];
            }
        }
    }

    // Return JSON response of available time slots
    echo json_encode($availableTimeSlots);
}

// Helper function to check if a given time falls within the working hours for the selected date
function isWorkingHour($timeString, $workingHours, $appointmentDate) {
    $hours = intval(substr($timeString, 0, 2));
    $minutes = intval(substr($timeString, 3, 2));
    $dayOfWeek = date('N', strtotime($appointmentDate)) - 1; // Adjust to get day index (0 = Sunday, 1 = Monday, ...)

    $workingTimes = $workingHours[$dayOfWeek];

    if (!$workingTimes) {
        return false; // No working hours defined for the selected day
    }

    $startTime = strtotime($workingTimes['start_time']);
    $endTime = strtotime($workingTimes['end_time']);
    $currentTime = strtotime($timeString);

    return ($currentTime >= $startTime && $currentTime <= $endTime);
}
?>
