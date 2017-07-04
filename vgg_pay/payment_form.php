<form action="charge.php" method="POST">
<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_live_Nav5dgIgtQGvt2D6zMrpJmMO"
    data-amount="<?php echo $_POST['amount'];?>"
    data-name="The VeryGreen Grocer Ltd"
    data-description="<?php echo $_POST['for'];?>"
    data-image="vgg.png"
    data-locale="auto"
    data-zip-code="true"
    data-currency="gbp">
</script>
<input type="hidden" name="total" value="<?php echo $_POST['amount'];?>" />
<input type="hidden" name="what" value="<?php echo $_POST['for'];?>" />
</form>
