<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php @include 'header.php'; ?>

    <section class="home">

        <div class="content">

            <h3>Green Home</h3>
            <p>Bring Home Green</p>
            <a href="about.php" class="btn">discover more</a>
        </div>

    </section>


    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-70a4d70 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="70a4d70" data-element_type="section"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-41aba39"
                data-id="41aba39" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-4c4cf82 elementor-widget elementor-widget-heading"
                        data-id="4c4cf82" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">Setting up Medicinal Plant Garden
                            </h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-c2fb0dd elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                        data-id="c2fb0dd" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p>Discover Healing Spaces with GardenMaster: Transforming available spaces at Ayurveda
                                Hospitals, Resorts, Gardens of Doctors,
                                Vaidyas, and Medicinal Plant Enthusiasts to a stunning, healing and energizing Medicinal
                                Plant Garden</p>
                            <p>Step into a world of


                                healing and rejuvenation with GardenMaster’s specialized Medicinal Plant Garden service.
                                Tailored to meet the unique needs of Ayurveda h
                                ospitals, resorts, doctors, Vaidyas, and devoted medicinal plant enthusiasts, our
                                gardens nurture a natural connection between body,
                                mind, and soul.</p>
                            <p><span style="text-decoration: underline;"><strong>Why Choose GardenMaster for Your
                                        Medicinal Plant Garden?</strong>
                                </span></p>
                            <p><em><strong>1. Ayurveda Aligned Gardens:</strong></em> With a deep understanding of
                                Ayurvedic principles, our gardens are
                                designed to complement your healing practices, creating harmonious environments for
                                wellness.</p>
                            <p><em><strong>2. Wide Range of
                                        Medicinal Plants:</strong></em> Unearth an exquisite selection of rare and
                                authentic medicinal plants, each chosen for its potent
                                therapeutic properties. From traditional Ayurvedic herbs to unique botanical treasures,
                                our diverse range suits your specific needs.
                            </p>
                            <p><em><strong>3. Customized Designs:</strong> </em>We bring your vision to life with
                                precision and care. Whether you seek a
                                serene healing garden for your resort or a therapeutic oasis for your Ayurveda hospital,
                                our tailored designs leave an indelible
                                impact.</p>
                            <p><em><strong>4. Professional Consultation:</strong></em> Our horticulturists and Ayurveda
                                experts offer comprehensive
                                guidance, empowering you with insights into plant selection, placement, and garden
                                maintenance to optimize your healing garden.</p>
                            <p><em><strong>5. Excellence in Execution:</strong></em> Our skilled gardeners ensure your
                                garden flourishes under meticulous care.
                                From soil preparation to planting and ongoing support, we ensure a thriving oasis of
                                wellness.</p>
                            <p>
                                <span style="text-decoration: underline;"><strong>Service Availability and Contact
                                        Information</strong></span>
                            </p>
                            <p>Our specialized Medicinal Plant Garden service extends to Ayurveda hospitals, resorts,
                                doctors, Vaidyas, and medicinal plant
                                enthusiasts. Elevate your healing environment – connect with us today!</p>
                            <p><span style="text-decoration: underline;"><strong>
                                        Contact Information:</strong></span></p>
                            <p>Call/WhatsApp: +91 90762 61062 <br>Email: ajit@gmail.com</p>
                            <p>Elevate Healing
                                Environments with plant Store</p>
                            <p>Unleash the transformative potential of nature’s botanical wonders with GardenMaster.
                                Embrace the essence of Ayurveda and cultivate sanctuaries of wellness and rejuvenation
                                that foster lasting harmony and
                                well-being. Connect with us now and embark on a journey of healing and growth through
                                our specialized garden service.
                                Happy gardening and healing!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="home-contact">

        <div class="content">
            <h3>have any questions?</h3>
            <p>Use the below button to send a message to us</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

    </section>

    <section class="our-locations">
        <div class="our-loc-cont">
            <div class="left-col">
                <div class="our-location-cont">
                    <h5>Our Store</h5>
                    <p style="margin-bottom: 20px">Mithaghar Rd, Jaihind Colony, LIC Housing Colony, Mulund East,
                        Mumbai, Maharashtra 400081</p>
                    <p>Mon - Sat : 10:00am - 7:00pm<br />Sunday: Closed</p>
                    <a class="green-btn" target="_blank" href="https://maps.app.goo.gl/QSnBwWMNt2k5wkai9">Get
                        Direction</a>
                </div>
            </div>
            <div class="right-col">
                <a href="https://maps.app.goo.gl/QSnBwWMNt2k5wkai9" target="_blank">
                    <img src="./images/cont-map.png" alt="map-image">
                </a>
            </div>
        </div>
    </section>




    <?php @include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>