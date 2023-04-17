<?php
/* Smarty version 4.3.1, created on 2023-04-17 13:44:34
  from 'C:\xampp\htdocs\php_05_obiektowosc\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_643d3122886d67_55954351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03945afc4103935d986b12f9b08348c37b410722' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_obiektowosc\\app\\calc.html',
      1 => 1681731872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643d3122886d67_55954351 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_484455253643d312287a881_62610382', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1075205030643d312287b1a1_29348717', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_484455253643d312287a881_62610382 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_484455253643d312287a881_62610382',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1075205030643d312287b1a1_29348717 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1075205030643d312287b1a1_29348717',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
	

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Kalkulator<br />kredytowy</h1>
								</header>

								<!-- Form -->
									<h2>Policzmy to</h2>

									<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" id="demo-name"  name="kw" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
" placeholder="Kwota kredytu" /><br>
												<input type="text" id="demo-name" name="pr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
" placeholder="Oprocentowanie" /><br>
												<input type="text" id="demo-name" name="lt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
" placeholder="Lata kredytu" />
											</div>
											<div class="col-6 col-12-xsmall">
																								<?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
													<h4>Wystąpiły błędy: </h4>
													<ol class="err">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
													<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</ol>
												<?php }?>
												
																								<?php if ($_smarty_tpl->tpl_vars['messages']->value->isInfo()) {?>
													<h4>Informacje: </h4>
													<ol class="inf">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
													<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</ol>
												<?php }?>

												<?php if ((isset($_smarty_tpl->tpl_vars['wynik']->value->wynik))) {?>
													<h4>Wynik</h4>
													<p class="res">
													<?php echo $_smarty_tpl->tpl_vars['wynik']->value->wynik;?>

													</p>
												<?php }?>
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
<?php
}
}
/* {/block 'content'} */
}
