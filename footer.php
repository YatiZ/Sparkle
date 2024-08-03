<style>
  footer {
    background-color: #36b9cc;
    color: #fff;
  }

  .footer-container {
    padding: 2rem;
  }

  .footer-container .social-media {
    margin-bottom: 1.5rem;
  }

  .footer-container .social-media span {
    margin-right: 1rem;
  }

  .footer-container .social-media a {
    color: #fff;
    margin-right: 1rem;
    font-size: 1.25rem;
  }

  .footer-container .map {
    width: 100%;
    height: 200px;
    border: 0;
    border-radius: 0.5rem;
  }

  .footer-container .text-reset {
    color: #fff;
  }

  .footer-container .text-reset:hover {
    color: #d0d0d0;
  }

  @media (max-width: 768px) {
    .footer-container {
      padding: 1rem;
    }

    .footer-container .map {
      height: 150px;
    }
  }
</style>

<footer class="text-center text-lg-start text-muted" data-bs-theme="dark">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom footer-container">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block social-media">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Right -->
    <div class="social-media">
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>

  <!-- Section: Links -->
  <section class="footer-container">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
          <p><a href="/Home.php" class="text-reset">Home</a></p>
          <p><a href="/Information.php" class="text-reset">Fashion Blogs</a></p>
          <p><a href="/Help.php" class="text-reset">Q & A</a></p>
          <p><a href="/Livestreaming.php" class="text-reset">Contact</a></p>
        </div>
        
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fa-solid fa-location-dot"></i> Company Location
          </h6>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50387.12702161721!2d-122.36823497832032!3d37.879111899999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80857ecf027d8dd7%3A0x12b2d505a961cbaf!2sREI!5e0!3m2!1sen!2smm!4v1698913813396!5m2!1sen!2smm"
            class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p><i class="fas fa-envelope me-3"></i> yati@example.com</p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05)">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="#">SparkleClothingStore.com</a>
  </div>
</footer>
