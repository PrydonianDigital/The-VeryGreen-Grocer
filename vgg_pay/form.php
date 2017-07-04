<form action="pay.php" method="POST">
<h3>Enter amount</h3>
<p>Amount should not include £ symbol or . (eg: £20.00 should be entered as 2000).</p>
<p><input id="amount" name="amount" class="name" type="text" value="" pattern="\d*"></p>
<h3>What for</h3>
<p><input id="for" name="for" class="name" type="text" value=""></p>
<p><input type="submit" value="Go to payment »" class="pushbutton-wide"></p>
</form>
