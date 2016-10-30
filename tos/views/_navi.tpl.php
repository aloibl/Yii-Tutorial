<!--
Zwecks dieses Partials ist es, die Navigation anzuzeigen, nut der der Nutzer Aktionen auswählen und die Website erkunden kann
	####VIEW-BEZIEHUNGEN##############################################################################
	####wird geladen von##############################################################################
	####layout.tpl.php################################################################################
	##################################################################################################
-->

<header>
			<div id="logo">
				<img src="images/content/logo/logo_white.png" />
			</div>
			<!--<nav id="logo_choose_lang" onclick="fade(this);">
				<ul>
					<li>
						<a href="index.php?watch=news" class="activelang">
							<img src="images/content/icons/flags/de_flag.png" />
						</a>
					</li>
					<li>
						<a href="#!">
							<img src="images/content/icons/flags/uk_flag.png" />
						</a>
					</li>
				</ul>
			</nav>!-->
			<div class="decorationbar">
				<img src="images/content/decorations/rosebar_white.png" />
			</div>
			<nav id="main_nav" class="nofix">
				<ul>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#news" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('news')">
							News
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#music" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('music')">
							Music
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#tour" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('tour')">
							Tour
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#gallery" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('gallery')">
							Photos
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="<?php if (empty($_SESSION['user'])): echo 'index.php?aktion=login'; else: echo 'index.php#!'; endif; ?>" onclick="toggle_active_menu(this.previousSibling.previousSibling)">
							Community
						</a>
						<ul class="subnav">
							<?php if (!empty($_SESSION['user'])): ?>
							<li>
								<a href="index.php?aktion=logout">
									Logout
								</a>
							</li>
							<?php else: ?>
							<li>
								<a href="index.php?aktion=login">
									Anmelden
								</a>
							</li>
							<?php endif; ?>
							<!--<li>
								<a href="#!">
									Mein Konto
								</a>
							</li>
							<li>
								<a href="#!">
									Postfach
								</a>
							</li>-->
							<?php if (!empty($_SESSION['user']) && $application->checkIfUserPermissionsAreSufficient('admin_panel', false)): ?>
							<li>
								<a href="index.php?aktion=admin_panel">
									Administration
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#merch" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('merch')">
							Merch
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#contact" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('contact')">
							Kontakt
						</a>
					</li>
					<li>
						<img src="images/content/decorations/roseboxborders_white.png" class="roseboxborder invis" />
						<a href="index.php#about" onclick="toggle_active_menu(this.previousSibling.previousSibling);scroll_heading('about')">
							About
						</a>
					</li>
				</ul>
			</nav>
		</header>