<?php
include("conn.php");

if(isset($_POST['service']) && !empty($_POST['service'])) {
    $selectedService = $_POST['service'];
    $doctor_query = "SELECT * FROM dentists WHERE services LIKE '%$selectedService%'";
    $doctor_result = $conn->query($doctor_query);

    if ($doctor_result->num_rows > 0) {
        $options = '';
        while ($row = $doctor_result->fetch_assoc()) {
            $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        echo $options;
    } else {
        echo "<option value=''>No dentists available</option>";
    }
} else {
    echo "<option value=''>Select a service first</option>";
}
?>
