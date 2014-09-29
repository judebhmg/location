<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <link rel='shortcut icon' type='image/x-icon' href='{$smarty.const.HTML_PUBLIC}images/icones/favicon.ico' />
       <title>Location - MarketList</title>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
       <link rel="stylesheet" type="text/css" href="{$smarty.const.HTML_PUBLIC}css/marketlist.css">
       <link rel="stylesheet" type="text/css" href="{$smarty.const.HTML_PUBLIC}js/pgwmodal/pgwmodal.min.css">
       <link rel="stylesheet" type="text/css" href="{$smarty.const.HTML_PUBLIC}css/SpryTabbedPanels.css">
       <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
       <link rel="stylesheet" type="text/css" href="{$smarty.const.HTML_PUBLIC}css/dataTables.tableTools.min.css">
       <script type="text/javascript">
       var url_public = "{$smarty.const.HTML_PUBLIC}";
       </script>
   </head>

   <body>
      {if Message::getMessage() != null}
        <script type="text/javascript">alert('{Message::getMessage()}');</script>
        {Message::deleteMessage()}
      {/if}
   		<div id="content">