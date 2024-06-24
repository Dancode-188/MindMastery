<?php
include("conn.php");

if(isset($_POST['service'])) {
    $selectedService = $_POST['service'];
    
    $price_query = "SELECT price FROM services WHERE service_name='$selectedService'";
    $price_result = $conn->query($price_query);

    if ($price_result->num_rows > 0) {
        $row = $price_result->fetch_assoc();
        $price = $row['price'];
        $formatted_price = "$" . $price;
        echo $formatted_price;
    } else {
        echo "Error: Price not found for the selected service";
    }
} else {
    echo "Error: Service parameter is not set";
}
?>
