<?php
include 'header.php';
include 'fetch_data.php';

ob_start(); // Start output buffering
?>





<!-- navbar -->
<nav>
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Column -->
            <div class="col-6 col-md-4">
            <img src="<?php echo htmlspecialchars('/admin/'.$project['logo_img']); ?>" class="img-fluid" alt="Logo">
            </div>
            
            <!-- Navigation Menu (Hidden on mobile) -->
            <div class="col-md-4 d-none d-md-flex justify-content-center">
                <ul class="nav-ul">
                    <li><a href="#gallary">Gallery</a></li>
                    <li><a href="#location">Location</a></li>
                    <li><a href="#stages">Stages</a></li>
                    <li><a href="#video">Video</a></li>
                </ul>
            </div>
            
            <!-- Call Us Button Column -->
            <div class="col-6 col-md-4 d-flex justify-content-end">
                <a href="#" class="custom-btn" data-bs-toggle="modal" data-bs-target="#contactModal">Call Us</a>
            </div>
        </div>
    </div>
</nav>


<!-- Bootstrap Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form id="inquiryForm1" action="process_form.php" method="post" onsubmit="return executeRecaptcha('inquiryForm1', 'recaptchaResponse1', 'form1');">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse1">
                    <input type="hidden" name="form_type" value="form1">
                    <input type="hidden" name="slug" value="<?= htmlspecialchars($slug); ?>">
                
                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" class="form-control" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" class="form-control" name="phone" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="8"></textarea>
                    </div>
                    

                    <button type="submit" class="talk-btn w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- hero section -->
<section>
    <div>
        <img src="<?php echo htmlspecialchars('/admin/'.$project['image']); ?>" class="img-fluid hero-img" alt="">
    </div>
</section>

