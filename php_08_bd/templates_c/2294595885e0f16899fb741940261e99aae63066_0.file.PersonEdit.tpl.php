<?php
/* Smarty version 4.5.1, created on 2024-05-28 00:54:48
  from 'D:\paw\htdocs\php_08_bd\app\views\PersonEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66550f38ec2767_56815153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2294595885e0f16899fb741940261e99aae63066' => 
    array (
      0 => 'D:\\paw\\htdocs\\php_08_bd\\app\\views\\PersonEdit.tpl',
      1 => 1716850474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66550f38ec2767_56815153 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_37569188266550f38ebd0b2_00810553', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_37569188266550f38ebd0b2_00810553 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_37569188266550f38ebd0b2_00810553',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="name">imię</label>
            <input id="name" type="text" placeholder="imię" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
">
        </div>
		<div class="pure-control-group">
            <label for="birthdate">data ur.</label>
            <input id="birthdate" type="text" placeholder="data ur." name="birthdate" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->birthdate;?>
">
        </div>     
        <div class="pure-control-group">
            <label for="tele">tele</label>
            <input id="tele" type="text" placeholder="tele" name="tele" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->tele;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
