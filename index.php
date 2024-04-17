<?php
// Sample course data array
$result = [
    ['id' => 1, 'title' => 'front-end-developer', 'price' => '2300', 'image' => 'upload/front-end-developer.svg'],
    ['id' => 2, 'title' => 'full-stack-developer', 'price' => '1200', 'image' => 'upload/full-stack-developer.svg'],
    ['id' => 3, 'title' => 'php-and-mysql', 'price' => '3499', 'image' => 'upload/php-and-mysql.svg']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>courses</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <?php foreach ($result as $data): ?>
            <div class="col-xl-4">
                <div class="card" style="width:100%;">
                    <img class="card-img-top" src="<?php echo $data['image']; ?>" alt="Course Image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $data['title']; ?></h4>
                        <p class="card-text"><?php echo $data['price']; ?></p>
                        <!-- Buy now button with data attributes -->
                        <a href="#" class="btn btn-primary buynow"
                           data-productid="<?php echo $data['id']; ?>"
                           data-productname="<?php echo $data['title']; ?>"
                           data-amount="<?php echo $data['price']; ?>">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(".buynow").click(function(e) {
        e.preventDefault();
        var amount = $(this).data('amount');
        var productid = $(this).data('productid');
        var productname = $(this).data('productname');

        var options = {
            "key": "YOUR_RAZORPAY_KEY",
            "amount": amount * 100,
            "name": "Your Company Name",
            "description": productname,
            "image": "https://example.com/your_logo",
            "handler": function(response) {
                var paymentid = response.razorpay_payment_id;
                $.ajax({
                    url: "payment.php",
                    type: "post",
                    data: {product_id: productid, payment_id: paymentid},
                    success: function(response) {
                        if (response.trim() == 'done') {
                            window.location.href = "success.php";
                        } else {
                            alert('Payment successful but encountered an error. Please contact support.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred during payment processing:", error);
                        alert('An error occurred during payment processing. Please try again later.');
                    }
                });
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    });
</script>
</body>
</html>
