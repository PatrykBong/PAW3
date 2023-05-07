<?php
/* Smarty version 4.3.1, created on 2023-05-07 18:37:49
  from 'C:\xampp\htdocs\php_06_nowastruktura\app\views\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6457d3ddcc2801_98965943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a97b54efe0572c74f685538e8c0babea5979d65' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06_nowastruktura\\app\\views\\calc.tpl',
      1 => 1683477277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6457d3ddcc2801_98965943 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7050459106457d3ddcb3100_97971681', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12939613436457d3ddcb39c2_89362671', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_7050459106457d3ddcb3100_97971681 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_7050459106457d3ddcb3100_97971681',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_12939613436457d3ddcb39c2_89362671 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12939613436457d3ddcb39c2_89362671',
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

									<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" id="demo-name"  name="kw" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
" placeholder="Kwota kredytu" /><br>
												<input type="text" id="demo-name" name="pr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pr;?>
" placeholder="Oprocentowanie" /><br>
												<input type="text" id="demo-name" name="lt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lt;?>
" placeholder="Lata kredytu" />
											</div>
											<div class="col-6 col-12-xsmall">
																								<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
													<h4>Wystąpiły błędy: </h4>
													<ol class="err">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
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
												
																								<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
													<h4>Informacje: </h4>
													<ol class="inf">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
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
