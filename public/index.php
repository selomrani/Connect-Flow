<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="public/assets/img/Gemini_Generated_Image_r99gq2r99gq2r99g.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<?php include __DIR__ . '/../src/templates/header.php'; ?>
<body>

    <div id="heroCarousel" class="carousel slide hero-section" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <div class="hero-overlay"></div> 
                <img src="assets/img/slide1.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 fw-bold mb-3">Welcome to Connect Flow</h1>
                    <p class="lead mb-4">Streamline your communication effortlessly.</p>
                    
                    <div class="hero-btns">
                        <a href="#contact" class="btn btn-hero-primary">Get Started</a>
                        <a href="#about" class="btn btn-hero-outline">About Us</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-overlay"></div>
                <img src="assets/img/slide2.png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 fw-bold mb-3">Connect Faster</h1>
                    <p class="lead mb-4">Our tools bridge the gap between you and your clients.</p>
                    
                    <div class="hero-btns">
                        <a href="#contact" class="btn btn-hero-primary">Get Started</a>
                        <a href="#about" class="btn btn-hero-outline">About Us</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-overlay"></div>
                <img src="assets/img/slide3.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 fw-bold mb-3">Secure & Reliable</h1>
                    <p class="lead mb-4">Trust us to handle your data with care.</p>
                    
                    <div class="hero-btns">
                        <a href="#contact" class="btn btn-hero-primary">Get Started</a>
                        <a href="#about" class="btn btn-hero-outline">About Us</a>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>