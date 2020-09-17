			<form method="post" id="newgroup">
				<label for="inputGroupname">
					<input type="text" name="groupname" id="inputGroupname" placeholder="WhatsApp Gruppenname" autocomplete="off" maxlength="40" pattern="[a-zA-Z0-9ÄäËëÏïÖöÜüŸÿẞßÀÁÂÃÅÆÇÈÉÊÌÍÎÐÑÒÓÔÕØŒÙÚÛÝÞàáâãåæçèéêìíîðñòóôõøœùúûýþŠšČč ]+" title="Bitte verwende nur Buchstaben und Zahlen für den Gruppennamen" required>
				</label>
				<label for="inputInvitelink">
					<input type="text" name="invitelink" id="inputInvitelink" placeholder="WhatsApp Einladungslink" autocomplete="off" pattern="^https:\/\/(chat\.whatsapp\.com\/|chat\.whatsapp\.com\/invite\/)[A-Za-z0-9]{22}$" title="Bitte benutze einen WhatsApp Gruppen Einladungslink" minlength="48" maxlength="55" required>
				</label>
				<label for="inputDescription">
					<textarea type="text" name="description" id="inputDescription" placeholder="WhatsApp Gruppenbeschreibung" rows="3" autocomplete="off" title="Bitte verwende nur Buchstaben und Zahlen für die Gruppenbeschreibung" maxlength="1000"></textarea>
				</label>
				<label for="inputCategory">Kategorie
					<select name="category" id="inputCategory" required>
						<option value="1">Allgemein</option>
						<option value="2">Unterhaltung</option>
						<option value="3">Teenager</option>
						<option value="4">Witzig</option>
						<option value="5">Beruf</option>
						<option value="6">Nützlich</option>
						<option value="7">Örtlich</option>
						<option value="8">Gaming</option>
						<option value="9">Schule</option>
						<option value="10">Technik</option>
						<option value="11">Selbsthilfe</option>
						<option value="12">Serien</option>
						<option value="13">Kreativ</option>
						<option value="14">Politik</option>
					</select>
				</label>
				<label for="inputAge">Alter ab
					<select name="age" id="inputAge" required>
						<option value="16">Ab 16</option>
						<option value="17">Ab 17</option>
						<option value="18">Ab 18</option>
						<option value="19">Ab 19</option>
						<option value="20">Ab 20</option>
						<option value="21">Ab 21</option>
						<option value="22">Ab 22</option>
						<option value="23">Ab 23</option>
						<option value="24">Ab 24</option>
						<option value="25">Ab 25</option>
						<option value="26">Ab 26</option>
						<option value="27">Ab 27</option>
						<option value="28">Ab 28</option>
						<option value="29">Ab 29</option>
						<option value="30">Ab 30</option>
						<option value="35">Ab 35</option>
						<option value="40">Ab 40</option>
					</select>
				</label>
				<input type="checkbox" id="inputAccept" name="accept" required>
				<label for="inputAccept">Ich habe die <a href="./privacy-policy" hreflang="<?php echo $options['short_language']; ?>" title="lese die Datenschutzerklärung" rel="nofollow" target="_blank">Datenschutzerklärung</a> und die <a href="./agbs" hreflang="<?php echo $options['short_language']; ?>" title="lese die Allgemeinen Geschäftsbedingungen" rel="nofollow" target="_blank">AGBs</a> gelesen</label><br><br>
				<div class="g-recaptcha" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="<?php echo $options['recaptcha_sitekey']; ?>"></div>
				<button type="submit">Gruppe veröffentlichen</button>
			</form>
			<script>
				document.getElementById("newgroup").addEventListener("submit", function(e) {
					if (!allowSubmit) {
						e.preventDefault();
					}
				});
			</script>
