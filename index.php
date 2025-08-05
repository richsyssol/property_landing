<?php
    ob_start(); // Start output buffering
    session_start(); // If you use sessions
    
    include 'includes/db_conn.php';
    
    // Get the property type from the URL
    $property_type = $_GET['slug'] ?? null;
    
    // Function to fetch single-row data
    function fetchSingleRow($conn, $table, $property_type) {
        $sql = "SELECT * FROM `$table` WHERE `property_type` = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $property_type);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Function to fetch multiple rows as an array
    function fetchMultipleRows($conn, $table, $property_type) {
    $data = [];
    $sql = "SELECT * FROM `$table` WHERE `status` = 'Active' AND `property_type` = ? ORDER BY `id` ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $property_type);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        // Ensure unique IDs are stored only once
        if (!array_key_exists($row['id'], $data)) {
            $data[$row['id']] = $row;
        }
    }

    return array_values($data); // Convert associative array to indexed array
}

    
    // Fetch data using functions
    // Fetch banner data
    $banner = fetchSingleRow($conn, 'banner', $property_type);

    // Define image path
    $image_path = !empty($banner['image']) ? '/admin/' . ltrim($banner['image'], '/') : null;
    $mobile_image_path = !empty($banner['phone_img']) ? '/admin/' . ltrim($banner['phone_img'], '/') : null;

    // Fetch logo data
    $logo = fetchSingleRow($conn, 'logo_img', $property_type);

    // Check if `image` or `logo_image` column exists
    $logo_image_path = !empty($logo['image']) ? '/admin/' . ltrim($logo['image'], '/') : null;

    $about_data = fetchSingleRow($conn, 'about', $property_type);
    $why_invest_desc = fetchSingleRow($conn, 'whyinvest_desc', $property_type);
    
    $why_us = fetchMultipleRows($conn, 'whyus', $property_type);
    $why_invest_icons = fetchMultipleRows($conn, 'whyinvest', $property_type);
    // Fetch heading data
    $heading = fetchSingleRow($conn, 'web_heading', $property_type);
    $social_media = fetchSingleRow($conn, 'social_media', $property_type);
    
    
    
    // Sanitize property type to prevent SQL injection
$property_type = $conn->real_escape_string($property_type);

// Fetch properties filtered by type
$query = "SELECT p.id, p.title, p.description, p.starting_from, p.remark, p.property_type, i.image_path 
          FROM property_list p
          LEFT JOIN property_list_images i ON p.id = i.property_id
          WHERE p.property_type = '$property_type' AND p.status = 'Active' 
          ORDER BY p.id ASC";

$result = $conn->query($query);

// Initialize arrays
$properties = [];

// Process database results
while ($row = $result->fetch_assoc()) {
    $property_id = $row['id'];

    // If property ID is new, initialize it in the array
    if (!isset($properties[$property_id])) {
        $properties[$property_id] = [
            'id' => $property_id,
            'title' => $row['title'],
            'description' => $row['description'],
            'starting_from' => $row['starting_from'],
            'remark' => $row['remark'],
            'images' => []
        ];
    }

    // Add image if exists
    if (!empty($row['image_path'])) {
        $properties[$property_id]['images'][] = '/admin/' . htmlspecialchars($row['image_path']);
    }
}

// Reset array indexes
$properties = array_values($properties);
// include form function file
include 'header.php';
include "property_form.php";
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark position-absolute top-0 start-50 translate-middle-x w-100">
    <div class="container">
        <?php if (!empty($logo_image_path)): ?>
            <a class="navbar-brand mx-auto" href="#">
                <img src="<?php echo htmlspecialchars($logo_image_path); ?>" alt="Logo">
            </a>
        <?php endif; ?>
    </div>
</nav>



<?php if (!empty($banner) && !empty($banner['image'])): ?>
<section class="pb-5">
    <div class="hero">
        <img src="<?php echo htmlspecialchars($image_path); ?>" class="pc_img" alt="Property">
        <img src="<?php echo htmlspecialchars($mobile_image_path); ?>" class="mobile_img" alt="Property">
        <div class="hero-content">
            <h1 class="display-4 fw-bold"><?php echo htmlspecialchars($banner['title']); ?></h1>
            <a href="#" class="btn btn-lg explore-btn" data-bs-toggle="modal" data-bs-target="#contactModal">REGISTER YOUR INTEREST</a>
        </div>
    </div>
