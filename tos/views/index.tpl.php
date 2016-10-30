<div id="page">
			<div id="content">
					<!--<div id="teaser">
						<div class="imagecontainer">
							<div class="slidermenu">
								<span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, false)"><</span><span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, true)">></span>
							</div>
							<img src="images/content/bandpics/tos_videodreh.jpg" border="0" alt="Videodreh" />
						</div>
						
						<div class="imagecontainer">
							<div class="slidermenu">
								<span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, false)"><</span><span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, true)">></span>
							</div>
							<img src="images/content/bandpics/tos_probe.jpg" border="0" alt="Videodreh" />
						</div>
						
						<div class="imagecontainer">
							<div class="slidermenu">
								<span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, false)"><</span><span onclick="prevSlide(this.parentNode.parentNode.parentNode, 3, true)">></span>
							</div>
							<img src="images/content/bandpics/tos_studio.jpg" border="0" alt="Videodreh" />
						</div>					
					</div>-->
					<a class="anchor" name="news" id="news"></a>					
					<div id="impressions">
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							NEWS
						</h1>
						<div class="headerimpress"></div>
						<div class="lefty box-sizing">
							<h2>
								Fanmeinung
							</h2>
							<p>
								\m/ ROCK N ROLL \m/ ihr warts da Hammer, sowas braucht Deggendorf öfter :) super gespielt, weiter so :) :) :) <span>- Ron Rox via Facebook</span>
							</p>
							<div class="border-top"></div>
							<div class="border-bottom"></div>
							<div class="bottom-right"></div>
						</div>
						
						<div class="lefty-neighbour">
							<img src="images/content/bandpics/chris_stoegi.jpg" />
						</div>
						
						
						<div class="righty-neighbour">
							<img src="images/content/bandpics/tobi_bw.jpg" />
						</div>
						
						<a class="anchor" name="news"></a>
						<div class="righty box-sizing">
							<h2>
								Featured Video
							</h2>
							<footer>
								Tears of Serenade - At Least We Stay At The Course (Acoustic)
							</footer>
							<video controls="controls" autoplay="autoplay" muted="muted" poster="images/content/logo/logo_black.png" id="at_least_acoustic">
								<source src="videos/site/bandvids/at_least_we_stay_at_the_course_acoustic.mp4" />
								<source src="videos/site/bandvids/at_least_we_stay_at_the_course_acoustic.webm" />
								<source src="videos/site/bandvids/at_least_we_stay_at_the_course_acoustic.ogv" />
								<img src="images/content/logo/logo_black.png" alt="leider können Sie das Vidoe nicht abspielen" />
							</video>
							<script type="text/javascript">
								jwplayer("at_least_acoustic").setup({
									"controlbar": "over",
									"icon": "true",
									"volume": "100",
									"modes": [
										{type: "html5" },
										{type: "flash", src: "videos/player/jwplayer.flash.swf" }
									]]
								});
							</script>
							<div class="border-top"></div>
							<div class="border-bottom"></div>
							<div class="top-left"></div>
						</div>
						

						
						<div class="lefty box-sizing">
							<h2>
								Featured Audio
							</h2>
							<footer>
								Tears of Serenade - Final Release
							</footer>
							<audio controls="controls">
								<source src="audio/content/bandmusic/final_release.ogg" type="audio/ogg" />
								<source src="audio/content/bandmusic/final_release.mp3" type="audio/mpeg" />
								<source src="audio/content/bandmusic/final_release.wav" type="audio/wav" />
							</audio>
							<div class="border-top"></div>
							<div class="border-bottom"></div>
							<div class="bottom-right"></div>
						</div>
						
						<div class="lefty-neighbour">
							<img src="images/content/bandpics/stefan_mic.jpg" />
						</div>
						<?php if (!empty($all_news)): ?>
							<?php foreach($all_news as $news): ?>
								<div class="news">
									<h1>
										<?php echo $news->getTitle(); ?>
									</h1>
									<div>
										<?php echo $news->getBody(); ?>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
						
					</div>
					
					<a class="anchor" name="about" id="about"></a>
					<div>
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							ABOUT
						</h1>
						<div class="headerimpress"></div>
						<!--<div class="fullwidthslider">
							<div class="imagecutter activepic">
								<img src="images/content/bandpics/tos_smokepic.jpg" />
							</div>
							<div class="imagecutter">
								<img src="images/content/bandpics/tobi_bw.jpg" />
							</div>
							<div class="imagecutter">
								<img src="images/content/bandpics/stefan_bw.jpg" />
							</div>
							<div class="bullets">
								<div>
									<a href="#" onclick="return false; changeActiveBullet(this.parentNode, 1)"></a>
								</div>
								<div>
									<a href="#" onclick="return false; changeActiveBullet(this.parentNode, 2)"></a>
								</div>
								<div>
									<a href="#" onclick="return false; changeActiveBullet(this.parentNode, 3)"></a>
								</div>
							</div>
						</div>-->
						<div class="fullwidthdiv">
							<h2>
								Metalcore aus Niederbayern
							</h2>
							<footer>
								Rock n' Roll
							</footer>
							<div id="aboutbody">
								<div class="spalte box-sizing">
									<h3>
										Anfänge
									</h3>
									<p>
									Das Bestehen einer Band um Toby S. begann 2007. Zwischenzeitlich durchlief die Band 
									mehrere Bandbesetzungen und einen Namenwechsel. Seit der „harte Kern“ aus Toby S., 
									Stefan R., und Chris G. nach jahrelangem „herum musizieren“ durch die Bassistin Amy F., 
									im Frühjahr 2013, ergänzt wurde, ist Tears Of Serenade vollständig. 
									</p>
								</div>
								<div class="spalte box-sizing">
									<p>
									Unsere Songs gestalten wir in einer Mischung aus Metalcore, Heavy Metal, und Postcore. 
									Melodische Gitarrenparts gepaart mit trashigen screamparts – für jeden ist was dabei! 
									Unsere musikalischen Einflüsse stammen unter anderem von Bands wie Bullet For My 
									Valentine, Metallica, Callejon, Asking Alexandria, Trivium, u.v.m.
									</p>
								</div>
								<div class="spalte box-sizing">
									<h3>
										Erste Produktionen
									</h3>
									<div class="box-sizing">
										<p>
											Die ersten single Auskopplungen 'Final Release' und 'At Least We Stay The Course' 
											ergänzten ab Dezember 2013 unser Coverprogramm. Stetig wird an den Songs gearbeitet und 
											werden nacheinander in die live Sets eingebaut. 
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<a class="anchor" name="music" id="music"></a>					
					<div>
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							MUSIC
						</h1>
						<div class="headerimpress"></div>
						<div class="single">
							<h2>Final Release</h2>
							<div class="singlemusic">
								<iframe width="100%" height="450" scrolling="yes" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/117963661&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
								<!--<div class="choose-socialnet">
									<div class="socialicon desc">Anbieter wechseln</div>
									<div class="socialicon soundcloud"></div>
									<div class="socialicon youtube"></div>
									<div class="socialicon mixcloud"></div>
									<div class="socialicon vimeo"></div>
									<div class="socialicon intern"></div>
								</div>-->
							</div>
						
							<div class="singledetails box-sizing">
								<div class="cover box-sizing">
									<h2>
										Cover
									</h2>
									<div class="coverimage box-sizing">
										<a href="images/content/covers/final_release.png" target="blank">
											<img src="images/content/covers/final_release.png" />
										</a>
									</div>
								</div>
								<div class="lyrics box-sizing">
										<p>
											<strong>Strophe:</strong><br />
											I can't forget<br />
											my disappointed life<br />
											satisfied<br />
											to live until we die
										</p>
										<p>
											deep pain controls<br />
											my life <br />
											my (fucking) mind.<br />
											so many questions<br />
											we can not justify.
										</p>
										<p>
											<strong>Bridge:</strong><br />
											We can not justify<br />
											there is no reason why<br />
											there is no reason<br />
											why?
										</p>
										<p>
											<strong>Refrain:</strong><br />
											Sometimes, we're on the ground<br />
											things still missin', they're burried now<br />
											tongiht, the pain will leave<br />
											this time, final release
										</p>
										<p>
											<strong>Strophe:</strong><br />
											It's not okay<br />
											there's nothing what is light<br />
											upon the clouds<br />
											we will see who was right
										</p>
										<p>
											heaven is far<br />
											away<br />
											(away from me)<br />
											my friends are waiting<br />
											it makes me crie at night
										</p>
										<p>
											<strong>Bridge:</strong><br />
											We can not justify<br />
											there is no reason why <br />
											there is no reason<br />
											why?
										</p>
										<p>
											<strong>Refrain:</strong><br />
											Sometimes, we're on the ground<br />
											things still missin', they're burried now!<br />
											tonight, the pain will leave<br />
											this time, final release
										</p>
										<p>
											<strong>Sing part:</strong><br />
											tonight, the pain will leave<br />
											this time, final release
										</p>
										<p>
											<strong>Refrain</strong><br />
										</p>
									</div>
								</div>
							</div>
					
						
						<!--<div class="album">
							<h2>
								EP: At Least We Stay At The Course
							</h2>
							<div class="album-contents">
								<h3>
									Songliste
								</h3>
								<footer>
									Einzelnen Song zum Anhören auswählen
								</footer>
								<ul>
									<li>
										<a href="#!">
											At Least We Stay At The Course
										</a>
									</li>
									<li>
										<a href="#!">
											At Least We Stay At The Course (Acoustic)
										</a>
									</li>
								</ul>
							</div>
						</div>-->
						<div class="single">
							<h2>Song: At Least We Stay At The Course</h2>
							<div class="singlemusic">
								<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/121557539&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
								<!--<div class="choose-socialnet">
									<div class="socialicon desc">Anbieter wechseln</div>
									<div class="socialicon soundcloud"></div>
									<div class="socialicon youtube"></div>
									<div class="socialicon mixcloud"></div>
									<div class="socialicon vimeo"></div>
									<div class="socialicon intern"></div>
								</div>-->
							</div>
						
							<div class="singledetails box-sizing">
								<div class="cover box-sizing">
									<h2>
										Cover
									</h2>
									<div class="coverimage box-sizing">
										<a href="images/content/covers/at_least.png" target="blank">
											<img src="images/content/covers/at_least.png" />
										</a>
									</div>
								</div>
								<div class="lyrics box-sizing">
										<p>
											<strong>Strophe:</strong><br />
											five weeks at home alone<br />
											and you are sitting at the door<br />
											noone cares about you babe<br />
											noone cares about you babe
										</p>
										<p>
											you're crying tears at night<br />
											you feel the pain, but you are alive<br />
											screaming out the words of passion<br />
											screaming out the words of passion<br />
										</p>
										<p>
											<strong>Refrain:</strong><br />
											How can I get you out of here?<br />
											Help me!<br />
											Tonight I'll let you know: There's so much better ways to live!<br />
											Come on, I'll get you out of here!<br />
											Never again!<br />
											Tonight I'll let you know: There's so much better ways to live!
										</p>
										<p>
											<strong>Strophe:</strong><br />
											left behind rivers full of tears<br />
											you cried night by night<br />
											Love had gone for so long time<br />
											Love had gone for so long time
										</p>
										<p>
											Try to catch your breathless fear<br />
											and keep me next to you tonight<br />
											Feel the warmth, love and pleasure<br />
											Feel the warmth, love and pleasure
										</p>
										<p>
											<strong>Refrain:</strong><br />
											How can I get you out of here?<br />
											Help me!<br />
											Tonight I'll let you know: There's so much better ways to live!<br />
											Come on, I'll get you out of here!<br />
											Never again!<br />
											Tonight I'll let you know: There's so much better ways to live!
										</p>
										<p>
											<strong>Strophe:</strong><br />
											My hands provide protection<br />
											there won't be forced subjection<br />
											At least we stay at the course<br />
											At least we stay at the course
										</p>
										<p>
											<strong>Refrain:</strong><br />
											How can I get you out of here?<br />
											Help me!<br />
											Tonight I'll let you know: There's so much better ways to live!<br />
											Come on, I'll get you out of here!<br />
											Never again!<br />
											Tonight I'll let you know: There's so mnuch better ways to live!
										</p>
									</div>
								</div>
							</div>
					</div>
					
					<a class="anchor" name="tour" id="tour"></a>
					<div>
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							TOUR
						</h1>
						<div class="headerimpress"></div>
						<h2 class="pagetitle">
							KOMMENDE AUFTRITTE
						</h2>
						<?php foreach($all_gigs as $gig): ?>
							<?php $d1 = new DateTime($gig->getStartsAt()->format('Y-m-d H:i:s')); // nötig da bug mit diff-Funktion wenn man zwei Datetime-objekte miteinander vergleicht ?>
							<?php if ($now->diff($d1)->format('%r%a') >= 0): ?>
								<div class="gig">
									<div class="gigdate">
										<div class="gigmonth">
											<?php echo $gig->getEventMonth(); ?>
										</div>
										<div class="gigday">
											<?php echo $gig->getEventDay(); ?>
										</div>
									</div>
									<div class="gigtime">
										<?php echo $gig->getEventTime(); ?>
									</div>
									<div class="gigplace">
										<div>
											<?php echo $gig->getPlace(); ?>
										</div>
										<div>
											<?php echo $gig->getEvent(); ?>
										</div>
									</div>
									<div class="giginfo">
										<!--<a href="#!">
											Event Info
										</a>
										<a href="#!">
											Anfahrt
										</a>
										<a href="#!">
											Flyer / Ausschreibung
										</a>!-->
										<a href="<?php echo $gig->getFacebook(); ?>">
											Facebook
										</a>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
							<h2 class="pagetitle">
								HISTORY
							</h2>
						<?php foreach($all_gigs as $gig): ?>
							<?php $d1 = new DateTime($gig->getStartsAt()->format('Y-m-d H:i:s')); // nötig da bug mit diff-Funktion wenn man zwei Datetime-objekte miteinander vergleicht ?>
							<?php if ($now->diff($d1)->format('%r%a') < 0): ?>
								<div class="gig">
									<div class="gigdate">
										<div class="gigmonth">
											<?php echo $gig->getEventMonth(); ?>
										</div>
										<div class="gigyear">
											<?php echo $gig->getEventYear(); ?>
										</div>
									</div>
									<div class="gigtime"></div>
									<div class="gigplace">
										<div>
											<?php echo $gig->getPlace(); ?>
										</div>
										<div>
											<?php echo $gig->getEvent(); ?>
										</div>
									</div>
									<div class="giginfo">
										<!--<a href="#!">
											Gallerie
										</a>-->
									</div>
								</div>						
							</div>
							<?php endif; ?>
						<?php endforeach; ?>
					
					<a class="anchor" name="gallery" id="gallery"></a>
					<div>
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							GALLERY
						</h1>
						<div clasS="headerimpress"></div>
						<div id="albumlisting">
						<?php if(isset($_REQUEST['album'])): ?>
							<?php foreach($all_media as $medium) :?>
								<div class="album box-sizing">
									<div class="imagecontainer">
										<a href="<?php echo $medium->getLocalLink(); ?>" target="_blank">
											<?php switch ($medium->getType()):
												case 'images': ?>
													<img src="<?php echo $medium->getLocalLink(); ?>" alt="<?php echo $medium->getAltText(); ?>" />
												<?php break; ?>
												<?php case 'video': ?>
													<?php $youtube_set = $medium->getYoutube(); ?>
													<?php if ((!empty($youtube_set))): ?>
													<iframe id="ytplayer" type="text/html"
													src="<?php echo $medium->getYoutubeEmbedLink(); ?>" frameborder="0"></iframe>
													<?php else: ?>
													<video controls="controls" poster="images/content/logo/logo_black.png">
														<source src="<?php echo $medium->getLocalLink(); ?>">
														<?php $alternaLocalLinkOne = $medium->getAlternaLocalLinkOne(); ?>
														<?php if (!empty($alternaLocalLinkOne)): ?>
														<source src="<?php echo $medium->getAlternaLocalLinkOne(); ?>">
														<?php endif; ?>
														<?php $alternaLocalLinkTwo = $medium->getAlternaLocalLinkTwo(); ?>
														<?php if (!empty($alternaLocalLinkTwo)): ?>
														<source src="<?php echo $medium->getAlternaLocalLinkTwo(); ?>">
														<?php endif; ?>
													</video>
													<?php endif; ?>
												<?php break; ?>
												<?php case 'audio': ?>
													<?php $youtube_set = $medium->getYoutube(); ?>
													<?php $soundcloud_set = $medium->getSoundcloud(); ?>
													<?php $mixcloud_set = $medium->getMixcloud(); ?>													
													<?php if (!empty($youtube_set)): ?>
														<iframe id="ytplayer" type="text/html"
														src="<?php echo $medium->getYoutubeEmbedLink(); ?>" frameborder="0"></iframe>
													<?php elseif (!empty($soundcloud_set)): ?>
														<iframe width="100%" scrolling="yes" frameborder="no" src="<?php echo $medium->getSoundcloudEmbedLink(); ?>"></iframe>													
													<?php elseif (!empty($mixcloud_set)): ?>
													<object width="300" height="300">
														<param name="movie" value="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf"><param name="allowFullScreen" value="true">
														<param name="allowscriptaccess" value="always">
														<param name="flashVars" value="feed=<?php echo $medium->getMixcloud(); ?>/?for_player=1">
														<embed src="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" flashvars="feed=/<?php echo $medium->getMixcloud(); ?>?for_player=1">
													</object>													
													<?php else: ?>
														<audio controls="controls">
														<source src="<?php echo $medium->getLocalLink(); ?>" type="<?php echo $medium->getMIMETypeFromExtension(); ?>" />
														<?php $alternaLocalLinkOne = $medium->getAlternaLocalLinkOne(); ?>
														<?php if (!empty($alternaLocalLinkOne)): ?>
															<source src="<?php echo $alternaLocalLinkOne; ?>" type="audio/mpeg" />
														<?php endif; ?>
														<?php $alternaLocalLinkTwo = $medium->getAlternaLocalLinkTwo(); ?>
														<?php if (!empty($alternaLocalLinkTwo)): ?>
															<source src="<?php echo $alternaLocalLinkTwo; ?>" type="audio/wav" />
														<?php endif; ?>
														</audio>
													<?php endif; ?>
												<?php break; ?>
											<?php default: ?>
											<?php null; ?>
											<?php endswitch; ?>
										</a>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<?php foreach($all_albums as $album): ?>
								<?php if (count($album->getMedia()) > 0): ?>
									<div class="album box-sizing">
										<div class="imagecontainer">
											<a href="index.php?album=<?php echo $album->getId(); ?>#gallery" onclick="javascript:preventSmoothScrollCauseParameter(this);">
												<?php if ($album->getMedia()[0]->getType() == 'images'): ?>
												<img src="<?php echo $album->getMedia()[0]->getLocalLink(); ?>" alt="<?php echo $album->getMedia()[0]->getAltText(); ?>" />
												<?php else: ?>
												<img src="images/content/logo/logo_black.png" alt="Tears of Serenade Logo - abspielbares Medium" />
												<?php endif; ?>
											</a>
										</div>
										<a href="#!">
											<?php echo $album->getTitle(); ?>
										</a>
										<footer>
											<?php echo count($album->getMedia()) . ' Fotos'; ?>
										</footer>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						</div>
					</div>
					
					<!--<div id="news">
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							NEWS
						</h1>
						<div class="headerimpress"></div>
						
						<div class="news">
							<span class="date">May 3, 2014</span><br />
							<h3>
								Neue Fotos vom Videodreh
							</h3>
							<p>
								Es sind neue Fotos online
							</p>
							<footer class="social-buttons">
								<div class="socialicon comments"></div>
								<div class="socialicon facebook"></div>
								<div class="socialicon twitter"></div>
								<div class="socialicon gplus"></div>
								<div class="socialicon pinterest"></div>
								<div class="socialicon stumble"></div>
								<div class="socialicon xing"></div>
								<div class="socialicon linkedin"></div>
								<div class="socialicon rss"></div>
								<div class="socialicon mail"></div>
							</footer>
						</div>
					</div>-->
					<a class="anchor" name="contact" id="contact"></a>				
					<div>
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							KONTAKT
						</h1>
						<div class="headerimpress"></div>
						<form action="index.php?aktion=contact" method="post">
							<fieldset class="noborder">
								<legend>
									E-Mail-Kontaktformular
								</legend>
								<div class="input-element">
									<label for="firma">Firma</label><input type="text" id="firma" name="firma" />
								</div>
								<div class="input-element">
									<label for="name">Name</label><input type="text" id="name" name="name" />
								</div>
								<div class="input-element">
									<label for="email">E-Mail</label><input type="email" id="email" name="email" />
								</div>
								<div class="input-element">
									<label for="topic">Betreff</label><input type="text" id="topic" name="topic" />
								</div>
								<div class="input-element">
									<label for="anliegen">Ihr Anliegen</label>
									<select id="anliegen" name="anliegen">
										<option value="gig" selected="selected">Anfrage zum Auftritt</option>
										<option value="anfrage">Allgemeine Anfragen & Beratung</option>
										<option value="fanpost">Fanpost</option>
										<option value="bug">Fehler auf der Seite</option>
										<option value="sonstiges">Sonstiges</option>
									</select>
								</div>
								<label for="message">Ihre Nachricht:</label><br />
								<textarea name="message" id="message" cols="50" rows="10"></textarea><br />
								<button type="submit">Abschicken</button>
							</fieldset>
						</form>
					</div>
					
					<a class="anchor" name="merch" id="merch"></a>					
					<div class="merch">
						<div class="headerimpress"></div>
						<h1 class="pagetitle">
							MERCH
						</h1>
						<div class="headerimpress"></div>
						<div>
							<img src="images/content/merch/all_merch.jpg" alt="Unser Merchandising Portfolio" />
							<h1>
								SUPPORT YOUR LOCALS
							</h1>
							<p>
								Das alles könnt ihr auf all unseren <a href="index.php#tour" title="Gigübersicht">Gigs</a> erstehen.
								Ihr unterstützt damit die Produktion und das Mastering unserer Songs sowie die Finanzierung von Reise-
								 und Verpflegungskosten zu gagelosen Gigs im Raum Niederbayern.
							</p>
						</div>
					</div>
					
				</div>	
			</div>
		</div>