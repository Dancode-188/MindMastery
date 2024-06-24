<?php
include("conn.php");

$service_query = "SELECT DISTINCT service_name FROM services";
$service_result = $conn->query($service_query);

$doctor_query = "SELECT * FROM dentists";
$doctor_result = $conn->query($doctor_query);

$email_error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $disease = $_POST['serviceSelect'];
    $dentist_id = $_POST['doctorSelect'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $status = "Pending";

    $dentist_query = "SELECT name FROM dentists WHERE id='$dentist_id'";
    $dentist_result = $conn->query($dentist_query);
    if ($dentist_result->num_rows > 0) {
        $dentist_row = $dentist_result->fetch_assoc();
        $dentist_name = $dentist_row['name'];
    } else {
        $dentist_name = "Unknown";
    }

    // Check if the combination of name, phone, and email already exists in the database
    $existing_query = "SELECT * FROM appointment1 WHERE phone='$phone' AND email='$email' AND patient_name='$name'";
    $existing_result = $conn->query($existing_query);

    if ($existing_result->num_rows > 0) {
        echo "same_row_data";
    } else {
        // Check if the phone number already exists in the database
        $existing_phone_query = "SELECT * FROM appointment1 WHERE phone='$phone'";
        $existing_phone_result = $conn->query($existing_phone_query);

        if ($existing_phone_result->num_rows > 0) {
            echo "phone_already";
        } else {
            // Check if the email already exists in the database
            $existing_email_query = "SELECT * FROM appointment1 WHERE email='$email'";
            $existing_email_result = $conn->query($existing_email_query);

            if ($existing_email_result->num_rows > 0) {
                echo "email_already";
            } else {
                // Insert the new appointment into the database
                $insert_query = "INSERT INTO appointment1 (service, service_price, appointment_with, appointment_date, appointment_time, patient_name, gender, phone, email, address, status) 
                                 VALUES ('$disease', (SELECT price FROM services WHERE service_name = '$disease'), '$dentist_name', '$appointmentDate', '$appointmentTime', '$name', '$gender', '$phone', '$email', '$address', '$status')";
                if ($conn->query($insert_query) === TRUE) {
                    // Build data array
                    $data = [
                        'disease' => $disease,
                        'dentist_name' => $dentist_name,
                        'appointmentDate' => $appointmentDate,
                        'appointmentTime' => $appointmentTime
                    ];
                    // Encode data as JSON and echo
                    echo json_encode($data);
                } else {
                    echo "error";
                }
            }
        }
    }
}
?>
