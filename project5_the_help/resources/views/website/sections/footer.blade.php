<style>
    /* Facebook icon color */
    .footer-menu .facebook-link i {
        color: #1877F2;
        /* Facebook blue */
        font-size: 1.5rem;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .footer-menu .facebook-link i:hover {
        transform: scale(1.2);
        color: #145DBF;
        /* Slightly darker blue */
    }

    /* Instagram icon gradient */
    .footer-menu .instagram-link i {
        font-size: 1.5rem;
        background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF, #515BD4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: transform 0.3s ease;
    }

    .footer-menu .instagram-link i:hover {
        transform: scale(1.2);
        filter: brightness(1.2);
    }
</style>

<footer id="footer" class=" bg-gray" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);">
    <div class="container pt-5 pb-2">
        <div class="row flex-wrap justify-content-between">
            <div class="col-lg-2 col-md-6 col-sm-6 pb-3">
                <div class="footer-menu">
                    <h6 class="widget-title pb-2 fw-semibold">The help</h6>
                    <ul class="menu-list d-flex flex-column list-unstyled">
                        <li class="pb-2">
                            <a href="{{ route('website.about.index') }}">About Us</a>
                        </li>
                        <li class="pb-2">
                            <a href="{{ route('website.login.provider') }}" style="color: orange;">Become a provider</a>
                        </li>
                        <li class="pb-2">
                            <a href="{{ route('website.services.index') }}">Our Services</a>
                        </li>
                        <li class="pb-2">
                            <a href="{{ route('website.contact.index') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                <div class="footer-menu">
                    <h6 class="widget-title pb-2 fw-semibold">More Services Coming Soon!</h6>
                    <p>Get ready for additional cleaning services. Stay tuned for updates!</p>
                    <a class="navbar-brand text-center" href="{{ route('website.index') }}">
                        <img src="{{ asset('assetts/images/logo-png.png') }}" 
                             class="logo img-fluid text-center pt-4" 
                             style="height: 130px; width: auto; object-fit: contain;">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                <div class="footer-menu">
                    <h6 class="widget-title pb-2 fw-semibold">Get in Touch</h6>
                    <p>We’d love to hear from you! Connect with us for inquiries, updates, or support.</p>
                    <h5 class="text-capitalize fw-light mt-3">Follow Us:</h5>
                    <div class="social-links d-flex gap-3 mt-2 text-center">
                        <a href="https://www.facebook.com" target="_blank" class="facebook-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="instagram-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                <div class="footer-menu">
                    <div class="map-container">
                        <h6 class="widget-title pb-2 fw-semibold">Our Location</h6>
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="150" src="https://maps.google.com/maps?q=32.015049,35.923891&t=&z=14&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                        <p class="mt-2 text-muted">Visit us at our office or find us on the map above for assistance.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-gray" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);">
        <div class="container footer-bottom text-center py-4">
            <p class="mb-0">
                © <span id="current-year"></span> <span style="color: blue;">THE HELP</span> - All rights reserved
            </p>
        </div>
    </div>
</footer>

<script>
document.getElementById('current-year').textContent = new Date().getFullYear();
</script>