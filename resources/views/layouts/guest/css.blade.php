<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-guest/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

<style>
    .navbar-brand img {
        max-height: 75px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .navbar-brand:hover img {
        transform: scale(1.03);
    }
    .btn-search {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .hero-header {
        background: #fffdf9;
    }
    .menu-filter-btn {
        border: 1px solid #d4a762;
        color: #d4a762;
        background: transparent;
        padding: 8px 22px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .menu-filter-btn:hover,
    .menu-filter-btn.active {
        background: #d4a762;
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(212, 167, 98, 0.35);
    }
    .menu-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #f0e9e1;
        box-shadow: 0 8px 24px rgba(0,0,0,0.04);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        height: 100%;
    }
    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(212, 167, 98, 0.18);
    }
</style>
