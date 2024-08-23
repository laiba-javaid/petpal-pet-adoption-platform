<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPal-Pet Adoption Platform</title>
    <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="/PetPal/style.css" />
</head>
<body>
    
    <header>
    <?php include 'includes/header.php'; ?>
    </header>  
       <main>
        <!--Contact Us Header Img Section-->
        <section id="contact-section">
          <div class="container">
            <div class="row">
              <div class="content col-lg-12">
                <h1>Contact Us</h1>
                <p>
                  Have a question or need help? We are here to help you.
                </p>
              </div>
            </div>
          </div>
        </section>

        <!--Contact Us Form Section-->
        <section id="contact-form">
          <div class="row col-md-12 main">
            <div class="col-md-6 image-area">
              
              <img src="/PetPal/assets/images/petpal.png" alt="contact-img" style="border-radius: 30px; width: 400px; height: 400px;">
            </div>
            <div class="col-md-6 form-area">
              <div class="form-header mb-4">
                <h2 style="color: black;">Get in Touch with <span style="color: #9F522B;">Us!</span></h2>
              </div>
              <form class="form">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatInput" placeholder="Name" required/>
                  <label for="floatInput"><i class="bi bi-person-fill mx-3"></i>Full Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatInput" placeholder="Email Address" required/>
                  <label for="floatInput"><i class="bi bi-envelope-fill mx-3"></i>Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="tel" class="form-control" id="floatInput" placeholder="Telephone" required/>
                  <label for="floatInput"><i class="bi bi-telephone-fill mx-3"></i>Telephone</label>
                </div>
                <div class="form-floating mb-3">      
                  <label for="floatInput"><i class="bi bi-crosshair2 mx-3"></i>What is your enquiry about?</label>
                  <select name="message-type"
                   class="form-control" id="floatInput" placeholder="What is your enquiry about"  required>
                    <option value=""></option>
                    <option value="pet-listings">Pet Listings</option>
                    <option value="technical-questions">Technical Questions</option>
                    <option value="shelter-rescue">Concerns regarding shelter/rescue</option>
                    <option value="shelter-rescue-members">Resgistered shelter/rescue members</option>
                    <option value="other">Other requests</option>
                </select>
                </div>
                <div class="form-floating mb-3">
                  <textarea type="tel" class="form-control" id="floatInput" placeholder="Message" required></textarea>
                  <label for="floatInput"><i class="bi bi-chat-left-fill mx-3"></i>Message</label>
                </div>
                <button type="submit" class="btn btn-custom">Send Message</button>
              </form>
            </div>
  
          </div> 
        </section>    
       </main>

    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
     
</body>
</html>