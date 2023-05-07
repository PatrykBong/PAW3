{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}	

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Kalkulator<br />kredytowy</h1>
								</header>

								<!-- Form -->
									<h2>Policzmy to</h2>

									<form action="{$conf->action_root}calcCompute" method="post">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" id="demo-name"  name="kw" value="{$form->kw}" placeholder="Kwota kredytu" /><br>
												<input type="text" id="demo-name" name="pr" value="{$form->pr}" placeholder="Oprocentowanie" /><br>
												<input type="text" id="demo-name" name="lt" value="{$form->lt}" placeholder="Lata kredytu" />
											</div>
											<div class="col-6 col-12-xsmall">
												{* wyświeltenie listy błędów, jeśli istnieją *}
												{if $msgs->isError()}
													<h4>Wystąpiły błędy: </h4>
													<ol class="err">
													{foreach $msgs->getErrors() as $err}
													{strip}
														<li>{$err}</li>
													{/strip}
													{/foreach}
													</ol>
												{/if}
												
												{* wyświeltenie listy informacji, jeśli istnieją *}
												{if $msgs->isInfo()}
													<h4>Informacje: </h4>
													<ol class="inf">
													{foreach $msgs->getInfos() as $inf}
													{strip}
														<li>{$inf}</li>
													{/strip}
													{/foreach}
													</ol>
												{/if}

												{if isset($wynik->wynik)}
													<h4>Wynik</h4>
													<p class="res">
													{$wynik->wynik}
													</p>
												{/if}
											</div>
											<!-- Break -->
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Send Message" class="primary" /></li>
												</ul>
											</div>
										</div>
									</form>
									<hr />
							</section>
					</div>
{/block}