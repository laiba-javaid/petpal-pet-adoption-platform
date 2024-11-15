<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dashboard.css">
    
</head>
<body>
    <div class="d-flex">
        <!-- Include Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="col-md-9 content">
                <!-- Button to Show/Hide Add Pet Form -->
                <div class="mb-4 button-container">
                <div class="button-card">
                    <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#addPetForm" aria-expanded="false" aria-controls="addPetForm">
                        Add New Pet
                    </button>
                </div>
                <div class="button-card">
                    <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#petList" aria-expanded="false" aria-controls="petList">
                        View All Pets
                    </button>
                </div>
                <div class="button-card">
                    <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#searchPetsForm" aria-expanded="false" aria-controls="searchPetsForm">
                        Search Pets
                    </button>
                </div>
                </div>
           

            
            <!-- Add Pet Form (Initially Hidden) -->
            <div class="collapse" id="addPetForm">
            <div class="mb-4">
                <h2>Add New Pet</h2>
                <form action="add_pet.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
    <label for="breed" class="form-label">Breed</label>
    <select class="form-control" name="breed" id="breed" required>
        <!-- Breed options here -->
        <option value="">Select Breed</option>

        <!-- Cat category -->
        <optgroup label="Cats">
            <option value="Persian">Persian</option>
            <option value="Maine Coon">Maine Coon</option>
            <option value="Siamese">Siamese</option>
            <option value="Ragdoll">Ragdoll</option>
            <option value="Bengal">Bengal</option>
            <option value="British Shorthair">British Shorthair</option>
            <option value="Scottish Fold">Scottish Fold</option>
            <option value="Sphynx">Sphynx</option>
            <option value="Abyssinian">Abyssinian</option>
            <option value="American Shorthair">American Shorthair</option>
            <option value="Burmese">Burmese</option>
            <option value="Himalayan">Himalayan</option>
            <option value="Russian Blue">Russian Blue</option>
            <option value="Norwegian Forest Cat">Norwegian Forest Cat</option>
            <option value="Oriental Shorthair">Oriental Shorthair</option>
            <option value="Devon Rex">Devon Rex</option>
            <option value="Cornish Rex">Cornish Rex</option>
            <option value="Turkish Angora">Turkish Angora</option>
            <option value="Balinese">Balinese</option>
            <option value="Manx">Manx</option>
        </optgroup>

        <!-- Dog category -->
        <optgroup label="Dogs">
            <option value="Labrador Retriever">Labrador Retriever</option>
            <option value="German Shepherd">German Shepherd</option>
            <option value="Golden Retriever">Golden Retriever</option>
            <option value="Bulldog">Bulldog</option>
            <option value="Beagle">Beagle</option>
            <option value="Poodle">Poodle</option>
            <option value="Rottweiler">Rottweiler</option>
            <option value="Siberian Husky">Siberian Husky</option>
            <option value="Dachshund">Dachshund</option>
            <option value="Boxer">Boxer</option>
            <option value="Shih Tzu">Shih Tzu</option>
            <option value="Chihuahua">Chihuahua</option>
            <option value="Pomeranian">Pomeranian</option>
            <option value="Great Dane">Great Dane</option>
            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
            <option value="Doberman Pinscher">Doberman Pinscher</option>
            <option value="Australian Shepherd">Australian Shepherd</option>
            <option value="Cocker Spaniel">Cocker Spaniel</option>
            <option value="Border Collie">Border Collie</option>
            <option value="French Bulldog">French Bulldog</option>
        </optgroup>
    </select>
</div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age"  min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="pet_type" class="form-label">Type</label>
                        <select class="form-select" id="pet_type" name="pet_type" required>
                            <option value="cat">Cat</option>
                            <option value="dog">Dog</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <select class="form-select" id="size" name="size" required>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vaccinated" class="form-label">Vaccinated</label>
                        <select class="form-select" id="vaccinated" name="vaccinated" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="available">Available</option>
                                <option value="adopted">Adopted</option>
                                <option value="not_available">Not Available</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Add Pet</button>
                </form>
            </div>
