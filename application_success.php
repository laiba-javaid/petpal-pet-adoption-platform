<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted - PetPal</title>
    <link href="/PetPal/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="/PetPal/style.css" />
    <style>
        .success-section {
            justify-content: center;
            text-align: center;
            align-items: center;
        }

        .success-section h2 {
            margin-top: 30px;
            font-size: 38px;
            color: #8B0000;
            margin-bottom: 10px;
        }

        .success-section p {
            margin-top: 40px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .success-section a {
            color: #8B0000;
            text-decoration: none;
        }
        .image-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="image-wrapper">
        <a class="paw" href="/PetPal/index.php">
            <img src="/PetPal/assets/images/PetPal-logo.png" style="margin-top: 40px; margin-bottom: 40px;" alt="PetPal">
        </a>
    </div>
    <main>
        <div>
            <section class="success-section">
                <?php
                if (isset($_GET['type']) && isset($_GET['role'])) {
                    $type = htmlspecialchars($_GET['type']);
                    $role = htmlspecialchars($_GET['role']);
                    
                    if ($type === 'signup' && $role === 'user') {
                        echo "<h2>Account Created Successfully!</h2>";
                        echo "<p>Return back to &nbsp;<a href='/PetPal/index.php'>Home Page</a></p>";
                    } elseif ($type === 'login' && $role === 'user') {
                        echo "<h2>Login Successful!</h2>";
                        echo "<p>Return back to &nbsp;<a href='/PetPal/index.php'>Home Page</a></p>";
                    } elseif ($type === 'login' && $role === 'admin') {
                        echo "<h2>Login Successful!</h2>";
                        echo "<p>Go to your &nbsp;<a href='/PetPal/admin_dashboard.php'>Dashboard</a></p>";
                    }
                }
                ?>
            </section>
        </div>
    </main>
</body>
</html>