<!-- property details section on mobile view -->
<?php if (!empty($aboutProperty) && (!empty($property_details) || !empty($about_property_details))): ?>
<section class="mob-section py-3">
    <div>
        <!-- Property Name & Description -->
        <div class="property-header">
            <h1 class="fw-bold"><?= htmlspecialchars($aboutProperty['prop_name'] ?? '') ?></h1>
            <p class="about-text-mob"><?= htmlspecialchars($aboutProperty['about_title'] ?? '') ?></p>
        </div>

        <!-- Launching Tag -->
        <div class="launching-tag-mob text-center">
            <p><?= htmlspecialchars($aboutProperty['prop_launching'] ?? '') ?></p>
        </div>

        <!-- Property Details Grid -->
        <div class="row property-details pt-2">
            <?php foreach ($property_details as $detail): ?>
                <div class="col-sm-4 col-md-4 col-6">
                    <div class="prop-box">
                        <h4 class="fw-bold"><?= htmlspecialchars($detail['title']) ?></h4>
                        <p><?= htmlspecialchars($detail['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="">
        <div class="row align-items-center py-4 gov-details">
            <div class="col-md-6 text-md-start text-center mb-3 mb-md-0">
                <h2 class="fw-bold">
                    <?= htmlspecialchars($aboutProperty['discount_line'] ?? '') ?>
                </h2>
            </div>
            <div class="col-md-6 text-center">
                <?php if (!empty($aboutProperty['brochure'])): ?>
                    <img src="<?php echo htmlspecialchars('/admin/'.$aboutProperty['brochure']); ?>" alt="QR Code" class="img-fluid mb-3" style="max-width: 200px;">
                <?php endif; ?>
                <div class="d-flex align-items-center justify-content-center mt-2">
                        <img src="asset/image/rera_logo.png" alt="Gov Logo" class="img-fluid me-2" style="max-width: 40px;">
                    <div class="text-start">
                        
                        <p class="mb-0">Maharera.mahaonline.gov.in</p>
                        <p class="mb-0">Maha RERA No: <?= htmlspecialchars($govdetails['maha_rera_no'] ?? '') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- About Property Description -->
        <div class="about-property">
            <h4 class="fw-bold text-center"><?= htmlspecialchars($aboutProperty['about_description'] ?? '') ?></h4>
            <p class="about-des-mob"><?= htmlspecialchars($aboutProperty['about_sub_description'] ?? '') ?></p>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- property details -->
<?php if (!empty($property_details)): ?>
<section class="py-3 desktop-section">
    <div class="container">
        <ul class="prop_details">
            <?php if (!empty($property_details)): ?>
                <?php foreach ($property_details as $detail): ?>
                    <li>
                        <h4><?= htmlspecialchars($detail['title']) ?></h4>
                        <p><?= htmlspecialchars($detail['description']) ?></p>
                    </li>
                <?php endforeach; ?>
            
            <?php endif; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<!-- nav buttons -->
<!--<section class="py-3">-->
<!--    <div class="container text-center">-->
<!--        <a href="#gallary" class="custom-btn custom-btn-mobile mt-2">Gallary</a>-->
<!--        <a href="#infrastructure" class="custom-btn custom-btn-mobile mt-2">Infrastructure</a>-->
<!--        <a href="#location" class="custom-btn custom-btn-mobile mt-2">Location</a>-->
<!--        <a href="#plan" class="custom-btn custom-btn-mobile mt-2">Plans</a>-->
<!--        <a href="#about" class="custom-btn custom-btn-mobile mt-2">About the Developer</a>-->
<!--        <a href="#financial" class="custom-btn custom-btn-mobile mt-2">Financial Information</a>-->
<!--        <a href="#similar-project" class="custom-btn custom-btn-mobile mt-2">Similar Projects</a>-->
<!--        <a href="#materials" class="custom-btn custom-btn-mobile mt-2">Project Materials</a>-->
<!--    </div>-->
<!--</section>-->





<!-- about property -->
<?php if (!empty($aboutProperty)): ?>
<section class="py-5 desktop-section">
    <div class="container">
        <div class="text-center">
            <h1><?= htmlspecialchars($aboutProperty['prop_name'] ?? '') ?></h1>
            <p class="about-text"><?= htmlspecialchars($aboutProperty['about_title'] ?? '') ?></p>
            <h5><?= htmlspecialchars($aboutProperty['prop_launching'] ?? '') ?></h5>
        </div>

        <div class="row py-5">
            <div class="col-md-6">
                <h4><?= htmlspecialchars($aboutProperty['about_description'] ?? '') ?></h4>
                <p class="about-text"><?= htmlspecialchars_decode($aboutProperty['about_sub_description'] ?? '') ?></p>
            </div>
            <div class="col-md-6">
               

                <div class="align-items-center">
                    
                    <div class=" text-center">
                        <?php if (!empty($aboutProperty['brochure'])): ?>
                            <img src="<?php echo htmlspecialchars('/admin/'.$aboutProperty['brochure']); ?>" alt="QR Code" class="img-fluid mb-3" style="max-width: 200px;">
                        <?php endif; ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                                <img src="asset/image/rera_logo.png" alt="Gov Logo" class="img-fluid me-2" style="max-width: 40px;">
                            <div class="text-start">
                                
                                <p class="mb-0">Maharera.mahaonline.gov.in</p>
                                <p class="mb-0">Maha RERA No: <?= htmlspecialchars($aboutProperty['maha_rera_no'] ?? '') ?></p>
                            </div>
                        </div>
                    </div>
                    <div class=" text-md-start text-center mb-3 mb-md-0">
                        <h4 class="fw-bold text-center">
                            <?= htmlspecialchars($aboutProperty['discount_line'] ?? '') ?>
                        </h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>






<!-- property images -->
<?php if (!empty($imageArray)): ?>
<section class="py-5" id="gallary">
    <div class="container">
        <div class="row">
        <?php if (!empty($imageArray)): ?>
            <?php foreach ($imageArray as $img): ?>
            <div class="col-md-6 pt-3">
                <div class="card">
                    <div class="pro-img">
                        <img class="hoverImage" src="<?= "/admin/".htmlspecialchars($img) ?>" data-fancybox="gallery" alt="">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    
    <?php endif; ?>
        
        </div>
    </div>
</section>
<?php endif; ?>

<!-- contact form 1 -->
<?php if (!empty($settings) && $settings['section1_show']): ?>
<section class="py-5 contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 pt-3 contact_img">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="<?= !empty($settings['section1_image']) ? "/admin/" . $settings['section1_image'] : '/asset/image/default.jpg'; ?>" class="contact_image img-fluid" alt="Top Section Image">
                    </div>
                    <!--<div class="text-light">-->
                    <!--    <h3 class="text-justify contact_text">-->
                    <!--        <?= htmlspecialchars($settings['section1_text'] ?? 'Default Middle Section Text') ?>-->
                    <!--    </h3>-->
                    <!--    <p class="float-end">-->
                    <!--        <a class="text-decoration-none text-light" href="tel:<?= htmlspecialchars($settings['section1_contact'] ?? 'Default Middle Section Text') ?>"><i class="fa-solid fa-phone-flip"></i> <?= htmlspecialchars($settings['section1_contact'] ?? 'Default Middle Section Text') ?></a>-->
                    <!--    </p>-->
                    <!--</div>-->

                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
                
                <form id="inquiryForm2" action="process_form.php" method="post" onsubmit="return executeRecaptcha('inquiryForm2', 'recaptchaResponse2', 'form2');">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse2">
                    <input type="hidden" name="form_type" value="form2">
                    <input type="hidden" name="slug" value="<?= htmlspecialchars($slug); ?>">
                
                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" class="form-control" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" class="form-control" name="phone" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="8"></textarea>
                    </div>
                    

                    <button type="submit" class="talk-btn w-100">Submit</button>
                </form>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- property image -->
<?php if (!empty($displayImage)): ?>
<section>
    <div>
        <img src="<?= "/admin/".htmlspecialchars($displayImage) ?>" class="img-fluid" width="100%" alt="">
    </div>
</section>
<?php endif; ?>


<!--urban Infrastructure section heading -->
<?php if (!empty($headingData)): ?>
<section class="py-5 contact" id="infrastructure">
    <div class="container">
        <div class="text-center">
            <p ><?= htmlspecialchars($headingData['urban_section_name']) ?></p>
            <h1><?= htmlspecialchars($headingData['urban_head']) ?></h1>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- Urban Infrastructure section -->
<?php if (!empty($infraData)): ?>
<section class="py-5">
    <div class="container">
        <?php if (!empty($headingData)): ?>
            <div class="text-center">
                <p class="display-6"><?= htmlspecialchars($headingData['urban_sub_head']) ?></p>
            </div>
        <?php endif; ?>
        <div class="py-5">
            <div class="infra-carousel owl-carousel owl-theme">
                <?php foreach ($infraData as $infra): ?>
                    <div class="item">
                        <div class="card">
                            <div class="pro-img">
                                <img class="hoverImage" src="<?= "/admin/".htmlspecialchars($infra['image_path']) ?>" data-fancybox="gallery" alt="">
                            </div>
                            <div class="p-5 text-center">
                                <h3><?= htmlspecialchars($infra['description']) ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- location section -->
<?php if (!empty($locationData) && !empty($property_details)): ?>
<section class="py-5" id="location">
    <div class="container">
        <div class="text-center">
            <p><?= htmlspecialchars($locationData['section_name'] ?? '') ?></p>
            <h1><?= htmlspecialchars($locationData['location_head'] ?? '') ?></h1>
        </div>
        <!--<div class="text-justify">-->
        <!--    <p><?= htmlspecialchars($locationData['location_descri'] ?? '') ?></p>-->

        <!--    <ul class="prop_details prop_details_desk">-->
        <!--            <?php foreach ($property_details as $detail): ?>-->
        <!--                <li>-->
        <!--                    <h4><?= htmlspecialchars($detail['title']) ?></h4>-->
        <!--                    <p><?= htmlspecialchars($detail['description']) ?></p>-->
        <!--                </li>-->
        <!--            <?php endforeach; ?>-->
                
        <!--    </ul>-->

        <!--</div>-->
        
        <!-- Property Details Grid -->
        <div class="row property-details1 pt-2">
            <?php foreach ($property_details as $detail): ?>
                <div class="col-sm-4 col-md-4 col-4">
                    <div class="prop-box">
                        <h4 class="fw-bold"><?= htmlspecialchars($detail['title']) ?></h4>
                        <p><?= htmlspecialchars($detail['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <div class="pt-5">
        <iframe src="<?= !empty($locationData['location_map']) ? $locationData['location_map'] : '<p>No Map Available</p>' ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<?php endif; ?>




<!-- plans section -->
<?php if (!empty($planImages)): ?>
<section class="py-5" id="stages">
    <div class="container">
        <?php if (!empty($headingData)): ?>
        <div class="text-center">
            <p><?= htmlspecialchars($headingData['plan_section_name']) ?></p>
            <h1><?= htmlspecialchars($headingData['plan_head']) ?></h1>
        </div>
        <?php endif; ?>
        <div class="py-5">
            <div class="plan-carousel owl-carousel owl-theme">
                <?php foreach ($planImages as $img): ?>
                    <div class="item">
                        <div class="card">
                            <div class="pro-img">
                                <img class="hoverImage" src="<?= "/admin/".htmlspecialchars($img) ?>" data-fancybox="gallery" alt="">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- About developer -->
<!--<?php if (!empty($developerData)): ?>-->
<!--<section id="about">-->
<!--    <div class="container">-->
<!--        <div class="text-center">-->
<!--            <p><?= htmlspecialchars($developerData['section_name'] ?? '') ?></p>-->
<!--            <h1><?= htmlspecialchars($developerData['section_head'] ?? '') ?></h1>-->
<!--        </div>-->
<!--        <div class=" pt-5">-->
<!--            <p class="text-center display-6"><?= htmlspecialchars($developerData['dev_head'] ?? '') ?></p>-->
<!--            <p class="text-justify"><?= htmlspecialchars($developerData['dev_describ'] ?? '') ?></p>-->
<!--                <ul class="prop_details prop_details_dk">-->
<!--                    <?php if (!empty($developerProjects)): ?>-->
<!--                    <?php foreach ($developerProjects as $project): ?>-->
<!--                        <li>-->
<!--                            <h4><?= htmlspecialchars($project['dev_title']) ?></h4>-->
<!--                            <p><?= htmlspecialchars($project['dev_description']) ?></p>-->
<!--                        </li>-->
<!--                    <?php endforeach; ?>-->
                    
<!--                    <?php endif; ?>-->
<!--                </ul>-->
<!--        </div>-->
        
        <!-- Property Details Grid -->
<!--        <div class="row property-details1 pt-2">-->
<!--            <?php foreach ($developerProjects as $project): ?>-->
<!--                <div class="col-sm-3 col-md-3 col-4">-->
<!--                    <div class="prop-box">-->
<!--                        <h4 class="fw-bold"><?= htmlspecialchars($project['dev_title']) ?></h4>-->
<!--                        <p><?= htmlspecialchars($project['dev_description']) ?></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            <?php endforeach; ?>-->
<!--        </div>-->
        
<!--    </div>-->
<!--</section>-->
<!--<?php endif; ?>-->


<!-- payment section -->
<?php if (!empty($headingData)): ?>
<section class="py-5" id="financial">
    <div class="container">
            <div class="text-center">
                <p><?= htmlspecialchars($headingData['finance_section_name']) ?></p>
                <h1><?= htmlspecialchars($headingData['finance_head']) ?></h1>
            </div>
            <!--<div class="text-center pt-5">-->
            <!--    <p class="display-6"><?= htmlspecialchars_decode($headingData['finance_subhead']); ?></p>-->
            <!--</div>-->
    </div>

</section>
<?php endif; ?>

<!-- contact form 2 -->
<?php if (!empty($settings) && $settings['section2_show']): ?>
<section class="py-5 contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 pt-3 contact_img">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="<?= !empty($settings['section2_image']) ? "/admin/" . $settings['section2_image'] : '/asset/image/default.jpg'; ?>" class="contact_image img-fluid" alt="Middle Section Image">
                    </div>
                    <!--<div class="text-light">-->
                    <!--    <h3 class="text-justify contact_text">-->
                    <!--        <?= htmlspecialchars($settings['section2_text'] ?? 'Default Middle Section Text') ?>-->
                    <!--    </h3>-->
                    <!--    <p class="float-end">-->
                    <!--        <a class="text-decoration-none text-light" href="tel:<?= htmlspecialchars($settings['section2_contact'] ?? 'Default Middle Section Text') ?>"><i class="fa-solid fa-phone-flip"></i> <?= htmlspecialchars($settings['section2_contact'] ?? 'Default Middle Section Text') ?></a>-->
                    <!--    </p>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="col-lg-6 col-md-12 pt-3">
                
               <form id="inquiryForm3" action="process_form.php" method="post" onsubmit="return executeRecaptcha('inquiryForm3', 'recaptchaResponse3', 'form3');">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse3">
                    <input type="hidden" name="form_type" value="form3">
                    <input type="hidden" name="slug" value="<?= htmlspecialchars($slug); ?>">
                
                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" class="form-control" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" class="form-control" name="phone" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="8"></textarea>
                    </div>
                    

                    <button type="submit" class="talk-btn w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Similar Projects -->
<section class="py-5" id="similar-project">
    <div class="container">

        <!-- Section Heading -->
        <?php if (!empty($headingData)): ?>
            <div class="text-center">
                <p><?= htmlspecialchars($headingData['pro_section_name']) ?></p>
                <h1><?= htmlspecialchars($headingData['pro_head']) ?></h1>
            </div>
        <?php endif; ?>
        
        <!-- Similar Projects Listing -->
        <div class="row py-5">
            <?php if (!empty($similarProjects)): ?>
                <?php foreach ($similarProjects as $project): ?>
                    <div class="col-md-4 pt-3">
                        <div class="card">
                            <div class="similar_projects">
                                <img class="hoverImage" src="<?= "/admin/" . htmlspecialchars($project['image']) ?>" 
                                     data-fancybox="gallery" 
                                     alt="<?= htmlspecialchars($project['name']) ?>">
                            </div>
                            <div class="p-4 text-center">
                                <h4><?= htmlspecialchars($project['name']) ?></h4>
                                <small><?= htmlspecialchars($project['developer']) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No similar projects found.</p>
            <?php endif; ?>
        </div>
        
        <!-- "See All" Button -->
        <div class="text-center">
            <?php if (!empty($category)): ?>
                <?php if (strtolower($category) === "residential"): ?>
                    <a href="https://property.roongtagroup.co.in/index/residential" class="btn talk-btn">
                        See All <i class="fa-solid fa-table"></i>
                    </a>
                <?php elseif (strtolower($category) === "commercial"): ?>
                    <a href="https://property.roongtagroup.co.in/index/commercial" class="btn talk-btn">
                        See All <i class="fa-solid fa-table"></i>
                    </a>
                <?php else: ?>
                    <a href="index" class="btn talk-btn">
                        See All <i class="fa-solid fa-table"></i>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- project material -->
<?php if (!empty($materials)): ?>
<section class="py-5" id="video">
    <div class="container">
        <!-- Section Heading -->
        <?php if (!empty($headingData)): ?>
        <div class="text-center mb-4">
            <p><?= htmlspecialchars($headingData['video_section_name']) ?></p>
            <h1><?= htmlspecialchars($headingData['video_head']) ?></h1>
        </div>
         <?php endif; ?>
        <!-- Display Only One Video -->
        <?php $material = reset($materials); // Get the first video from the array ?>
        <div class="video-wrapper">
            <?php if (!empty($material['video_file'])): ?>
                <div class="video-container">
                    <iframe 
                        src="<?= htmlspecialchars($material['video_file']) ?>" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">No video available.</p>
            <?php endif; ?>
        </div>

        <!-- Video Title -->
        <div class="text-center mt-3">
            <h5 class="card-title"><?= htmlspecialchars($material['btn_name'] ?? "No Title") ?></h5>
        </div>
    </div>
</section>
<?php endif; ?>



<!-- key features -->
<?php if (!empty($features)): ?>
<section class="py-5">
    <div class="container">
            <?php if (!empty($headingData)): ?>
            <div class="text-center">
                <p><?= htmlspecialchars($headingData['key_section_name']) ?></p>
                <h1><?= htmlspecialchars($headingData['key_head']) ?></h1>
            </div>
            <?php endif; ?>
        <div class="row py-5">
            <?php foreach ($features as $feature): ?>
            <div class="col-md-4 pt-3 similar_projects">
                <div class="card shadow border-0 p-5 key_feature">
                    <div class="text-center">
                        <!-- <p><i class="fa-solid fa-check" style="font-size: 60px;"></i></p> -->
                        <p class="key_icon"><?= $feature['icon_html'] ?></p>
                        <h3><?= htmlspecialchars($feature['key_heading']) ?></h3>
                        <p><?= htmlspecialchars($feature['key_describ']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        
    </div>
</section>
<?php endif; ?>

<!-- contact form 3 -->
<?php if (!empty($settings) && $settings['section3_show']): ?>
<section class="py-5 contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 pt-3 contact_img">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="<?= !empty($settings['section3_image']) ? "/admin/" . $settings['section3_image'] : '/asset/image/default.jpg'; ?>" class="contact_image img-fluid" alt="Middle Section Image">
                    </div>
                    <!--<div class="text-light">-->
                    <!--    <h3 class="text-justify contact_text">-->
                    <!--        <?= htmlspecialchars($settings['section3_text'] ?? 'Default Middle Section Text') ?>-->
                    <!--    </h3>-->
                    <!--    <p class="float-end">-->
                    <!--        <a class="text-decoration-none text-light" href="tel:<?= htmlspecialchars($settings['section3_contact'] ?? 'Default Middle Section Text') ?>"><i class="fa-solid fa-phone-flip"></i> <?= htmlspecialchars($settings['section3_contact'] ?? 'Default Middle Section Text') ?></a>-->
                    <!--    </p>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
               <!-- Inquiry Form -->
            <form id="inquiryForm4" action="process_form.php" method="post" onsubmit="return executeRecaptcha('inquiryForm4', 'recaptchaResponse4', 'form4');">
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse4">
                <input type="hidden" name="form_type" value="form4">
                <input type="hidden" name="slug" value="<?= htmlspecialchars($slug); ?>">
            
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-text">+91</span>
                        <input type="text" class="form-control" name="phone" >
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="8"></textarea>
                </div>
                
                
            
                <button type="submit" class="talk-btn w-100">Submit</button>
            </form>
            
            

            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- footer -->
<footer class=" py-4">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Explore Section -->
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold footer_head">EXPLORE</h5>
                <ul class="list-unstyled pt-3">
                    <li><a href="https://roongtagroup.co.in/pages/about-us/" target="_blank" class="text-decoration-none text-dark">About</a></li>
                    <li><a href="https://roongtagroup.co.in/blogs-list/" target="_blank" class="text-decoration-none text-dark">Blog</a></li>
                </ul>
            </div>

            <!-- Others Section -->
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold footer_head">OTHERS</h5>
                <ul class="list-unstyled pt-3">
                    <li><a href="https://roongtagroup.co.in/pages/terms-and-condition/" target="_blank" class="text-decoration-none text-dark">Terms and Conditions</a></li>
                    <li><a href="https://roongtagroup.co.in/pages/privacy-policy/" target="_blank" class="text-decoration-none text-dark">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <h5 class="fw-bold footer_head">CONTACT</h5>
                <ul class="list-unstyled pt-3">
                    <li>
                        <?= !empty($contactData['address']) ? htmlspecialchars($contactData['address']) : '9th Floor, Roongta Supremus, Near Chandak Circle, Shri Hari Narayan Kute Marg, Tidke Colony, Nashik, Maharashtra 422002' ?>
                    </li>

                    <li class="pt-3">
                        <a href="mailto:<?= !empty($contactData['email']) ? htmlspecialchars($contactData['email']) : 'Connect@roongtagroup.co.in' ?>" class="text-decoration-none text-dark">
                        <span class="footer_head"><i class="fa-regular fa-envelope"></i></span> 
                        <?= !empty($contactData['email']) ? htmlspecialchars($contactData['email']) : 'Connect@roongtagroup.co.in' ?>
                        </a>
                    </li>

                    <li> 
                        <a href="tel:<?= !empty($contactData['contact']) ? htmlspecialchars($contactData['contact']) : '+91 7770002222' ?>" class="text-decoration-none text-dark">
                            <span class="footer_head"><i class="fa-solid fa-phone"></i></span> 
                            <?= !empty($contactData['contact']) ? htmlspecialchars($contactData['contact']) : '+91 7770002222' ?>
                        </a>
                    </li>
                </ul>
                <!-- Social Icons -->
                <div class="social_icons mt-4">
                    
                    <a href="<?= !empty($contactData['youtube']) ? htmlspecialchars($contactData['youtube']) : 'https://www.youtube.com/channel/UCLNoZcZaje38XEfxrP8V48A' ?>" target="_blank"><i class="fa-brands fa-youtube fa-lg"></i></a>
                
                    <a href="<?= !empty($contactData['facebook']) ? htmlspecialchars($contactData['facebook']) : 'https://www.facebook.com/Roongtagroup' ?>" target="_blank"><i class="fa-brands fa-facebook fa-lg"></i></a>
                
                    <a href="<?= !empty($contactData['linkdin']) ? htmlspecialchars($contactData['linkdin']) : 'https://www.linkedin.com/in/lalit-roongta-group-22749310b/?original_referer=https%3A%2F%2Froongtagroup.co.in%2F' ?>" target="_blank"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                
                    <a href="<?= !empty($contactData['instagram']) ? htmlspecialchars($contactData['instagram']) : 'https://www.instagram.com/lalitroongtagroup/' ?>" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a>
                
                </div>
            </div>
        </div>

        <!-- Copyright Line -->
        <div class="row border-top mt-4 pt-3">
            <div class="col-md-12 col-sm-12 text-center">
                <p class="mb-0">© <span id="year"></span> 2025 LALIT ROONGTA GROUP - All rights reserved</p>
            </div>
            
        </div>
    </div>
</footer>

<?php ob_end_flush(); // Send output
?>


<!-- Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


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
$(document).ready(function(){
    $(".infra-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive:{
            0:{ items: 1 },
            768:{ items: 2 },
            1024:{ items: 3 }
        }
    });

    $(".plan-carousel").owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive:{
            0:{ items: 1 },
            768:{ items: 2 },
            1024:{ items: 3 }
        }
    });

    // Force Owl Carousel to refresh
    setTimeout(() => {
        $(".owl-carousel").trigger("refresh.owl.carousel");
    }, 500);
});
</script>


<script>
    //  script for open gallary image on full screen
    document.addEventListener("DOMContentLoaded", function() {
        Fancybox.bind("[data-fancybox='gallery']", {
            Toolbar: {
                display: [
                    "zoom",
                    "fullscreen",
                    "download",
                    "close"
                ]
            },
            Thumbs: {
                autoStart: true
            }
        });
    });



</script>
