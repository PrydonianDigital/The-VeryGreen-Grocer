<?php
require_once('./header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $error = false;

  try {

    if (!isset($_POST['stripeToken'])) throw new Exception("The Stripe Token was not generated correctly");

    $charge = \Stripe\Charge::create(array(
      'source'     => $_POST['stripeToken'],
      'amount'   => $_POST['total'],
      'currency' => 'gbp',
      'description' => $_POST['what'],
      'receipt_email' => $_POST['stripeEmail']
    ));

  } catch (Exception $e) {
    $error = $e->getMessage();
  }

  if (!$error) {
    echo "<h1>Thank You!</h1>";
    echo "<h2>Your payment has been received.</h2>";
  }
  else {
    echo "<div class=\"error\">".$error."</div>";
    require_once('./payment_form.php');
  }
}
require_once('./footer.php');