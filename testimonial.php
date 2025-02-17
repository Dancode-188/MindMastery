<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Testimonial Carousel with Star Ratings</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    // Activate carousel with a specified interval
    $('.carousel').carousel({
        interval: 5000 // Adjust interval as desired (in milliseconds)
    });
});
</script>
<style>
body {
    font-family: "Open Sans", sans-serif;
}
h2 {
    color: #333;
    text-align: center;
    text-transform: uppercase;
    font-family: "Roboto", sans-serif;
    font-weight: bold;
    position: relative;
    margin: 25px 0 50px;
}
h2::after {
    content: "";
    width: 100px;
    position: absolute;
    margin: 0 auto;
    height: 3px;
    background: #ffdc12;
    left: 0;
    right: 0;
    bottom: -10px;
}
.carousel {
    width: 650px;
    margin: 0 auto;
    padding-bottom: 50px;
}
.carousel .carousel-item {
    color: #999;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    min-height: 340px;
}
.carousel .carousel-item a {
    color: #eb7245;
}
.carousel .img-box {
    width: 145px;
    height: 145px;
    margin: 0 auto;
    border-radius: 50%;
}
.carousel .img-box img {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 50%;
}
.carousel .testimonial {    
    padding: 30px 0 10px;
}
.carousel .overview {    
    text-align: center;
    padding-bottom: 5px;
}
.carousel .overview b {
    color: #333;
    font-size: 15px;
    text-transform: uppercase;
    display: block;    
    padding-bottom: 5px;
}
.carousel .star-rating i {
    font-size: 18px;
    color: #ffdc12;
}
.carousel-control-prev, .carousel-control-next {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #999;
    text-shadow: none;
    top: 4px;
}
.carousel-control-prev i, .carousel-control-next i {
    font-size: 20px;
    margin-right: 2px;
}
.carousel-control-prev {
    left: auto;
    right: 40px;
}
.carousel-control-next i {
    margin-right: -2px;
}
.carousel .carousel-indicators {
    bottom: 15px;
}
.carousel-indicators li, .carousel-indicators li.active {
    width: 11px;
    height: 11px;
    margin: 1px 5px;
    border-radius: 50%;
}
.carousel-indicators li {    
    background: #e2e2e2;
    border: none;
}
.carousel-indicators li.active {        
    background: #888;        
}
</style>
</head>
<body>
<h2>Testimonials</h2>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $indicator_count = 0;
            while($row = $result->fetch_assoc()) {
                echo '<li data-target="#myCarousel" data-slide-to="' . $indicator_count . '" ' . ($indicator_count == 0 ? 'class="active"' : '') . '></li>';
                $indicator_count++;
            }
        }
        $conn->close();
        ?>
    </ol>   
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
        <?php
      include "conn.php";

        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);

        $active = 'active';

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="carousel-item ' . $active . '">';
                echo '<p class="testimonial">' . $row["opinion"] . '</p>';
                echo '<p class="overview"><b>' . $row["email"] . '</b></p>';
                echo '<div class="star-rating">';
                echo '<ul class="list-inline">';
                for ($i = 0; $i < $row["rating"]; $i++) {
                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                }
                for ($i = $row["rating"]; $i < 5; $i++) {
                    echo '<li class="list-inline-item"><i class="fa fa-star-o"></i></li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                $active = '';
            }
        }

        $conn->close();
        ?>
    </div>
    <!-- Carousel controls -->
    <!-- <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a> -->
</div>
</body>
</html>
