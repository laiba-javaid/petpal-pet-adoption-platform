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
    <?php include 'includes/header.php'; ?>
  </header>
  
  <section class="page-section">
    <div class="container">
      <div class="row">
        <!-- Filter Sidebar -->
        <div class="filter-container col-lg-3">
          <h4 style="margin: 30px auto; text-align: center;">Search Filters</h4>
          <form id="filter-form">
            <!-- Pet Type Filter -->
            <div class="form-group">
              <label for="pet-type">Pet Type</label>
              <select class="form-control" name="pet-type" id="pet-type">
                <option value="">Select Pet Type</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
              </select>
            </div>
            
            <!-- Name Filter -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>

            <!-- Breed Filter -->
            <div class="form-group">
              <label for="breed">Breed</label>
              <select class="form-control" name="breed" id="breed">
                <!-- Breed options here -->
                <option value="">Select Breed</option>
                <!-- Add your breed options here -->
              </select>
            </div>

            <!-- Age Filter -->
            <div class="form-group">
              <label for="age">Age</label>
              <select class="form-control" name="age" id="age">
                <option value="">Select Age Range</option>
                <option value="1-5">1-5</option>
                <option value="6-10">6-10</option>
                <option value="11-15">11-15</option>
              </select>
            </div>

            <!-- Color Filter -->
            <div class="form-group">
              <label for="color">Color</label>
              <input type="text" class="form-control" name="color" id="color" placeholder="Enter color">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-custom" style="font-size: 18px; padding: 10px 24px;">Search</button>
            </div>
          </form>
        </div>

        <!-- Pet Listing Section -->
        <div class="pet-listing-container col-lg-9" style="padding-left: 30px;">
          <div class="row">
          <?php
  include 'db_connection.php';

  // Check if 'pet-type' is passed in the URL
  $pet_type_filter = isset($_GET['pet-type']) ? $_GET['pet-type'] : '';

  // Initial query to fetch all pets
  $query = "SELECT * FROM pets WHERE 1=1";

  // Apply 'pet-type' filter if it's set and valid
  if (!empty($pet_type_filter) && ($pet_type_filter == 'dog' || $pet_type_filter == 'cat')) {
    // Escaping the input for security reasons
    $pet_type_filter = $conn->real_escape_string($pet_type_filter);
    $query .= " AND pet_type = '$pet_type_filter'";
  }

  // Prepare and execute the query
  $stmt = $conn->prepare($query);

  if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // Display pet card
        echo '<div class="col-md-4">';
        echo '<div class="card" style="width: 17rem;">';
        echo '<img src="/PetPal/assets/images/' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p>Age: ' . $row['age'] . ' years</p>';
        echo '<p>Breed: ' . $row['breed'] . '</p>';
        echo '<a href="/PetPal/petDetail.php?id=' . $row['id'] . '" class="btn btn-custom">View Details</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo '<p>No pets available for adoption at the moment.</p>';
    }

    $stmt->close();
  } else {
    // Output any SQL errors
    echo "Error: " . $conn->error;
  }

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

  <!-- JS and AJAX logic for filtering -->
  <script src="/PetPal/assets/js/jquery-3.7.1.min.js"></script>
  <script src="/PetPal/assets/js/popper.min.js"></script>
  <script src="/PetPal/assets/js/bootstrap.min.js"></script>
  <script src="/PetPal/assets/js/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: 'filter_pets.php', // You need a separate file for handling the filtered query
          method: 'GET',
          data: $(this).serialize(),
          success: function(data) {
            $('.pet-listing-container .row').html(data);  // Update pet listings inside the correct container
          },
          error: function() {
            alert('Error filtering pets. Please try again.');
          }
        });
      });
    });
  </script>
</body>
</html>
