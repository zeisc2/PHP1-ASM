<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
        
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Lato', sans-serif;
            color: #fff;
            text-align: center;
            padding: 50px;
        }
        
        .site-header__title {
            font-size: 3em;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-in-out;
        }
        
        .main-content {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }
        
        .main-content__checkmark {
            font-size: 4em;
            color: #4caf50;
            margin-bottom: 20px;
        }
        
        .main-content__body {
            font-size: 1.2em;
            line-height: 1.6;
        }
        
        .site-footer {
            margin-top: 30px;
            font-size: 0.9em;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
    <header class="site-header" id="header">
        <h1 class="site-header__title" data-lead-id="site-header-title">Đơn hàng của bạn đang được sử lí</h1>
      <button>  <a href="order_history.php">  Check order history</a></button>
        <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
    </header>

    <div class="main-content">
        <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
        <p class="main-content__body" data-lead-id="main-content-body">
            Dear <?php session_start(); echo $_SESSION['username'] ?>,
            <br><br>
            We are thrilled to have you as a part of our community. Thank you for choosing our product and making a purchase. Your support means the world to us!
            <br><br>
            We hope that you are satisfied with your purchase and that it meets your expectations. If you have any questions, concerns, or feedback, please do not hesitate to reach out to our customer service team. We are here to help and ensure that you have the best possible experience with our product.
            <br><br>
            Once again, thank you for your trust and support. We look forward to serving you again in the future.
            <br><br>
            Best regards,
            <br>
            [Trieu Bao Chuong]
        </p>
    </div>

    <footer class="site-footer" id="footer">
        <p class="site-footer__fineprint" id="fineprint">Copyright ©2024 | All Rights Reserved</p>
    </footer>
</body>
</html>
