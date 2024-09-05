<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adopt a Pet | PetPal</title>
  <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="/PetPal/style.css" />
  <style>
    .pet-listing-container {
    display: flex;
    flex-direction: column;
}

.pet-listing-container .row {
    display: flex;
    flex-wrap: wrap;
}

.pet-listing-container .col-md-4 {
    margin-bottom: 20px;
}

  </style>
</head>

<body>
  <header>
    <?php include 'includes/header.php'; ?>
  </header>
  <section class="page-section">
    <div class="container">
      <div class="row">
        <div class="filter-container col-lg-3 ">
          <div>
            <h4 style="margin: 30px auto; text-align: center;">Search Filters</h4>
            <form id="filter-form">
              <!-- Filter form fields here -->            
              <div class="form-group">
                <label for="pet-type">Pet Type</label>
                <select class="form-control" name="pet-type" id="pet-type">
                  <option value="">Select Pet Type</option>
                  <option value="cat" <?= isset($_GET['pet-type']) && $_GET['pet-type'] == 'cat' ? 'selected' : ''; ?>>Cat</option>
                  <option value="dog" <?= isset($_GET['pet-type']) && $_GET['pet-type'] == 'dog' ? 'selected' : ''; ?>>Dog</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
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
                <select class="form-control" id="age" name="age">
                  <option value="">Select age range</option>
                  <option value="1-5">1-5</option>
                  <option value="6-10">6-10</option>
                  <option value="11-15">11-15</option>
                </select>
              </div>
              <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Enter color">
              </div>  
              <div class="text-center">
              &nbsp&nbsp&nbsp<button type="submit" class="btn btn-custom" style="font-size: 18px; padding: 10px 24px; margin: auto;  color: white; border: none; border-radius: 25px; cursor: pointer;">Search</button>      
              </div>
            </form>
          </div>
        </div>

        <div class="pet-listing-container col-lg-9" style="padding-left: 30px;">
          <div class="row">
          <?php
                        // Include your database connection
                        include 'db_connection.php';

                        // Check if the type parameter is set, and sanitize it
                        $type = isset($_GET['type']) ? $_GET['type'] : '';

                     if ($type) {
                    // Fetch pets of the specified type
                   $stmt = $conn->prepare("SELECT * FROM pets WHERE pet_type = ?");
                    $stmt->bind_param("s", $type);
}                  else {
                  // Fetch all pets
                  $stmt = $conn->prepare("SELECT * FROM pets");
}

$stmt->execute();
$result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-md-4">';
                                echo '<div class="card" style="width: 17rem">';
                                $imagePath = "/PetPal/assets/images/" . $row['image'];
                                echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $row['name'] . '" />';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                                echo '<p>Age: ' . $row['age'] . ' Years</p>';
                                echo '<a href="/PetPal/petDetail.php?id=' . $row['id'] . '" class="btn btn-custom">View Details</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No pets available for adoption at the moment.</p>';
                        }

                        $stmt->close();
                        $conn->close();
          ?>
          </div>
        </div>
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
  <script>
$(document).ready(function() {
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
    url: 'filter_pets.php',
    method: 'GET',
    data: $(this).serialize(),
    success: function(data) {
        $('.pet-listing-container').html(data);  // Ensure only the pets are updated within the row
    },
    error: function() {
                // Optionally handle errors
                alert('An error occurred while filtering pets.');
            }
});
    });
});

</script>

</body>

</html>