</section>
<?php endif; ?>



<!-- Project Section -->
<section class="py-5">
    <div class="container">
        
        <?php if (!empty($heading)): ?>
            <div class="container text-center mb-5">
                <h1><?php echo htmlspecialchars_decode($heading['project_list_name']); ?></h1>
            </div>
        <?php endif; ?>
        
        
           
        
 <div class="row py-5 justify-content-center gap-4">
    <?php if (!empty($properties)): ?>
        <?php foreach ($properties as $index => $property): ?>
            <div class="col-md-5 d-flex flex-column">
                <?php 
                $carouselId = "projectCarousel_" . $index;
                $hasImages = !empty($property['images']);
                ?>

                <?php if ($hasImages): ?>
                    <div id="<?= $carouselId; ?>" class="carousel slide rounded overflow-hidden" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach ($property['images'] as $imgIndex => $image_path): ?>
                                <button type="button" data-bs-target="#<?= $carouselId; ?>" data-bs-slide-to="<?= $imgIndex; ?>" <?= $imgIndex == 0 ? 'class="active"' : ''; ?>></button>
                            <?php endforeach; ?>
                        </div>

                        <div class="carousel-inner">
                            <?php foreach ($property['images'] as $imgIndex => $image_path): ?>
                                <div class="carousel-item <?= $imgIndex == 0 ? 'active' : '' ?>">
                                    <img src="<?= htmlspecialchars($image_path); ?>" class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" alt="Project Image">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#<?= $carouselId; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#<?= $carouselId; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php endif; ?>

              <div class="py-4">
    <!-- Title with smooth effect -->
    <h3 class="fw-bold text-start animate-title"><?= htmlspecialchars($property['title']); ?></h3>

    <!-- Description with soft readability and transition -->
    <p class="pt-2 text-justify animate-text"><?= htmlspecialchars_decode($property['description']); ?></p>

    <div class="text-start py-2">
        <p class="fw-bold">HIGHLIGHTS</p>
        <ul class="list-unstyled starting d-flex flex-wrap align-items-center justify-content-start">
            <?php 
            $starting_from_list = json_decode($property['starting_from'], true) ?: [];
            if (!empty($starting_from_list) && is_array($starting_from_list)) {
                foreach ($starting_from_list as $price) {
                    echo "<li>" . htmlspecialchars($price) . "</li>";
                }
            } 
            ?>
        </ul>
    </div>

    <div class="text-start py-2">
        <small class="fw-bold"><?= htmlspecialchars($property['remark']); ?></small>
    </div>

    <div class="text-start py-3">
        <a href="#" class="btn-interested" data-bs-toggle="modal" data-bs-target="#contactModal">DISCOVER ME</a>
    </div>
</div>

<!-- Styles for transition and transformation -->
<style>
    .animate-title {
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        opacity: 0.9;
    }

    .animate-title:hover {
        transform: translateY(-3px);
        opacity: 1;
        color: #007bff; /* Highlight effect */
    }

    .animate-text {
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        opacity: 0.85;
    }

    .animate-text:hover {
        transform: translateX(5px);
        opacity: 1;
    }
</style>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No properties available for <?= htmlspecialchars($property_type); ?>.</p>
    <?php endif; ?>
</div>

<style>
    .starting li {
        color: #8B4513 !important;
    }

    .text-justify {
        text-align: justify;
    }

    .btn-primary {
        background-color: #8B4513;
        border: none;
    }

    .btn-primary:hover {
        background-color: #A0522D;
    }

    img.rounded {
        border-radius: 10px;
    }

    .carousel img {
        border-radius: 10px;
    }
</style>


    </div>
</section>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Inquiry Form -->
                <form id="inquiryForm1" action="" method="post" onsubmit="return executeRecaptcha('inquiryForm1', 'recaptchaResponse1');">
                    
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse1">
                    <input type="hidden" name="slug" value="<?= htmlspecialchars($property_type); ?>">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="first_name" class="form-control" placeholder="FIRST NAME*" required>
                        </div>
                        <div class="col-md-12 pt-3">
                            <input type="text" name="last_name" class="form-control" placeholder="LAST NAME*" required>
                        </div>
                        <div class="col-md-12 pt-3">
                            <input type="email" name="email" class="form-control" placeholder="EMAIL*" required>
                        </div>
                        <div class="col-md-12 pt-3">
                            <input type="tel" name="contact" class="form-control" placeholder="CONTACT*" required>
                        </div>
                        <div class="col-md-12 pt-3">
                            <textarea name="property" class="form-control form-control-lg" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12 pt-3">
                            <button type="submit" class="talk-btn w-100 text-center">Talk to an Expert <i class="fa-solid fa-message"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- why section -->
