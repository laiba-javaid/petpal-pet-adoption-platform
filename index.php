<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetPal-Pet Adoption Platform</title>
    <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link href="/PetPal/style.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
   
    <link
      href="/PetPal/assets/css/owl.carousel.min.css"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>
    <!--NavBar-->
    <header>
    <?php include 'includes/header.php'; ?>
    </header>
      <div
        id="carouselExampleInterval"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active c-item" data-bs-interval="10000">
            <div class="mx-auto">
              <img
                src="/PetPal/assets/images/FirstSlide (1).png"
                class="d-block w-100 c-img"
                alt="PetPicture-Adopt don't shop"
              />
              <div class="carousel-caption d-md-block">
                <!-- Heading content -->
                <h1 class="headingFirstSlide display-2 fw-bold">
                  Adopt. <span>Don't Shop.</span>
                </h1>
                <p class="carouselPara">Find your new furry friend today!</p>               
                  <a href="/PetPal/adopt.php" class="btn btn-custom">Adopt Now</a>                
              </div>
            </div>
          </div>
          <div class="carousel-item c-item" data-bs-interval="2000">
            <img
              src="/PetPal/assets/images/SecondSlide (3).png"
              class="d-block w-100 c-img"
              alt="PetPicture, asking not only humans need a house "
            />
            <div class="carousel-caption d-md-block">
              <h1 class="headingSecondSlide display-2">
                Not only people<span>need a house.</span>
              </h1>
            </div>
          </div>
          <div class="carousel-item c-item">
            <img
              src="/PetPal/assets/images/ThirdSlide (4).png"
              class="d-block w-100 c-img"
              alt="Pet seeking colour to their life"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    
    <!--End NavBar-->

    <main>
      <!--Welcome Section-->
      <section id="welcome-section">
        <div class="row welcome">
          <div class="imgWrapper">
            <img
              src="/PetPal/assets/images/welcomeSectionImg.png"
              alt="Cat & Dog Picture"
            />
          </div>
          <div class="contentWrapper">
            <div class="content">
              <span class="textWrapper">
                <span>Quality & Experience</span>
              </span>
              <h2><span>Welcome</span> to PetPal</h2>
              <p>
                Welcome to Pet Pal, where your journey to finding the perfect
                furry companion begins! With our intuitive platform, you'll
                discover a wealth of adorable pets waiting to become part of
                your family. From playful pups to cuddly kittens, each profile
                is filled with heartwarming details to help you make the perfect
                match. Welcome to Pet Pal - where love knows no bounds!
              </p>
              <button class="btn btn-custom">Welcome</button>
              <p id="welcome-message">
                Welcome to PetPal! We're glad you're here.
              </p>
            </div>
          </div>
        </div>
      </section>
<!--How it Works Section-->
      <section id="how-it-works">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h2>How it <span>Works</span></h2>
              <div class="process-wrapper">
                <div id="progress-bar-container">
                  <div class="line">
                    <div class="circle circle-start"></div>
                    <div class="circle circle-middle"></div>
                    <div class="circle circle-end"></div>
                    <div class="line-process"></div>
                  </div>
                  <ul>
                    <li class="step step01">
                      <div class="step-inner">
                        <h3>Find Your Pet</h3>
                        <p>Select a pet from our adoption list.</p>
                      </div>
                    </li>
                    <li class="step step02">
                      <div class="step-inner">
                        <h3>Know Your Pet</h3>
                        <p>Schedule a visit with the chosen one.</p>
                      </div>
                    </li>
                    <li class="step step03">
                      <div class="step-inner">
                        <h3>Take Your Pet Home</h3>
                        <p>Follow the adoption process.</p>
                      </div>
                    </li>
                  </ul>

                  <div id="progress-content-section"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!--Pet Gallery Carousel Cards-->
      <section id="pet-gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2>Our Friends</h2>
              <p>Who are looking for a house</p>
            </div>
            <div class="col-lg-auto custom-width">
              <div class="owl-carousel slider_carousel">
                <div class="card" style="width: 20rem">
                  <img
                    src="/PetPal/assets/images/cardImage1.png"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">Max</h5>
                    <a href="#" class="btn btn-custom">Learn More</a>
                  </div>
                </div>
                <div class="card" style="width: 20rem">
                  <img
                    src="/PetPal/assets/images/cardImage2.png"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">Rocky</h5>
                    <a href="#" class="btn btn-custom">Learn More</a>
                  </div>
                </div>
                <div class="card" style="width: 20rem">
                  <img
                    src="/PetPal/assets/images/cardImage3.png"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">Charlie</h5>
                    <a href="#" class="btn btn-custom">Learn More</a>
                  </div>
                </div>
                <div class="card" style="width: 20rem">
                  <img
                    src="/PetPal/assets/images/cardImage4.png"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">Bella</h5>
                    <a href="#" class="btn btn-custom">Learn More</a>
                  </div>
                </div>
                <div class="card" style="width: 20rem">
                  <img
                    src="/PetPal/assets/images/cardImage5.png"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">Coco</h5>
                    <a href="#" class="btn btn-custom">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <a href="/PetPal/adopt.php" class="btn btn-custom know-all-pets"
                >Get to know the rest</a
              >
            </div>
          </div>
        </div>
      </section>
<!--Our Impact Section-->
      <section id="our-impact">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2>Our <span>Impact</span></h2>
            </div>
            <div class="col-lg-4">
              <div class="impact-card">
                <div class="card-icon">
                  <i class="bi bi-people"></i>
                </div>
                <div class="card-content">
                  <h3>1000+</h3>
                  <p>Happy Families</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="impact-card">
                <div class="card-icon">
                  <i class="bi bi-heart"></i>
                </div>
                <div class="card-content">
                  <h3>500+</h3>
                  <p>Happy Pets</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="impact-card">
                <div class="card-icon">
                  <i class="bi bi-bag-check"></i>
                </div>
                <div class="card-content">
                  <h3>75+</h3>
                  <p>Cooperation with</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Modal-->
      <div
        class="modal fade"
        id="imageModal"
        tabindex="-1"
        aria-labelledby="imageModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <img src="" class="img-fluid" id="modalImage" alt="Modal Image" />
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--Main End-->

    <!--Footer-->
    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
    <!--End Footer-->

    <!--JQuery Link-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/App.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script>
      function slider_carouselInit() {
        $(".owl-carousel.slider_carousel").owlCarousel({
          dots: false,
          loop: true,
          margin: 30,
          stagePadding: 2,
          autoplay: true,
          nav: true,
          navText: [
            "<i class='fas fa-arrow-left'></i>",
            "<i class='fas fa-arrow-right'></i>",
          ],
          autoplayTimeout: 1500,
          autoplayHoverPause: true,
          responsive: {
            0: {
              items: 1,
              nav: true,
            },
            800: {
              items: 1,
              nav: true,
            },
            960: {
              items: 2,
              nav: true,
            },
            1400: {
              items: 3,
            },
          },
        });
      }
      slider_carouselInit();
    </script>
  </body>
</html>
