<?php
require_once('init.php');
$stripe = array(
	'secret_key'      => 'sk_live_0kdSUCOiNzYfSoDQ2xIZZp3O',
	'publishable_key' => 'pk_live_Nav5dgIgtQGvt2D6zMrpJmMO'
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);