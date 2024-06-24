<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Qosolbile dental clinic Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
  
        .bg-dark-blue {
            background-color: #2a3f54;
        }
        
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
</head>

<body>

<?php
include("appointdatainsert.php");

?>


<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-dark-blue d-flex align-items-center justify-content-center left-image-container">
                <img src="images/BestTeeth Whitening.jpg" alt="Qosol Bile Dental Clinic" class="img-fluid" />
            </div>
            <div class="col-md-6 text-center py-5">
                <h2 class="text-light-blue mb-4">Welcome!</h2>
                <p class="text-light-white">
                    To book an appointment, first let us know if you've visited before.
                </p>
                <div class="button-container">
                    <button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#appointmentModal">
              New Patient
            </button>
                    <a href="returningpatient.php" class="btn btn-secondary btn-custom">Returning Patient</a
            >
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

    <!-- <div class="modal-dialog modal-lg" role="document"> -->

    <div
      class="modal fade"
      id="appointmentModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Make An Appointment
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form id="appointmentForm"  method="post">

    <div class="form-row">
        
    
    <div class="form-group col-md-6">
    <label for="serviceSelect">Select Your Service</label>
    <select class="form-control" id="serviceSelect" name="serviceSelect" onchange="updateCost()" required>
        <?php
        while ($row = $service_result->fetch_assoc()) {
            echo "<option value='" . $row['service_name'] . "'>" . $row['service_name'] . "</option>";
        }
        ?>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="serviceCost">Service Cost</label>
    <input type="text" class="form-control" id="serviceCost" name="serviceCost" disabled>
    <input type="hidden" id="serviceCostHidden" name="serviceCostHidden">
</div>

<div class="form-group col-md-6">
    <label for="doctorSelect">Select Dentist</label>
    <select class="form-control" id="doctorSelect" name="doctorSelect" required>
        <?php
        while ($row = $doctor_result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>"; 
        }
        ?>
    </select>
</div>

        <div class="form-group col-md-6">
        <label for="appointmentDate">Appointment Date</label>
        <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>

        </div>
        <div class="form-group col-md-6">
        <label for="appointmentTime">Appointment Time</label>
                  <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
                  </div>
        <div class="form-group col-md-6">
        <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Patent's Name" required>

        </div>
        <div class="form-group col-md-6">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="phone">Phone Number</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">+252</span>
        </div>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" pattern="^(61|62|63)\d{7}$" title="Please enter a Somalia phone number starting with +252 and followed by 61, 62, or 63 and 7 digits" required />
        <!-- <input type="text" class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" pattern="^(61|62|63)\d{7}$" title="Please enter a Somalia phone number starting with +252 and followed by 61, 62 and 7 digits" required> -->
    </div>
</div>
<div class="form-group col-md-6">
    <label for="email">Email</label>
    <div class="input-group">
        <input type="email" class="form-control <?php echo $email_error_message ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email" required>
        <!-- Error message container -->
        <div id="email-error-msg" class="invalid-feedback"><?php echo $email_error_message; ?></div>
        <div id="muuji"></div>
    </div>
</div>



        <div class="form-group col-md-6">
        <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                       </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="reset" class="btn btn-secondary mr-2">
                <i class="fas fa-sync-alt"></i> Reset
            </button>
            <button id="btnsave" type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Book Appointment
            </button>
        </div>
    </div>
