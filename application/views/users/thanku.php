<!doctype html>
<html lang="en">

<head>
  <!-- Required Meta Tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/tick.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="http://lesscss.googlecode.com/files/less-1.0.30.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

  <title>Thanks</title>
</head>

<body id = "body">
  <section class="container">
    <div class="text-center" style="margin-top: 50px; justify-content : center">
      <!-- <span><i style="font-size: 250px;color:green" class="fa fa-check-circle"></i></span> -->
      <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
        <span class="swal2-success-line-tip"></span>
        <span class="swal2-success-line-long"></span>
        <div class="swal2-success-ring"></div>
        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
      </div>
      <div style="text-align : center">
      <h1 class="display-3">Thank You!</h1>
      <p class="lead"><strong>Your Order Successfull</strong>.</p>
      <hr>
      <p>
        Having trouble? <a href="">Contact us</a>
      </p>
      <p class="lead">
        <a href="<?php echo base_url() ?>HomeController/listAllProducts" role="button">Continue to homepage</a>
      </p>
      </div>
    </div>
  </section>


  <!-- Script -->


</body>

</html>

<script>
  $('#toggle').click(function() {
    $('.circle-loader').toggleClass('load-complete');
    $('.checkmark').toggle();
  });
</script>