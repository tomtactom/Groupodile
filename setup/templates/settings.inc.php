	<article>
		<section>
			<h3>Administrator Account erstellen</h3>
			<form method="post">
			<?php
				if (!isset($goToNextStep)) {
			?>
			<style>
				label {
					display: block;
				}
			</style>
				<label for="inputUsername">Benutzername:*
					<input type="text" id="inputUsername" size="40" minlength="3" maxlength="32" name="username" placeholder="Benutzername" value="Benutzername" pattern="[A-Za-z0-9/_-]+" required>
				</label>
				<label for="inputFirstname">Vorname:*
					<input type="text" id="inputFirstname" size="40" minlength="3" maxlength="255" name="vorname" placeholder="Vorname" value="Vorname" pattern="[a-zA-Z ]+" required>
				</label>
				<label for="inputLastname">Nachname:*
					<input type="text" id="inputLastname" size="40" minlength="3" maxlength="255" name="nachname" placeholder="Nachname" value="Nachname" pattern="[a-zA-Z]+" required>
				</label>
				<label for="inputEmail">E-Mail:*
					<input type="email" id="inputEmail" size="40" maxlength="250" name="email" placeholder="E-Mail" value="emailtest@tonline.de" required>
				</label>
				<label for="inputPassword">Passwort:*
					<input type="password" id="inputPassword" size="40" minlength="8" maxlength="250" name="passwort" placeholder="Passwort" value="test_#1" required>
				</label>
				<label for="inputPassword2">Passwort wiederholen:*
					<input type="password" id="inputPassword2" size="40" minlenght="8" maxlength="250" name="passwort2" placeholder="Passwort wiederholen" value="test_#1" required>
				</label>
				<label for="inputBiography">Biografie:
					<textarea id="inputBiography" maxlength="250" name="biography" placeholder="Biografie"></textarea>
				</label>
				<label for="inputBirthday">Geburtsdatum:*
					<input type="date" id="inputBirthday" maxlength="10" name="birthday" placeholder="Geburtsdatum" required>
				</label>
				<label for="gender">Geschlecht:*
					<select name="gender" id="gender">
						<option value="female">Weiblich</option>
						<option value="male">Männlich</option>
						<option value="other">Anderes Geschlecht</option>
						<option value="noinformation" selected>Keine Angabe</option>
					</select>
				</label>
			Alle Felder mit <font style="color: red;">*</font> müssen ausgefüllt werden.
			<hr>
		<?php } if (isset($goToNextStep)) { ?>
					<div class="success">Dein Administrator Account wurde erfolgreich installiert</div>
					<a href="index.php">Abbrechen</a>
					<input type="hidden" name="nextStep" value="websitesettings">
					<button type="submit">Weiter</button>
				<?php } else { ?>
					<a href="index.php">Abbrechen</a>
					<input type="hidden" name="nextStep" value="settings">
					<button type="submit" name="register" value="1">Account erstellen</button>
				<?php } ?>
			</form>
		</section>
	</article>
