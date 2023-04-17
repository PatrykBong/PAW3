<?php
/* Smarty version 4.3.1, created on 2023-04-15 14:09:08
  from 'C:\xampp\htdocs\php_04_szablony_smarty\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_643a93e420eba8_70623307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1d04ff6f87b60f2513a692aec8ab8863cec4d5d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\calc.html',
      1 => 1681560543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643a93e420eba8_70623307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1588855861643a93e41fd488_38226668', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_468091788643a93e41fe308_85714447', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_1588855861643a93e41fd488_38226668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1588855861643a93e41fd488_38226668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_468091788643a93e41fe308_85714447 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_468091788643a93e41fe308_85714447',
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

									<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" id="demo-name"  name="kw" value="" placeholder="Kwota kredytu" /><br>
												<input type="text" id="demo-name" name="pr" value="" placeholder="Oprocentowanie" /><br>
												<input type="text" id="demo-name" name="lt" value="" placeholder="Lata kredytu" />
											</div>
											<div class="col-6 col-12-xsmall">
																								<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
													<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
														<h4>Wystąpiły błędy: </h4>
														<ol class="err">
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
														<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
														<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
														</ol>
													<?php }?>
												<?php }?>

																								<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
													<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
														<h4>Informacje: </h4>
														<ol class="inf">
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
														<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
														<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
														</ol>
													<?php }?>
												<?php }?>

												<?php if ((isset($_smarty_tpl->tpl_vars['wynik']->value))) {?>
													<h4>Wynik</h4>
													<p class="res">
													<?php echo $_smarty_tpl->tpl_vars['wynik']->value;?>

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
