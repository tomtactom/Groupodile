			<form method="get" class="single" id="search">
<?php if(isset($_GET['popular'])) { ?>
				<input type="hidden" name="popular" value="1">
<?php } ?>
				<input type="search" name="s" placeholder="Suche nach WhatsApp Gruppen" minlength="3" maxlength="64" required>
				<button type="submit"></button>
			</form>
