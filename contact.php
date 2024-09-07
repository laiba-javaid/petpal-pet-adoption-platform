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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
              <form class="form" action="process_contact.php" id="contactForm" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required/>
                <label for="name"><i class="bi bi-person-fill mx-3"></i>Full Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required/>
              <label for="email"><i class="bi bi-envelope-fill mx-3"></i>Email Address</label>
              </div>
              <div class="form-floating mb-3">
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telephone" required/>
              <label for="phone"><i class="bi bi-telephone-fill mx-3"></i>Telephone</label>
            </div>
            <div class="form-floating mb-3">      
              <label for="message-type"><i class="bi bi-crosshair2 mx-3"></i>What is your enquiry about?</label>
              <select name="message_type" class="form-control" id="message-type" required>
              <option value=""></option>
              <option value="pet-listings">Pet Listings</option>
              <option value="technical-questions">Technical Questions</option>
              <option value="shelter-rescue">Concerns regarding shelter/rescue</option>
              <option value="shelter-rescue-members">Registered shelter/rescue members</option>
              <option value="other">Other requests</option>
              </select>
            </div>
 
            <div class="form-floating mb-3">
            <textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea>
            <label for="message"><i class="bi bi-chat-left-fill mx-3"></i>Message</label>
            </div>
            <button type="submit" class="btn btn-custom">Send Message</button>
        </form>

            </div>
  
          </div> 
        </section>
        
         <!-- Success Message Modal -->
         <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Message sent successfully!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
       </main>
       <script>
        $(document).ready(function() {
            $('#contactForm').submit(function(e) {
                e.preventDefault(); // Prevent form from submitting the default way
                var formData = $(this).serialize(); // Collect form data

                $.ajax({
                    type: 'POST',
                    url: 'process_contact.php',  // The PHP file handling the form submission
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Show the success modal
                            $('#successModal').modal('show');
                        } else {
                            alert(response.message);  // Handle errors here
                        }
                    },
                    error: function() {
                        alert('There was an error sending your message.');
                    }
                });
            });
        });
    </script>
    
    <script src="/PetPal/assets/js/bootstrap.min.js"></script>

    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
     
</body>
</html>