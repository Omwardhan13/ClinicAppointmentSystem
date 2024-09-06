<?php
// Retrieve the token from the query string
$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <style>
        /* General body styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styling the confirmation container */
        .confirmation-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
            border: 1px solid #ddd;
        }

        /* Title styling */
        .confirmation-container h2 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 16px;
            font-weight: 600;
        }

        /* General paragraph styling */
        .confirmation-container p {
            font-size: 16px;
            color: #333;
            margin-bottom: 24px;
            line-height: 1.5;
        }

        /* Highlight the token */
        .confirmation-container strong {
            font-size: 18px;
            color: #28a745;
        }

        /* Button styling */
        .confirmation-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .confirmation-container a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Media query for mobile responsiveness */
        @media screen and (max-width: 500px) {
            .confirmation-container {
                padding: 20px;
            }

            .confirmation-container h2 {
                font-size: 20px;
            }

            .confirmation-container p {
                font-size: 14px;
            }

            .confirmation-container a {
                font-size: 12px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h2>Your Appointment has been Confirmed!</h2>
        <p>Your unique appointment token is: <strong><?php echo $token; ?></strong></p>
        <p>Please keep this token for future reference.</p>
        <a href="index.html">Go back to home</a>
    </div>
</body>
</html>