</div>

            <!-- List Pets -->
          <div class="collapse" id="petList">
            <div class="my-5">
                <h2>Pet List</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Color</th>
                            <th>Type</th>
                            <th>Gender</th>
                            <th>Size</th>
                            <th>Vaccinated</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include database connection
                        include 'db_connection.php';

                        // Fetch pets from the database
                        $query = "SELECT * FROM pets ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $query);

                        while ($pet = mysqli_fetch_assoc($result)) {
                            // Determine the status class
                            $statusClass = '';
                            switch ($pet['status']) {
                                case 'available':
                                    $statusClass = 'status-available';
                                    break;
                                case 'adopted':
                                    $statusClass = 'status-adopted';
                                    break;
                                case 'not_available':
                                    $statusClass = 'status-not-available';
                                    break;
                            }
                            echo "<tr >";
                            echo "<td>{$pet['id']}</td>";
                            echo "<td>{$pet['name']}</td>";
                            echo "<td>{$pet['breed']}</td>";
                            echo "<td>{$pet['age']}</td>";
                            echo "<td>{$pet['color']}</td>";
                            echo "<td>{$pet['pet_type']}</td>";
                            echo "<td>{$pet['gender']}</td>";
                            echo "<td>{$pet['size']}</td>";
                            echo "<td>{$pet['vaccinated']}</td>";
                            echo "<td><div class='{$statusClass}'>{$pet['status']}</div></td>";
                            echo "<td><button class='btn btn-info btn-sm' onclick='viewPetDetails({$pet['id']})'>View Details</button></td>";                           
                            echo "<td class='actions-buttons'>
                                    <button class='btn btn-primary btn-sm' onclick='editPet({$pet['id']})'>Edit</button>
                                    <a href='delete_pet.php?id={$pet['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
         <!-- Add the modal code here, outside the loop -->
    <div class="modal fade" id="petDetailModal" tabindex="-1" aria-labelledby="petDetailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="petDetailModalLabel">Pet Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Pet details will be loaded here dynamically -->
            <table class="table table-bordered">
              <tr><th>ID</th><td id="pet-id"></td></tr>
              <tr><th>Name</th><td id="pet-name"></td></tr>
              <tr><th>Breed</th><td id="pet-breed"></td></tr>
              <tr><th>Age</th><td id="pet-age"></td></tr>
              <tr><th>Color</th><td id="pet-color"></td></tr>
              <tr><th>Type</th><td id="pet-type"></td></tr>
              <tr><th>Gender</th><td id="pet-gender"></td></tr>
              <tr><th>Size</th><td id="pet-size"></td></tr>
              <tr><th>Vaccinated</th><td id="pet-vaccinated"></td></tr>
              <tr><th>Status</th><td id="pet-status"></td></tr>
              <tr><th>Description</th><td id="pet-description"></td></tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal for editing a pet -->
<div class="modal fade" id="editPetModal" tabindex="-1" aria-labelledby="editPetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPetModalLabel">Edit Pet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="updateSuccessAlert" class="alert alert-success d-none" role="alert">
      Pet updated successfully!
      </div>
        <!-- Pet details will be loaded here dynamically -->
        <form action="edit_pet.php" method="POST" enctype="multipart/form-data">
          <!-- Hidden input to store the pet ID -->
          <input type="hidden" id="edit-pet-id" name="id">

          <!-- Pet Name -->
          <div class="mb-3">
            <label for="edit-pet-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit-pet-name" name="name" required>
          </div>

          <!-- Pet Breed -->
          <div class="mb-3">
            <label for="edit-pet-breed" class="form-label">Breed</label>
            <select class="form-select" id="edit-pet-breed" name="breed" required>
              <!-- Cat category -->
        <optgroup label="Cats">
            <option value="Persian">Persian</option>
            <option value="Maine Coon">Maine Coon</option>
            <option value="Siamese">Siamese</option>
            <option value="Ragdoll">Ragdoll</option>
            <option value="Bengal">Bengal</option>
            <option value="British Shorthair">British Shorthair</option>
            <option value="Scottish Fold">Scottish Fold</option>
            <option value="Sphynx">Sphynx</option>
            <option value="Abyssinian">Abyssinian</option>
            <option value="American Shorthair">American Shorthair</option>
            <option value="Burmese">Burmese</option>
            <option value="Himalayan">Himalayan</option>
            <option value="Russian Blue">Russian Blue</option>
            <option value="Norwegian Forest Cat">Norwegian Forest Cat</option>
            <option value="Oriental Shorthair">Oriental Shorthair</option>
            <option value="Devon Rex">Devon Rex</option>
            <option value="Cornish Rex">Cornish Rex</option>
            <option value="Turkish Angora">Turkish Angora</option>
            <option value="Balinese">Balinese</option>
            <option value="Manx">Manx</option>
        </optgroup>

        <!-- Dog category -->
        <optgroup label="Dogs">
            <option value="Labrador Retriever">Labrador Retriever</option>
            <option value="German Shepherd">German Shepherd</option>
            <option value="Golden Retriever">Golden Retriever</option>
            <option value="Bulldog">Bulldog</option>
            <option value="Beagle">Beagle</option>
            <option value="Poodle">Poodle</option>
            <option value="Rottweiler">Rottweiler</option>
            <option value="Siberian Husky">Siberian Husky</option>
            <option value="Dachshund">Dachshund</option>
            <option value="Boxer">Boxer</option>
            <option value="Shih Tzu">Shih Tzu</option>
            <option value="Chihuahua">Chihuahua</option>
            <option value="Pomeranian">Pomeranian</option>
            <option value="Great Dane">Great Dane</option>
            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
            <option value="Doberman Pinscher">Doberman Pinscher</option>
            <option value="Australian Shepherd">Australian Shepherd</option>
            <option value="Cocker Spaniel">Cocker Spaniel</option>
            <option value="Border Collie">Border Collie</option>
            <option value="French Bulldog">French Bulldog</option>
        </optgroup>              
            </select>
          </div>

          <!-- Pet Age -->
          <div class="mb-3">
            <label for="edit-pet-age" class="form-label">Age</label>
            <input type="number" class="form-control" id="edit-pet-age" name="age" min="0" required>
          </div>

          <!-- Pet Color -->
          <div class="mb-3">
            <label for="edit-pet-color" class="form-label">Color</label>
            <input type="text" class="form-control" id="edit-pet-color" name="color" required>
          </div>

          <!-- Pet Description -->
          <div class="mb-3">
            <label for="edit-pet-description" class="form-label">Description</label>
            <textarea class="form-control" id="edit-pet-description" name="description" rows="3" required></textarea>
          </div>

          <!-- Pet Type (Dog, Cat, etc.) -->
          <div class="mb-3">
            <label for="edit-pet-type" class="form-label">Type</label>
            <select class="form-select" id="edit-pet-type" name="pet_type" required>
              <option value="dog">Dog</option>
              <option value="cat">Cat</option>
              <!-- Add more pet types as necessary -->
            </select>
          </div>

          <!-- Pet Gender -->
          <div class="mb-3">
            <label for="edit-pet-gender" class="form-label">Gender</label>
            <select class="form-select" id="edit-pet-gender" name="gender" required>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>

          <!-- Pet Size -->
          <div class="mb-3">
            <label for="edit-pet-size" class="form-label">Size</label>
            <select class="form-select" id="edit-pet-size" name="size" required>
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="large">Large</option>
            </select>
          </div>

          <!-- Pet Vaccinated -->
          <div class="mb-3">
            <label for="edit-pet-vaccinated" class="form-label">Vaccinated</label>
            <select class="form-select" id="edit-pet-vaccinated" name="vaccinated" required>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>

          <!-- Pet Status -->
          <div class="mb-3">
            <label for="edit-pet-status" class="form-label">Status</label>
            <select class="form-select" id="edit-pet-status" name="status" required>
              <option value="available">Available</option>
              <option value="adopted">Adopted</option>
              <option value="not_available">Not Available</option>
            </select>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Update Pet</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <div class="collapse" id="searchPetsForm">
    <div class="my-5">
        <h2>Search Pets</h2>
        <form action="search_pets.php" method="get">
            <div class="mb-3">
                <label for="searchName" class="form-label">Name</label>
                <input type="text" class="form-control" id="searchName" name="name">
            </div>
            <div class="mb-3">
                <label for="searchBreed" class="form-label">Breed</label>
                <select class="form-control" name="breed" id="searchBreed">
        <!-- Breed options here -->
        <option value="">Select Breed</option>

        <!-- Cat category -->
        <optgroup label="Cats">
            <option value="Persian">Persian</option>
            <option value="Maine Coon">Maine Coon</option>
            <option value="Siamese">Siamese</option>
            <option value="Ragdoll">Ragdoll</option>
            <option value="Bengal">Bengal</option>
            <option value="British Shorthair">British Shorthair</option>
            <option value="Scottish Fold">Scottish Fold</option>
            <option value="Sphynx">Sphynx</option>
            <option value="Abyssinian">Abyssinian</option>
            <option value="American Shorthair">American Shorthair</option>
            <option value="Burmese">Burmese</option>
            <option value="Himalayan">Himalayan</option>
            <option value="Russian Blue">Russian Blue</option>
            <option value="Norwegian Forest Cat">Norwegian Forest Cat</option>
            <option value="Oriental Shorthair">Oriental Shorthair</option>
            <option value="Devon Rex">Devon Rex</option>
            <option value="Cornish Rex">Cornish Rex</option>
            <option value="Turkish Angora">Turkish Angora</option>
            <option value="Balinese">Balinese</option>
            <option value="Manx">Manx</option>
        </optgroup>

        <!-- Dog category -->
        <optgroup label="Dogs">
            <option value="Labrador Retriever">Labrador Retriever</option>
            <option value="German Shepherd">German Shepherd</option>
            <option value="Golden Retriever">Golden Retriever</option>
            <option value="Bulldog">Bulldog</option>
            <option value="Beagle">Beagle</option>
            <option value="Poodle">Poodle</option>
            <option value="Rottweiler">Rottweiler</option>
            <option value="Siberian Husky">Siberian Husky</option>
            <option value="Dachshund">Dachshund</option>
            <option value="Boxer">Boxer</option>
            <option value="Shih Tzu">Shih Tzu</option>
            <option value="Chihuahua">Chihuahua</option>
            <option value="Pomeranian">Pomeranian</option>
            <option value="Great Dane">Great Dane</option>
            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
            <option value="Doberman Pinscher">Doberman Pinscher</option>
            <option value="Australian Shepherd">Australian Shepherd</option>
            <option value="Cocker Spaniel">Cocker Spaniel</option>
            <option value="Border Collie">Border Collie</option>
            <option value="French Bulldog">French Bulldog</option>
        </optgroup>
    </select>
            </div>
            <div class="mb-3">
                <label for="searchType" class="form-label">Type</label>
                <select class="form-select" id="searchType" name="type">
                    <option value="">Select Type</option>
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<!-- Container for displaying pet cards -->
<div id="petCardsContainer" class="row my-5">
    <!-- Pet cards will be dynamically inserted here -->
</div>


<!-- JavaScript to handle view details functionality -->
    <script>
      function viewPetDetails(petId) {
        // Use AJAX to fetch pet details
        $.ajax({
          url: 'get_pet_details.php', // PHP file to get pet details
          type: 'GET',
          data: { id: petId },
          success: function(response) {
            var pet = JSON.parse(response);
            // Populate modal with pet details
            $('#pet-id').text(pet.id);
            $('#pet-name').text(pet.name);
            $('#pet-breed').text(pet.breed);
            $('#pet-age').text(pet.age);
            $('#pet-color').text(pet.color);
            $('#pet-type').text(pet.pet_type);
            $('#pet-gender').text(pet.gender);
            $('#pet-size').text(pet.size);
            $('#pet-vaccinated').text(pet.vaccinated);
            $('#pet-status').text(pet.status);
            $('#pet-description').text(pet.description);

            // Show the modal
            $('#petDetailModal').modal('show');
          }
        });
      }
  function editPet(petId) {
  // Use AJAX to fetch pet details
  $.ajax({
    url: 'get_pet_details.php', // PHP file to get pet details
    type: 'GET',
    data: { id: petId },
    success: function(response) {
      var pet = JSON.parse(response);
      
      // Populate the edit form fields with pet data
      $('#edit-pet-id').val(pet.id);
      $('#edit-pet-name').val(pet.name);
      $('#edit-pet-breed').val(pet.breed);
      $('#edit-pet-age').val(pet.age);
      $('#edit-pet-color').val(pet.color);
      $('#edit-pet-description').val(pet.description);
      $('#edit-pet-type').val(pet.pet_type);
      $('#edit-pet-gender').val(pet.gender);
      $('#edit-pet-size').val(pet.size);
      $('#edit-pet-vaccinated').val(pet.vaccinated);
      $('#edit-pet-status').val(pet.status);

      // Show the edit modal
      $('#editPetModal').modal('show');
      // Reset the success message alert when modal is shown
      $('#updateSuccessAlert').addClass('d-none');
      
    },
    error: function(xhr, status, error) {
      console.error('Failed to fetch pet details:', error);
    }
  });
}

// Function to handle pet search and display cards
$(document).ready(function() {
  $('#searchPetsForm form').submit(function(event) {
    event.preventDefault(); // Prevent form from submitting the usual way

    // Get form data
    var searchData = {
      name: $('#searchName').val(),
      breed: $('#searchBreed').val(),
      type: $('#searchType').val(),
    };

    // Send AJAX request to fetch pets based on search criteria
    $.ajax({
      url: 'search_pets.php', // PHP file to handle pet search logic
      type: 'GET',
      data: searchData,
      success: function(response) {
        var pets = JSON.parse(response); // Assuming your PHP file returns a JSON array

        // Clear any previous results
        $('#petCardsContainer').empty();

        // Check if there are pets to display
        if (pets.length > 0) {
          // Loop through the pets and display them as cards
          pets.forEach(function(pet) {
            var petCard = `
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="images/${pet.image}" class="card-img-top" alt="${pet.name}">
                  <div class="card-body">
                    <h5 class="card-title">${pet.name}</h5>
                    <p class="card-text">Breed: ${pet.breed}</p>
                    <p class="card-text">Age: ${pet.age}</p>
                    <p class="card-text">Color: ${pet.color}</p>
                    <p class="card-text">Type: ${pet.pet_type}</p>
                    <p class="card-text">Gender: ${pet.gender}</p>
                    <p class="card-text">Size: ${pet.size}</p>
                    <p class="card-text">Vaccinated: ${pet.vaccinated}</p>
                    <button class="btn btn-info" onclick="viewPetDetails(${pet.id})">View Details</button>
                  </div>
                </div>
              </div>
            `;
            $('#petCardsContainer').append(petCard); // Append the card to the container
          });
        } else {
          $('#petCardsContainer').html('<p>No pets found with the given criteria.</p>');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error fetching pet data:', error);
        $('#petCardsContainer').html('<p>Error occurred while searching for pets.</p>');
      }
    });
  });
});

// Function to handle button clicks and toggle the visibility of sections
function toggleSection(section) {
  // Hide all sections first
  $('#searchPetsForm').addClass('collapse');
  $('#petCardsContainer').addClass('collapse');
  
  // Toggle the clicked section
  if (section === 'search') {
    $('#searchPetsForm').removeClass('collapse');
    $('#petCardsContainer').removeClass('collapse');
  } else {
    // Add logic for showing other sections like Add Pet or View Pet List
    $('#otherSection').removeClass('collapse');
  }
}



    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