</form>

          </div>
          
        </div>
      </div>
    </div>
  
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function() {
    // Function to set the min attribute of date and time inputs to the current date and time
    function setMinDateTime() {
        var now = new Date();
        var currentDate = now.toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
        var currentTime = now.toTimeString().split(' ')[0]; // Get current time in HH:mm format
        $('#appointmentDate').attr('min', currentDate);
        $('#appointmentTime').attr('min', currentTime);
    }

    // Call the function initially to set the min attributes
    setMinDateTime();

    // Update min attributes if the page is loaded after the initial time
    setInterval(setMinDateTime, 60000); // Update every minute to handle time changes

    $(document).ready(function() {
    // Function to disable timeslots based on the selected dentist's working hours
    $('#doctorSelect').change(function() {
        var workingHours = $(this).find('option:selected').data('working-hours');
        if (workingHours) {
            var timeSelect = $('#appointmentTime');
            var currentTime = new Date();
            var currentHour = currentTime.getHours();
            var currentMinute = currentTime.getMinutes();
            timeSelect.empty();
            for (var hour = currentHour; hour <= 23; hour++) {
                for (var minute = (hour === currentHour ? currentMinute : 0); minute < 60; minute += 30) {
                    var timeString = ('0' + hour).slice(-2) + ':' + ('0' + minute).slice(-2);
                    if (isWorkingHour(timeString, workingHours)) {
                        timeSelect.append($('<option>', {
                            value: timeString,
                            text: timeString
                        }));
                    }
                }
            }
        }
    });

    // Helper function to check if a given time falls within the working hours
    function isWorkingHour(timeString, workingHours) {
        var hours = parseInt(timeString.split(':')[0]);
        var minutes = parseInt(timeString.split(':')[1]);
        var startHour = parseInt(workingHours.split('-')[0]);
        var endHour = parseInt(workingHours.split('-')[1]);
        if (hours < startHour || hours > endHour) {
            return false;
        }
        if (hours === startHour && minutes < 30) {
            return false;
        }
        if (hours === endHour && minutes >= 30) {
            return false;
        }
        return true;
    }
});
});
</script>

    <script>
 $(document).ready(function() {
    $("#btnsave").click(function(e){
        e.preventDefault();
        $.post("appointdatainsert.php", $("#appointmentForm").serialize(), function(data){
            if (data.trim() === "email_already") {
                Swal.fire('Error', 'The email you entered is already in use. Please try another email', 'error');
            } else if (data.trim() === "phone_already") {
                Swal.fire('Error', 'The phone number you entered is already associated with an appointment. Please use a different phone number.', 'error');
            } else if (data.trim() === "same_row_data") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'It seems you already have an appointment scheduled. Please proceed to the returned patient page.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Return to Patient Page'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'returningpatient.php';
                    }
                });
            } else if (data.trim() === "error") {
                Swal.fire('Error', 'An error occurred while booking the appointment. Please try again later.', 'error');
            } 
            else {
                
                var appointmentData = JSON.parse(data);
                // Display success message with appointment details
                Swal.fire({
                    title: 'Appointment Booked Successfully!',
                    html: 'Your appointment for <strong>' + appointmentData.disease + '</strong> with <strong>' + appointmentData.dentist_name + '</strong> on <strong>' + appointmentData.appointmentDate + '</strong> at <strong>' + appointmentData.appointmentTime + '</strong> has been booked successfully.',
                    icon: 'success'
                });
            }
        });
    });
});



    function checkEmailExists(email, callback) {
        $.ajax({
            type: 'POST',
            url: 'check_email.php', 
            data: { email: email },
            success: function(response) {
                callback(response === 'exists');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                callback(false);
            }
        });
    }

    // Event listener for form submission
    $('#appointmentForm').submit(function(e) {
        var email = $('#email').val();

        // Check if the email already exists
        checkEmailExists(email, function(emailExists) {
            if (emailExists) {
                $('#email-error-msg').text('This email is already associated with an appointment. Please use a different email.');
                e.preventDefault(); 
            } else {
                $('#email-error-msg').text('');
            }
        });

        e.stopPropagation();
    });

    $('#appointmentModal').on('hidden.bs.modal', function(e) {
        $('#email-error-msg').text('');
    });

</script>
<script>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <?php if ($existing_appointments_result->num_rows > 0): ?>
    Swal.fire('Oops...', 'You already have an appointment scheduled. Please go returned patient page', 'error');
    <?php elseif ($result->num_rows > 0): ?>
    Swal.fire('Oops...', 'Sorry, the selected time slot is already booked. Please choose another time.', 'error');
    <?php else: ?>
    Swal.fire('Success', 'Booking successful!', 'success');
    <?php endif; ?>
    <?php endif; ?>
</script>
 <script>
    $(document).ready(function() {
        $('#serviceSelect').change(function() {
            var selectedService = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'fetch_cost.php', 
                data: { service: selectedService },
                success: function(response) {
                    $('#serviceCost').val(response);
                    $('#serviceCostHidden').val(response); 
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#appointmentForm').submit(function(e) {
        });

        $('#phone').on('input', function() {
            if ($(this).val().startsWith('+252')) {
                $(this).val($(this).val().substring(4)); 
            }
        });

      
        // Validate input for name field (allow only text and spaces)
        $('#name').on('input', function() {
            var sanitized = $(this).val().replace(/[^a-zA-Z\s]/g, '');
            $(this).val(sanitized);
        });

        // Validate input for phone number field (allow only numbers)
        $('#phone').on('input', function() {
            var sanitized = $(this).val().replace(/\D/g, '');
            $(this).val(sanitized);
        });
    });
</script>



</body>
</html>