<section class="py-5 why-section">
    <div class="container">

        <?php if (!empty($heading)): ?>
            <div class="container text-center mb-5">
                <h1><?php echo htmlspecialchars_decode($heading['whyus_name']); ?></h1>
            </div>
        <?php endif; ?>

    <div class="row gy-4 justify-content-start">

    <!-- Display "Why Us" Section -->
    <?php if (!empty($why_us)): ?>
        <?php foreach ($why_us as $item): ?>
            <div class="col-md-4 col-12 d-flex align-items-center gap-3 why">
                <div class="icon-container d-flex align-items-center">
                    <img src="<?= '/admin/'.$item['image']; ?>" alt="Icon" width="50" class="img-fluid">
                </div>
                <p class="mb-0 text-muted fw-medium" style="font-size: 1.1rem;"><?= $item['title']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>


        <div class="text-center pt-5">
            <a href="#" class="btn-interested" data-bs-toggle="modal" data-bs-target="#contactModal">I'M INTERESTED</a>
        </div>
    </div>
</section>

<!-- why invest in our property -->
<section class="py-5 why-section">
    <div class="container">
        
        <?php if (!empty($heading)): ?>
            <div class="container text-center mb-5">
                <h1><?php echo htmlspecialchars_decode($heading['whyinvest_name']); ?></h1>
            </div>
        <?php endif; ?>

        <div class="text-muted px-3 py-2 bg-light rounded shadow-sm overflow-hidden">
    
    <?php if (!empty($why_invest_desc)): ?>
        <p class="mb-0 fs-5 fw-light animate-text py-2">
            <?php echo htmlspecialchars_decode($why_invest_desc['about']); ?>
        </p>
    <?php endif; ?>
    </div>

    <style>
        .animate-text {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0.8;
        }
    
        .animate-text:hover {
            transform: translateY(-3px);
            opacity: 1;
        }
    </style>

      <div class="row gy-4 justify-content-start my-5">
    <!-- Display "Why Invest" Icons Section -->
    <?php if (!empty($why_invest_icons)): ?>
        <?php foreach ($why_invest_icons as $item): ?>
            <div class="col-md-4 col-12 d-flex align-items-center gap-3 why">
                <div class="icon-container d-flex align-items-center">
                    <img src="<?= '/admin/'.$item['image']; ?>" alt="Icon" width="50" class="img-fluid">
                </div>
                <p class="mb-0 text-muted fw-medium" style="font-size: 1.1rem;"><?= $item['title']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

        <div class="text-center pt-5">
            <a href="#" class="btn-interested" data-bs-toggle="modal" data-bs-target="#contactModal">I'M INTERESTED</a>
        </div>
    </div>
</section>


<!--founder-section -->
<!--<section class="founder-section position-relative w-100 overflow-hidden">-->
<!--    <?php if (!empty($about_data)): ?>-->
<!--        <div class="founder-container position-relative w-100">-->
            <!-- Desktop View -->
<!--            <div class="founder-desktop position-relative">-->
<!--                <img src="<?php echo htmlspecialchars('/admin/' . $about_data['image']); ?>" -->
<!--                     alt="PNC Menon" class="founder-img img-fluid">-->
<!--                <div class="founder-text">-->
<!--                    <h1 class="fw-bold"><?php echo htmlspecialchars_decode($about_data['about_head']); ?></h1>-->
<!--                    <p><?php echo nl2br(htmlspecialchars_decode($about_data['about'])); ?></p>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Mobile View -->
<!--            <div class="founder-mobile position-relative">-->
<!--                <img src="<?php echo htmlspecialchars('/admin/' . $about_data['mob_image']); ?>" -->
<!--                     alt="PNC Menon" class="founder-mobimg img-fluid">-->
<!--                <div class="founder-text-mob">-->
<!--                    <h1 class="fw-bold"><?php echo htmlspecialchars_decode($about_data['about_head']); ?></h1>-->
<!--                    <p><?php echo nl2br(htmlspecialchars_decode($about_data['about'])); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    <?php endif; ?>-->
<!--</section>-->


