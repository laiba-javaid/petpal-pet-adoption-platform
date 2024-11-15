<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Application | PetPal</title>
    <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="/PetPal/style.css" rel="stylesheet"  />
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <section id="adopt-section">
    <div id="adoption-form">
        <h2>Adoption Application</h2>
        <?php
            // Initialize error variables
            $nameErr = $emailErr = $phoneErr = $addressErr = $reasonErr = "";
        ?>
        <form action="/PetPal/process_adoption.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="applicant_name" required>
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
                <span class="error">* <?php echo $phoneErr;?></span>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
                <span class="error">* <?php echo $addressErr;?></span>
            </div>
            <div class="form-group">
                <label for="reason">Reason for Adoption</label>
                <textarea id="reason" name="reason" required></textarea>
                <span class="error">* <?php echo $reasonErr;?></span>
            </div>
            
                <button type="submit" class="btn btn-custom">Submit Application</button>
        </form>
    </div>
</section>
<script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/App.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
</body>
</html>