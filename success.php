<!DOCTYPE html>
<html lang="en">
<head>
  <title>success payment method</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Payment Successful</h2>
  <div class="alert alert-success">
    <strong>Please note your payment id:</strong> <?php echo $_SESSION['paymentid']; ?>
  </div>
</div>

</body>
</html>
