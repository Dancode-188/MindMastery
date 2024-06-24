<?php
include "retpa.php";
$email_disabled = ''; 
$email_value = ''; 

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $stmt = $conn->prepare("SELECT * FROM appointment1 WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email_value = $row['email'];
        $email_disabled = 'disabled';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>QosolBile dental clinic Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="main/feedback.css">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
.text-light-blue {
    color: #17a2b8;
}

.button-container {
    display: flex;
    gap: 10;
}

.button-container {
    display: flex;
    gap: 10px;
}

.btn {
    flex-grow: 1;
    padding: 10px 20px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: #ffffff;
    border: none;
}

.btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
    border: none;
}

.btn:hover {
    transform: translateY(-3px);
}

.text-muted {
    margin-top: 80px;
}

.booking-option {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.booking-option:hover {
    transform: translateY(-3px);
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
}

.left-image-container {
    margin-left: 0;
    position: relative;
    overflow: hidden;
    height: 100vh;
}

.left-image-container img {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-dark-blue d-flex align-items-center justify-content-center left-image-container">
                <img src="images/BestTeeth Whitening.jpg" alt="Smile Dental care" class="img-fluid" />
            </div>
            <div class="col-md-6 text-center py-5">
                <h2 class="text-light-blue mb-4">Welcome Back!</h2>
                <p class="text-light-white">
                We're delighted to see you again and appreciate your continued trust in our dental care services                </p>
                <div class="button-container">
                    <button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#appointmentModal">
                    Schedule  Next Appointment
         

            <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#cancelModal">
                    Cancel Appointment
            </button>
            <!-- <a href="UPDATEPATIENT.php" class="btn btn-secondary btn-custom">Manage Appointment </a
            > -->
            <!-- <a href="returning_patient_form.php" class="btn btn-secondary btn-custom">  Manage Appointment</a
            > -->
       
          </div>
      
        
          <div class="text-muted text-light-white">
            <p>
              <i class="fas fa-clinic-medical"></i> Qosol bile dental Clinic
            </p>
            <p><i class="fas fa-map-marker-alt"></i>Kismayu Jh , Somalia</p>
            <p><i class="fas fa-phone-alt"></i> +123456789 0987</p>
          </div>
        </div>
      </div>
    </div>
<!-- Appointment Modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make An Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm" action="returningpatient.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="patientName">Full Name</label>
                            <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Patient's Name" required onchange="fetchPatientData()" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+252</span>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" pattern="^(61|62|63)\d{7}$" title="Please enter a Somalia phone number starting with +252 and followed by 61, 62, or 63 and 7 digits" required onchange="fetchPatientData()" />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="genderSelect" name="gender" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serviceSelect">Select Your Service</label>

                            <select class="form-control" id="serviceSelect" name="serviceSelect" onchange="updateCost()" required>
                                <option value="" selected disabled>Select Service</option>
                                <?php
                                while ($row = $service_result->fetch_assoc()) {
                                    echo "<option value='" . $row['service_name'] . "'>" . $row['service_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                               
                        <div class="form-group col-md-6">
    <label for="serviceCost">Service Cost</label>
        <input type="text" class="form-control" id="service_price" name="serviceCostHidden" readonly>

    <!-- <input type="text" class="form-control" id="service_price" name="serviceCost" readonly> -->
    <!-- <input type="hidden" id="serviceCostHidden" name="serviceCostHidden"> -->
</div>

<div class="form-group col-md-6">
    <label for="doctorSelect">Appointment With</label>
    <select class="form-control" id="doctorSelect1" name="doctorSelect1" required>
        <option value="" selected disabled>Select Dentist</option>
        <?php
        while ($row = $doctor_result->fetch_assoc()) {

            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>"; 
                                                // echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>"; 

        }
        ?>
    </select>
</div>
<div class="form-group col-md-6">
                            <label for="appointmentDate">Appointment Date</label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="appointmentTime">Appointment Time</label>
                            <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required onchange="fetchPatientData('appointment')" />
                            <!-- <input type="text" class="form-control" id="address" name="address" placeholder="Address" required /> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="reset" class="btn btn-secondary mr-2">
                                <i class="fas fa-sync-alt"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Book Appointment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cancelForm" action="returningpatient.php" method="post"> <!-- Added id="cancelForm" -->
                 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cancelPatientName">Full Name</label>
                            <input type="text" class="form-control" id="cancelPatientName" name="patientName" required onchange="fetchPatientData('cancel')" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelPhone">Phone no</label>
                            <input type="text" class="form-control" id="cancelPhone" name="phone" onchange="fetchPatientData('cancel')" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelGenderSelect">Gender</label>
                            <input type="text" class="form-control" id="cancelGenderSelect" name="genderSelect" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelEmail">Email</label>
                            <input type="email" class="form-control" id="cancelEmail" name="email" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelDiseaseSelect">Select Your Service</label>
                            <input type="text" class="form-control" id="cancelDiseaseSelect" name="diseaseSelect" readonly />
                        </div>
                 
                        <div class="form-group col-md-6">
                            <label for="cancelDoctorSelect">Appointment With</label>
                            <input type="text" class="form-control" id="cancelDoctorSelect" name="doctorSelect" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelAppointmentDate">Appointment Date</label>
                            <input type="date" class="form-control" id="cancelAppointmentDate" name="appointmentDate" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cancelAppointmentTime">Appointment Time</label>
                            <input type="time" class="form-control" id="cancelAppointmentTime" name="appointmentTime" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="reset" class="btn btn-secondary mr-2">
                                <i class="fas fa-sync-alt"></i> Reset
                            </button>
                            <button type="button" class="btn btn-danger cancel-appointment">
                                <i class="fas fa-plus"></i> Cancel Appointment
                            </button>

                            <!-- <button type="submit" class="btn btn-danger">
                                <i class="fas fa-plus"></i> Cancel Appointment
                            </button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Give Your Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="feedbackForm" method="post" action="submit_feedback.php">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">

            <input type="hidden" name="patientName" id="hiddenPatientName">
    <input type="hidden" name="phone" id="hiddenPhone">                    <div class="rating">
                        <input type="number" name="rating" id="rating" hidden>
                        <i class='bx bx-star star' style="--i: 0;"></i>
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                    </div>
                    <textarea name="opinion" id="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
                    <div class="btn-group">
                        <button type="submit" class="btn submit">Submit</button>
                        <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this script section at the end of your HTML body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const allStar = document.querySelectorAll('.rating .star');
    const ratingValue = document.querySelector('.rating input#rating');

    allStar.forEach((item, idx)=> {
        item.addEventListener('click', function () {
            let click = 0;
            ratingValue.value = idx + 1;

            allStar.forEach(i=> {
                i.classList.remove('bxs-star');
                i.classList.add('bx-star');
                i.classList.remove('active');
            });

            for(let i=0; i<allStar.length; i++) {
                if(i <= idx) {
                    allStar[i].classList.remove('bx-star');
                    allStar[i].classList.add('bxs-star');
                    allStar[i].classList.add('active');
                } else {
                    allStar[i].style.setProperty('--i', click);
                    click++;
                }
            }
        });
    });

    document.querySelector('.btn.cancel').addEventListener('click', function() {
        document.getElementById('feedbackForm').reset();
    });

    function bookAppointment() {
        $('#feedbackModal').modal('show'); 
    }

    function fetchPatientData(action) {
        var name;
        var phone;
        if (action === 'cancel') {
            name = document.getElementById('cancelPatientName').value;
            phone = document.getElementById('cancelPhone').value;
        } else {
            name = document.getElementById('patientName').value;
            phone = document.getElementById('phone').value;
        }
        $.ajax({
            url: 'fetch_patient.php',
            type: 'post',
            data: { name: name, phone: phone },
            success: function(response) {
                var patientData = JSON.parse(response);
                console.log(patientData);
                if (patientData.exists) {
                    if (action === 'cancel') {
                        document.getElementById('cancelGenderSelect').value = patientData.gender;
                        document.getElementById('cancelEmail').value = patientData.email;
                        document.getElementById('cancelDiseaseSelect').value = patientData.service;
                        document.getElementById('cancelDoctorSelect').value = patientData.appointment_with;
                        document.getElementById('cancelAppointmentDate').value = patientData.appointment_date;
                        document.getElementById('cancelAppointmentTime').value = patientData.appointment_time;
                    } else {
                        document.getElementById('email').value = patientData.email;
                        document.getElementById('genderSelect').value = patientData.gender;
                        document.getElementById('serviceSelect').value = patientData.service;
                        document.getElementById('service_price').value = patientData.service_price;
                        document.getElementById('doctorSelect1').value = patientData.appointment_with;
                        document.getElementById('appointmentDate').value = patientData.appointment_date;
                        document.getElementById('appointmentTime').value = patientData.appointment_time;
                        document.getElementById('address').value = patientData.address;
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        $('#appointmentModal .btn-primary').click(function() {
            fetchPatientData('appointment');
            bookAppointment();
        });

        $('#cancelModal .btn-danger').click(function() {
            fetchPatientData('cancel');
        });

        $('#cancelModal .btn-danger').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to cancel the appointment. This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    var name = $('#cancelPatientName').val();
                    var phone = $('#cancelPhone').val();
                    $('#cancelForm').append('<input type="hidden" name="cancelAppointment" value="1">');
                    $('#cancelForm').submit();
                }
            });
        });

        $('#serviceSelect').change(function() {
            var selectedService = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'fetch_cost.php',
                data: { service: selectedService },
                success: function(response) {
                    $('#serviceCost').val(response);
                    $('#service_price').val(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#phone').on('input', function() {
            if ($(this).val().startsWith('+252')) {
                $(this).val($(this).val().substring(4)); 
            }
        });

        $('#name').on('input', function() {
            var sanitized = $(this).val().replace(/[^a-zA-Z\s]/g, '');
            $(this).val(sanitized);
        });
        $('#phone').on('input', function() {
            var sanitized = $(this).val().replace(/\D/g, '');
            $(this).val(sanitized);
        });
    });
</script>


  </body>
</html>
