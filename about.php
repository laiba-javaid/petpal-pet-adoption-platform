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
    <link rel="stylesheet" href="/PetPal/style.css" />
  </head>

  <body>
    <!--NavBar-->
    <header>
    <header>
    <?php include 'includes/header.php'; ?>
    </header>
    </header>


    <!--Main Content-->
    <main>
      
      <!--About Section-->
      <section id="about-section">
        <div class="container">
          <div class="row">
            <div class="content col-lg-6">
              <h1>About PetPal</h1>
              <p>
                Welcome to PetPal, your premier pet adoption platform dedicated
                to connecting loving pet owners with adorable pets in need of
                forever homes across world. At PetPal, we are passionate about
                connecting caring individuals with adorable pets in need of
                loving homes. Our platform serves as a bridge between
                compassionate pet seekers and pets awaiting their forever
                families, making the adoption process seamless and rewarding for
                both parties.
              </p>
              <button id="teamButton" class="btn btn-custom">View Team</button>
            </div>
          </div>
        </div>
      </section>


      <!--Mission Section-->
      <section
        id="mission-section"
        style="background-color: #f0f0f0; margin-top: 20px"
      >
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h2 style="margin-bottom: 10px; color: rgb(63, 59, 59)">
                Our Mission
              </h2>
              <p>
                At PetPal, we are on a mission to make pet adoption accessible,
                convenient, and joyful for both pets and their new families. Our
                goal is to reduce pet homelessness and promote responsible pet
                ownership by facilitating successful adoptions and providing
                support throughout the adoption process.
              </p>
            </div>
          </div>
        </div>
      </section>


      <!--Values Section-->
      <section id="values-section">
        <div class="container-fluid">
          <h2 id="values">Our Values</h2>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img
                  src="/PetPal/assets/images/Compassion.png"
                  class="card-img-top"
                  alt="Compassion icon"
                />
                <div class="card-body">
                  <h5 class="card-title">Compassion</h5>
                  <p class="card-text">
                    At our pet adoption platform, compassion lies at the heart
                    of everything we do. We believe in treating every animal
                    with kindness, empathy, and respect. Whether it's a playful
                    puppy, a senior cat, or a special-needs pet, we are
                    committed to providing them with the love and care they
                    deserve.
                  </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img
                  src="/PetPal/assets/images/Transparency.png"
                  class="card-img-top"
                  alt="Transparency icon"
                />
                <div class="card-body">
                  <h5 class="card-title">Transparency</h5>
                  <p class="card-text">
                    Transparency is a fundamental value that guides our
                    operations and interactions. From providing accurate
                    information about each pet's history and needs to being
                    transparent about our adoption process and fees, we strive
                    to build trust and confidence among our community members.
                  </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img
                  src="/PetPal/assets/images/Collaboration.png"
                  class="card-img-top"
                  alt="Collaboration icon"
                />
                <div class="card-body">
                  <h5 class="card-title">Collaboration</h5>
                  <p class="card-text">
                    Collaboration is key to achieving our mission of finding
                    loving homes for every pet in need. We recognize the
                    importance of working together with animal shelters, rescue
                    groups, volunteers, and other stakeholders to make a
                    positive impact on pet adoption and welfare. 
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Team Section-->
      <section id="team-section">
        <div class="container-fluid" style="min-height: 800px">
          <h2>Meet Our Team</h2>
          <div class="row row-cols-1 g-4">
            <div class="col-md-6">
              <div class="card h-100">
                <img
                  src="/PetPal/assets/images/Laiba.png"
                  class="card-img-top"
                  alt="Compassion icon"
                />
                <div class="card-body">
                  <h5 class="card-title">Laiba Javaid</h5>
                  <p class="card-text">
                    Laiba is a determined and detail-oriented software
                    engineering student who excels in problem-solving and
                    project management. With her strong technical skills and
                    analytical mindset, plays a crucial role in the development
                    and implementation of PetPal's digital platform. She is
                    dedicated to ensuring that our technology operates
                    seamlessly, providing users with a smooth and efficient
                    experience.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100">
                <img
                  src="/PetPal/assets/images/Nimra.png"
                  class="card-img-top"
                  alt="Transparency icon"
                />
                <div class="card-body">
                  <h5 class="card-title">Nimra Tahir</h5>
                  <p class="card-text">
                    Nimra is a diligent and creative software engineering
                    student with a keen eye for design and user experience. She
                    specializes in creating intuitive interfaces that enhance
                    user engagement and satisfaction. Nimra's passion for
                    animals drives her commitment to developing innovative
                    solutions that facilitate pet adoption and improve the lives
                    of furry companions.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--CTA Section-->
      <section id="cta-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h2>Ready to Find Your New Best Friend?</h2>
              <p>
                Start your pet adoption journey with PetPal today and give a
                deserving pet the loving home they've been waiting for. Browse
                our available pets, learn more about their stories, and connect
                with our adoption partners to find your perfect match. Together,
                we can make a difference in the lives of pets and their new
                families.
              </p>

              <a href="/PetPal/adopt.php" class="btn btn-custom">Adopt a Pet</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
    <!--JQuery Link-->
    <script src="/PetPal/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/PetPal/assets/js/popper.min.js"></script>
    <script src="/PetPal/assets/js/bootstrap.min.js"></script>
    <script src="/PetPal/assets/js/App.js"></script>
  </body>
</html>
