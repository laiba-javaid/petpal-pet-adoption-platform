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

    <div class="container-fluid">
        <div class="row">
            <?php
            // Include your database connection
            include 'db_connection.php';

            // Get the pet ID from the URL
            $pet_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Fetch pet details from the database
            $sql = "SELECT * FROM pets WHERE id = $pet_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $pet = $result->fetch_assoc();
                ?>

                <div class="col-lg-6 pet-image" style="background-color: white; margin: 0px;">
                    <img src="/PetPal/assets/images/<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>" class="img-fluid">
                </div>
                <div class="col-lg-6 pet-details" style="background-color: white;">
                    <h2><?php echo htmlspecialchars($pet['name']); ?></h2>
                    <div class="pet-detail">
                        <h4>About</h4><br>
                        <h6 style="display: inline;">Breed: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['breed']); ?></p><br><br>
                        <h6 style="display: inline;">Colour:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['color']); ?></p><br><br>
                        <h6 style="display: inline;">Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['age']); ?> Years</p><br><br>
                        <h6 style="display: inline;">Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['gender']); ?></p><br><br>
                        <h6 style="display: inline;">Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['size']); ?></p><br><br>
                        <h6 style="display: inline;">Vaccinated:&nbsp;&nbsp;</h6><p style="display: inline;"><?php echo htmlspecialchars($pet['vaccinated']); ?></p><br><br>
                        <a href="/PetPal/application.php?id=<?php echo $pet['id']; ?>" class="btn btn-custom">Adopt Now</a>
                    </div>
                </div>
                <div class="container description">
                    <h2>Description</h2>
                    <p><?php echo nl2br(htmlspecialchars($pet['description'])); ?></p>
                </div>               
                <?php
            } else {
                echo "<p>Pet details not found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

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
