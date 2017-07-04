<?php
require_once('init.php');
$stripe = array(
	'secret_key'      => 'sk_test_xIvEYkjKy6ZhNm0laAogEjsT',
	'publishable_key' => 'pk_test_7FCvgSYRIYdrEEqvBcooac3S'
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);