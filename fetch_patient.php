<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

  
$doctor_query = "SELECT * FROM doctors";
$doctor_result = $conn->query($doctor_query);

    $query = "SELECT * FROM appointment1 WHERE patient_name = '$name' AND phone = '$phone'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $patientData = array(
            'exists' => true,
            'email' => $row['email'],
            'status' => $row['status'],
            'appointment_with' => $row['appointment_with'],
            'appointment_date' => $row['appointment_date'],
            'appointment_time' => $row['appointment_time'],
            'service' => $row['service'],
            'service_price' => $row['service_price'],
            'gender' => $row['gender'],
            'address' => $row['address'],
            'doctors' => $doctor_result->fetch_all(MYSQLI_ASSOC) 
        );
    } else {
        $patientData = array(
            'exists' => false,
            'doctors' => $doctor_result->fetch_all(MYSQLI_ASSOC) 
        );
    }

    echo json_encode($patientData);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $appointment_with_id = $_POST['doctorSelect']; 
    $doctor_query = "SELECT name FROM doctors WHERE id = '$appointment_with_id'";
    $doctor_result = $conn->query($doctor_query);
    if ($doctor_result && $doctor_result->num_rows > 0) {
        $doctor_row = $doctor_result->fetch_assoc();
        $appointment_with = $doctor_row['name']; 
    } else {
        $appointment_with = ''; 
    }
}
?>
