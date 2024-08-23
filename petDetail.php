<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Description | PetPal</title>
    <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="/PetPal/style.css"/>
</head>
<body>
    <header>
    <?php include 'includes/header.php'; ?>
      </header>
      
      <div class="container-fluid" >
        <div class="row">
          <div class="col-lg-6 pet-image" style="background-color: white; margin: 0px;">
            <img src="/PetPal/assets/images/cardImage1.png" alt="dog1" class="img-fluid">
          </div>
          <div class="col-lg-6 pet-details" style="background-color: white;">
            <h2>Max</h2>
            <div class="pet-detail">
              <h4>About</h4><br>
              <h6 style="display: inline;">Breed: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;">Golden Retriever</p><br><br>
              <h6 style="display: inline;">Colour:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;">Brown, Light Brown</p><br><br>
              <h6 style="display: inline;">Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;">7 Years</p><br><br>
              <h6 style="display: inline;">Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;">Female</p><br><br>
              <h6 style="display: inline;">Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;">Large (20-25kg)</p><br><br>
              <h6 style="display: inline;">Vaccinated:&nbsp;&nbsp;</h6><p style="display: inline;">Yes</p><br><br>
              <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
            </div>
      </div>
    
      <div class="container description">
<h2>Description</h2>
<p>Max is a 3 year old Golden Retriever. He is very friendly and loves to play. He is looking for a loving
  family who can take care of him. He is vaccinated and neutered. He is also house trained, which means he has been trained to behave appropriately in a home environment, such as knowing where and when to eliminate.</p>

  <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/App.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
</body>
</html>
