<?php
/* Smarty version 4.5.1, created on 2024-05-28 00:54:39
  from 'D:\paw\htdocs\php_08_bd\app\views\PersonList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66550f2f2f0d27_41925996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1a9c1a1357b14765b14b21d2c31945851035a1b' => 
    array (
      0 => 'D:\\paw\\htdocs\\php_08_bd\\app\\views\\PersonList.tpl',
      1 => 1716850382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66550f2f2f0d27_41925996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1500407466550f2f2e35c6_76454391', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_132515321266550f2f2e7ac2_85536317', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1500407466550f2f2e35c6_76454391 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1500407466550f2f2e35c6_76454391',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_132515321266550f2f2e7ac2_85536317 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_132515321266550f2f2e7ac2_85536317',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowa osoba</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>imię</th>
		<th>nazwisko</th>
		<th>data ur.</th>
		<th>tele</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["birthdate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["tele"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