<!-- register form -->
<section class="py-5">
    <div class="container">
        <?php if (!empty($logo_image_path)): ?>
            <div class="text-center">
                <img src="<?php echo htmlspecialchars($logo_image_path); ?>" alt="Logo">
            </div>
        <?php endif; ?>
        <div class="row py-5">
            <div class="col-md-5">
                <div class="pt-5">
                    
                    <?php if (!empty($heading)): ?>
                        <div class="container text-center mb-5">
                            <h1 class="form-head"><?php echo htmlspecialchars_decode($heading['contact_form_name']); ?></h1>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-7">
                 <!-- Include PHP form handler -->
   
    

    <!-- Display Messages -->
    <?php if (!empty($message)) echo $message; ?>

    <!-- Inquiry Form -->
<form id="inquiryForm2" action="" method="post" onsubmit="return executeRecaptcha('inquiryForm2', 'recaptchaResponse2');">
    
    <input type="hidden" name="recaptcha_response" id="recaptchaResponse2">
    
    <input type="hidden" name="slug" value="<?= htmlspecialchars($property_type); ?>">

    <div class="row">
        <div class="col-md-6 pt-5">
            <input type="text" name="first_name" class="form-control form-control-lg" placeholder="FIRST NAME*" required>
        </div>
        <div class="col-md-6 pt-5">
            <input type="text" name="last_name" class="form-control form-control-lg" placeholder="LAST NAME*" required>
        </div>
        <div class="col-md-6 pt-5">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="EMAIL*" required>
        </div>
        <div class="col-md-6 pt-5">
            <input type="tel" name="contact" class="form-control form-control-lg" placeholder="CONTACT*" required>
        </div>
        <div class="col-md-12 pt-5">
            <textarea name="property" class="form-control form-control-lg" placeholder="Message"></textarea>
        </div>
        

        <div class="col-md-12 pt-5">
            <button type="submit" class="btn-interested">Submit</button>
        </div>
    </div>
</form>



            </div>
        </div>
    </div>
</section>

<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <p>© 2025 LALIT ROONGTA GROUP. All Rights Reserved.</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0 social-icons">
                

                <a href="<?= !empty($social_media['instagram']) ? htmlspecialchars($social_media['instagram']) : 'https://www.instagram.com/lalitroongtagroup/' ?>" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                
                <a href="<?= !empty($social_media['facebook']) ? htmlspecialchars($social_media['facebook']) : 'https://www.facebook.com/Roongtagroup' ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                
                <a href="<?= !empty($social_media['linkedin']) ? htmlspecialchars($social_media['linkedin']) : 'https://www.linkedin.com/in/lalit-roongta-group-22749310b/?original_referer=https%3A%2F%2Froongtagroup.co.in%2F' ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                
                <a href="<?= !empty($social_media['youtube']) ? htmlspecialchars($social_media['youtube']) : 'https://www.youtube.com/channel/UCLNoZcZaje38XEfxrP8V48A' ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                
                <a href="<?= !empty($social_media['twitter']) ? htmlspecialchars($social_media['twitter']) : 'https://x.com/roongta_group' ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                


                
                
            </div>
            <div class="col-md-4">
                <a href="https://roongtagroup.co.in/pages/privacy-policy/" target="_blank" class="privacy-link">Privacy Policy</a>
            </div>
            
        </div>
    </div>
</footer>


<?php ob_end_flush(); // Send output
?>


<!--Google recapcha script-->
 <script src="https://www.google.com/recaptcha/api.js?render=6LdlsgwrAAAAAAggGVn_Xl8RbN2jyZNfkhbFGAzn"></script>
<script>
  function executeRecaptcha(formId, responseFieldId, actionName) {
    grecaptcha.ready(function() {
      grecaptcha.execute('6LdlsgwrAAAAAAggGVn_Xl8RbN2jyZNfkhbFGAzn', { action: actionName }).then(function(token) {
        document.getElementById(responseFieldId).value = token;
        document.getElementById(formId).submit();
      });
    });
    return false; // prevent default form submission
  }
</script>

<script>

    // image swiper js
    var swiper = new Swiper('.swiper', {
    slidesPerView: 1.5,
    centeredSlides: true,
    loop: true,
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});




</script>