<?php
	if ($modus_aendern) {
?>
<form method="post" enctype="multipart/form-data">
	<label for="inputGroupname">
		<input type="text" name="groupname" id="inputGroupname" placeholder="WhatsApp Gruppenname" autocomplete="off" maxlength="40" title="Bitte verwende möglichst nur Buchstaben und Zahlen für den Gruppennamen" required value="<?php echo $groupname; ?>">
	</label>
	<label for="inputInvitelink">
		<input type="text" name="invitelink" id="inputInvitelink" placeholder="WhatsApp Einladungslink" autocomplete="off" pattern="^[A-Za-z0-9]{22}$" title="Bitte benutze einen WhatsApp Gruppen Einladungslink-Code" minlength="22" maxlength="22" required value="<?php echo $invite; ?>">
	</label>
	<label for="inputDescription">
		<textarea type="text" name="description" id="inputDescription" placeholder="WhatsApp Gruppenbeschreibung" rows="3" autocomplete="off" pattern="[a-zA-Z0-9ÄäËëÏïÖöÜüŸÿẞßÀÁÂÃÅÆÇÈÉÊÌÍÎÐÑÒÓÔÕØŒÙÚÛÝÞàáâãåæçèéêìíîðñòóôõøœùúûýþŠšČč ]+" title="Bitte verwende nur Buchstaben und Zahlen für die Gruppenbeschreibung" maxlength="1000"><?php echo $description; ?></textarea>
	</label>
	<label for="inputCategory">Kategorie 
		<select name="category" id="inputCategory" required>
			<option value="1" <?php echo $category_select_1; ?>>Allgemein</option>
			<option value="2" <?php echo $category_select_2; ?>>Unterhaltung</option>
			<option value="3" <?php echo $category_select_3; ?>>Teenager</option>
			<option value="4" <?php echo $category_select_4; ?>>Witzig</option>
			<option value="5" <?php echo $category_select_5; ?>>Beruf</option>
			<option value="6" <?php echo $category_select_6; ?>>Nützlich</option>
			<option value="7" <?php echo $category_select_7; ?>>Örtlich</option>
			<option value="8" <?php echo $category_select_8; ?>>Gaming</option>
			<option value="9" <?php echo $category_select_9; ?>>Schule</option>
			<option value="10" <?php echo $category_select_10; ?>>Technik</option>
			<option value="11" <?php echo $category_select_11; ?>>Selbsthilfe</option>
			<option value="12" <?php echo $category_select_12; ?>>Serien</option>
			<option value="13" <?php echo $category_select_13; ?>>Kreativ</option>
			<option value="14" <?php echo $category_select_14; ?>>Politik</option>
		</select>
	</label>
	<label for="inputAge">Alter ab 
		<select name="age" id="inputAge" required>
			<option value="16" <?php echo $age_select_16; ?>>Ab 16</option>
			<option value="17" <?php echo $age_select_17; ?>>Ab 17</option>
			<option value="18" <?php echo $age_select_18; ?>>Ab 18</option>
			<option value="19" <?php echo $age_select_19; ?>>Ab 19</option>
			<option value="20" <?php echo $age_select_20; ?>>Ab 20</option>
			<option value="21" <?php echo $age_select_21; ?>>Ab 21</option>
			<option value="22" <?php echo $age_select_22; ?>>Ab 22</option>
			<option value="23" <?php echo $age_select_23; ?>>Ab 23</option>
			<option value="24" <?php echo $age_select_24; ?>>Ab 24</option>
			<option value="25" <?php echo $age_select_25; ?>>Ab 25</option>
			<option value="26" <?php echo $age_select_26; ?>>Ab 26</option>
			<option value="27" <?php echo $age_select_27; ?>>Ab 27</option>
			<option value="28" <?php echo $age_select_28; ?>>Ab 28</option>
			<option value="29" <?php echo $age_select_29; ?>>Ab 29</option>
			<option value="30" <?php echo $age_select_30; ?>>Ab 30</option>
			<option value="35" <?php echo $age_select_35; ?>>Ab 35</option>
			<option value="40" <?php echo $age_select_40; ?>>Ab 40</option>
		</select>
	</label>
	<label for="inputJoin">
		<input type="number" name="join" id="inputJoin" placeholder="Anzahl der Beigetretenen" autocomplete="off" value="<?php echo $join; ?>">
	</label>
	<label for="inputVote">
		<input type="number" name="vote" id="inputVote" placeholder="Bewertung der Gruppe" autocomplete="off" value="<?php echo $vote; ?>">
	</label>
	<input type="hidden" id="inputAktion" name="aktion" value="speichern">
	<?php
if ($modus_aendern != true) {
	?>
	<input type="hidden" id="inputAktion" name="aktion" value="speichern">
	<button type="submit">speichern</button>
</form>
	<?php		
	} else {
	?>
	<input type="hidden" id="inputId" name="id" value="<?php echo $id; ?>">
	<input type="hidden" id="inputAktion" name="aktion" value="korrigieren">
	<button type="submit">ändern</button>
</form>
	<?php } ?>
</form>
<?php } ?>
<div style="position:fixed;bottom:50px;right:40px;z-index:3;font-weight: 700;">
	<form method="post">
		<input type="text" minlength="3" maxlength="64" name="spamword" placeholder="Neues Blacklist Wort..." autocomplete="off" required>
		<button type="submit">Wort auf die Blacklist setzen</button>
	</form>
</div>