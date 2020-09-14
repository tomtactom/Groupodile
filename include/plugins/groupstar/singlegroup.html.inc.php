			<style>
				.rechnen {
					display: none;
				}
			</style>
			<section>
				<main>
					<div id="group<?php echo $data['id']; ?>" style="width: 95%; height: unset;">
						<h2><?php echo $data['title']; ?></h2>
						<hr>
						<p><?php echo $data['description']; ?></p>
						<aside>
							<span onclick="location.href='<?php echo $options['siteurl']."?category=".$data['category']; ?>'"><?php echo $data['category']; ?></span>
							<span>Alter: ab <?php echo $data['age']; ?></span>
							<span>Vote: <?php echo $data['vote']; ?></span>
							<span>Erstellt: <?php echo $data['date'].' Uhr'; ?></span>
						</aside>
<?php if(!$_COOKIE['vote'.$data['id']] && isset($_COOKIE['allowCookies'])) { ?>
							<label for="inputVoteup">👍🏼</label>
							<label for="inputVotedown">👎🏼</label>
<?php } ?>
					</div>
				</main>
			</section>
			<section>
<?php if(!$_COOKIE['vote']) { ?>
					<form method="post" style="display: none;">
						<input type="submit" name="voteup" id="inputVoteup" value="1">
					</form>
					<form method="post" style="display: none;">
						<input type="submit" name="votedown" id="inputVotedown" value="1">
					</form>
<?php } if(!isset($showlink)) { ?>
				<form method="post" id="singlegroup">
					<input type="hidden" name="groupid" value="<?php echo $data['id']; ?>">
					<label class="rechnen" id="spamcheck">Wieviel ist <?php $items = Array("-","+","*","/"); echo rand(0, 100).$items[array_rand($items)].rand(0, 100); ?>
						<input type="text" name="rechnen" class="rechnen">
					</label>
					<button type="submit">Jetzt Beitreten</button>
					<div class="g-recaptcha" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6LfWXm0UAAAAAKbRLqMVasA8lPm40aS6RCL-qTLi"></div>
				</form>
				<script>
					document.getElementById("singlegroup").addEventListener("submit", function(e) {
						if (!allowSubmit) {
							e.preventDefault();
						}
					});
				</script>
<?php } else { ?>
				<a href="<?php echo 'https://chat.whatsapp.com/invite/'.$data['invite'] ?>" hreflang="<?php echo $options['short_language'] ?>" rel="external" title='Trete jetzt der Gruppe "<?php echo $data['title'] ?>" bei'>
					<p class="message" style="color: #ffffff;background-color: #009688; padding: 10px; border-radius: 4px;font-size:0.8rem;">
						<span style="user-select: none; text-align:end;">Jetzt Beitreten: </span><br>
						<?php echo 'chat.whatsapp.com/'.$data['invite'] ?>
					</p>
				</a>
<?php } ?>
				<p class="message" style="color: #ffffff; text-align: center; margin-top: 35px; background-color: #009688; padding: 10px; border-radius: 4px;">Beim Klick auf den Button, verlässt du <?php $options['sitename'] ?> und wirst zu WhatsApp weitergeleitet. Wir haben mit den Inhalten aller Gruppen nichts zu tun und Distanzieren uns von ihnen. Wenn diese Gruppe gegen unsere AGBs verstößt, kannst du sie gerne melden. Außerdem Akzeptierst du so automatisch unsere Geschäftsbedingungen.</p>
			</section>
