	<ul>
		<li><a href="../">Startseite</a></li>
		<li><a href="../backend">Adminstrationsbereich</a></li>
		<?php if (is_checked_in()) { ?>
		<li><a href="../backend/gruppen">Gruppen verwalten</a></li>
		<li><a href="../backend/faq">Fragen beantworten</a></li>
		<li><a href="../backend/settings">Einstellungen</a></li>
		<li><a href="../backend/logout">Logout</a></li>
		<?php } else { ?>
		<li><a href="../backend/forgotpassword">Passwort vergessen</a></li>
		<li><a href="../backend/login">Login</a></li>
		<?php } ?>
	</ul>
