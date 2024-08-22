<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adopt a Pet | PetPal</title>
  <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="/PetPal/style.css" />

</head>

<body>
  <header>
  <header>
    <?php include 'includes/header.php'; ?>
    </header>
  </header>

  <section class="page-section">
    <div class="container">
      <div class="row">
        <div class="filter-container col-lg-3 ">
          <div>
            <h4 style="margin-top: 30px; text-align: center;">Search Filters</h4>
            <form id="filter-form">
              <div class="form-group">
                <label for="pet-type">Pet Type</label>
                <select class="form-control" name="pet-type" id="pet-type">
                  <option value="">Select Pet Type</option>
                  <option value="cat">Cat</option>
                  <option value="dog">Dog</option>
                </select>

              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="breed">Breed</label>
                <select class="form-control" name="breed" id="breed">
                  <option value="">Select Breed</option>
                  <option value="labrador">Labrador</option>
                  <option value="pug">Pug</option>
                  <option value="bulldog">Bulldog</option>
                  <option value="beagle">Beagle</option>
                  <option value="germanshepherd">German Shepherd</option>
                  <option value="goldenretriever">Golden Retriever</option>
                  <option value="persian">Persian</option>
                  <option value="rottweiler">Rottweiler</option>
                  <option value="dalmatian">Dalmatian</option>
                  <option value="Scottishfold">Scottish Fold</option>
                  <option value="pomeranian">Pomeranian</option>
                  <option value="chihuahua">Chihuahua</option>
                  <option value="shih-tzu">Shih Tzu</option>
                  <option value="doberman">Doberman</option>
                </select>

              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <select class="form-control" id="age">
                  <option value="">Select age range</option>
                  <option value="1-5">1-5</option>
                  <option value="6-10">6-10</option>
                  <option value="11-15">11-15</option>
                </select>
              </div>
              <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" placeholder="Enter color">
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-9" style="padding-left: 30px;">
          <div class="row">
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage1.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Max</h5>
                  <p>Age: 7 Years</p>
                  <a href="/PetPal/petDetail.html" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage2.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Rocky</h5>
                  <p>Age: 4 Years</p>
                  <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage3.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Charlie</h5>
                  <p>Age: 1 Year</p>
                  <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage4.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Bella</h5>
                  <p>Age: 10 Years</p>
                  <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage5.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Coco</h5>
                  <p>Age: 5 Years</p>
                  <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 17rem">
                <img src="/PetPal/assets/images/cardImage6.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">Maggie</h5>
                  <p>Age: 9 Years</p>
                  <a href="/PetPal/application.php" class="btn btn-custom">Adopt Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sorting by <div class="row"> -->
    </div>
    <!--END  <div class="col-lg-9">-->

    </div>
    </div>
  </section>

  <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
    
  <script src="/PetPal/assets/js/jquery-3.7.1.min.js"></script>
  <script src="/PetPal/assets/js/popper.min.js"></script>
  <script src="/PetPal/assets/js/bootstrap.min.js"></script>
  <script src="/PetPal/assets/js/App.js"></script>
  <script src="/PetPal/assets/js/owl.carousel.min.js"></script>


</body>

</html>