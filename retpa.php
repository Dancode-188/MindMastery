<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>QosolBile dental clinic Appointment</title>
    <link rel="stylesheet" href="main/feedback.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  
<?php
include "conn.php";

$service_query = "SELECT DISTINCT service_name FROM services";
$service_result = $conn->query($service_query);

$doctor_query = "SELECT * FROM dentists";
$doctor_result = $conn->query($doctor_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the cancel button was clicked
    if(isset($_POST['cancelAppointment'])) {
        $phone = $_POST['phone'];

        $check_pending_query = "SELECT * FROM appointment1 WHERE phone = '$phone' AND status = 'Pending'";
        $check_pending_result = $conn->query($check_pending_query);
        
        if ($check_pending_result->num_rows > 0) {
            // If the appointment is pending, cancel it
            $cancel_query = "UPDATE appointment1 SET status = 'Canceled' WHERE phone = '$phone' AND status = 'Pending'";
            if ($conn->query($cancel_query) === TRUE) {
                echo "<script>
                        Swal.fire({
                            title: 'Appointment Canceled',
                            text: 'Your pending appointment has been canceled successfully.',
                            icon: 'success'
                        }).then(() => { window.location.href = 'returningpatient.php'; });
                     </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an error canceling your appointment. Please try again later.',
                            icon: 'error'
                        });
                     </script>";
            }
        } else {
            // If there's no pending appointment, notify the user
            echo "<script>
                    Swal.fire({
                        title: 'No Pending Appointment',
                        text: 'You don\'t have any pending appointments to cancel.',
                        icon: 'info'
                    });
                 </script>";
        }
    
    } else { 
        $service = $_POST['serviceSelect'];
        $service_price = $_POST['serviceCostHidden'];
        $dentist_id = $_POST['doctorSelect1']; // Change to dentist_id
        $appointment_date = $_POST['appointmentDate'];
        $appointment_time = $_POST['appointmentTime'];
        $patient_name = $_POST['patientName'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $status = 'pending';
        
        // Fetch doctor's name based on ID
        $dentist_query = "SELECT name FROM dentists WHERE name='$dentist_id'";
        $dentist_result = $conn->query($dentist_query);
        if ($dentist_result->num_rows > 0) {
            $dentist_row = $dentist_result->fetch_assoc();
            $appointment_with = $dentist_row['name'];
        } else {
            $appointment_with = "Unknown"; 
        }

        // Check if the patient exists
        $existing_patient_query = "SELECT * FROM appointment1 WHERE phone = '$phone'";
        $existing_patient_result = $conn->query($existing_patient_query);

        if ($existing_patient_result && $existing_patient_result->num_rows > 0) {
            $existing_patient_row = $existing_patient_result->fetch_assoc();
            if ($existing_patient_row['status'] == 'Confirmed' || $existing_patient_row['status'] == 'Canceled') {
                // Update existing appointment
                $update_query = "UPDATE appointment1 
                                 SET service = '$service', service_price = '$service_price', appointment_with = '$dentist_id', 
                                     appointment_date = '$appointment_date', appointment_time = '$appointment_time', patient_name = '$patient_name', 
                                     gender = '$gender', email = '$email', address = '$address', status = '$status'
                                 WHERE phone = '$phone'";
            
                // if ($conn->query($update_query) === TRUE) {
                //     $service = $service;
                //     $appointment_with = $appointment_with;
                //     $appointment_date = $appointment_date;
                //     $appointment_time = $appointment_time;
            
                //     echo "<script>
                //     Swal.fire({
                //             title: 'Appointment Booked Successfully!',
                //         html: 'Your appointment for <strong>$service</strong> with <strong>$appointment_with</strong> on <strong>$appointment_date</strong> at <strong>$appointment_time</strong> has been Booked successfully.',
                //         icon: 'success'
                //     }).then(() => { bookAppointment(); }); 
                // </script>";
                if ($conn->query($update_query) === TRUE) {
                    $service = $service;
                    $appointment_with = $appointment_with;
                    $appointment_date = $appointment_date;
                    $appointment_time = $appointment_time;
                
                    echo "<script>
                        Swal.fire({
                            title: 'Appointment Booked Successfully!',
                            html: 'Your appointment for <strong>$service</strong> with <strong>$appointment_with</strong> on <strong>$appointment_date</strong> at <strong>$appointment_time</strong> has been Booked successfully.',
                            icon: 'success'
                        }).then((result) => { 
                            if (result.isConfirmed) {
                                bookAppointment(); 
                            }
                        }); 
                    </script>";
                
                
                } else {
                    echo "<script>Swal.fire('Error: " . $conn->error . "');</script>";
                }
            } else if ($existing_patient_row['status'] == 'Pending') {
                echo "<script>
                    Swal.fire({
                        title: 'Please wait for booking confirmation',
                        text: 'Please wait for the confirmation of your previous appointment.',
                        icon: 'info'
                    }).then(() => { window.location.href = 'returningpatient.php'; });
                </script>";
            }
            
        } else {
            echo "<script>Swal.fire({
                       title: 'New Patient',
                       text: 'You are a new patient. Please register to book an appointment.',
                       icon: 'info',
                       showCancelButton: false,
                       confirmButtonText: 'Register',
                   }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = 'Appointment.php';
                     }
                   });
               </script>";
               
        }
    }
}
?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function bookAppointment() {
        $('#feedbackModal').modal('show'); 
    }
</script>
</body>
</html>

