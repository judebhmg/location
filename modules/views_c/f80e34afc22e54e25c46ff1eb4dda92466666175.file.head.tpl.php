<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 16:05:57
         compiled from "C:\xampp\htdocs\location\modules\views\inc\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2334453dfeeec5301a2-94032754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f80e34afc22e54e25c46ff1eb4dda92466666175' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\head.tpl',
      1 => 1411499153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2334453dfeeec5301a2-94032754',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53dfeeec53bd26_63691883',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53dfeeec53bd26_63691883')) {function content_53dfeeec53bd26_63691883($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <link rel='shortcut icon' type='image/x-icon' href='<?php echo @constant('HTML_PUBLIC');?>
images/icones/favicon.ico' />
       <title>Location - MarketList</title>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
       <link rel="stylesheet" type="text/css" href="<?php echo @constant('HTML_PUBLIC');?>
css/marketlist.css">
       <link rel="stylesheet" type="text/css" href="<?php echo @constant('HTML_PUBLIC');?>
js/pgwmodal/pgwmodal.min.css">
       <link rel="stylesheet" type="text/css" href="<?php echo @constant('HTML_PUBLIC');?>
css/SpryTabbedPanels.css">
       <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
       <link rel="stylesheet" type="text/css" href="<?php echo @constant('HTML_PUBLIC');?>
css/dataTables.tableTools.min.css">
       <script type="text/javascript">
       var url_public = "<?php echo @constant('HTML_PUBLIC');?>
";
       </script>
   </head>

   <body>
      <?php if (Message::getMessage()!=null) {?>
        <script type="text/javascript">alert('<?php echo Message::getMessage();?>
');</script>
        <?php echo Message::deleteMessage();?>

      <?php }?>
   		<div id="content"><?php }} ?>
