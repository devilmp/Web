<div class="dialog" id="confirm-dialog">
	<div class="announcement_title">Server announce</div>
		<div class="announcement"><?php if(isset($announce)) echo $announce; ?></div>
			<input type="submit" name="btnConfirm" class="continue" value="Agree!">
		<a href="#" class="close">Disagree!</a>
</div>