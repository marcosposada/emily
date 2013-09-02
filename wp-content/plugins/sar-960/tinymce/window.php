<?php
/*
wp sar 960 tinymce
*/
// look up for the path
@ require('../../../../wp-config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') )
	wp_die(__("You are not allowed to be here"));

global $wpdb;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SAR 960</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
.colPicker {
	float: left;
	width: 150px;
}
.colPicker tr {
	cursor: hand;
}
.colPicker td {
	background-color: #006599;
	color: #fff;
	text-align: center;
	font-family: arial,helvetica,sans-serif;
	font-size: 12px;
	font-weight: bold;
	padding: 4px;
	border-top: 1px solid #0097E2;
	border-left: 1px solid #0097E2;
	border-right: 1px solid #003E5E;
	border-bottom: 1px solid #003E5E;
	-moz-border-radius: 5px;
	border-radius: 5px;
	cursor: hand;
}
</style>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript">
var colTxt = ' ';
function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function insertColumns(col) {
	colTxt = ' ';
	switch(col)
	{
		/* single columns */
		case 'one':
			colTxt += '[960_one]Quarter Column[/960_one] ';
			break;
		case 'two':
			colTxt += '[960_two]Quarter Column[/960_two] ';
			break;
		case 'three':
			colTxt += '[960_three]Quarter Column[/960_three] ';
			break;
		case 'four':
			colTxt += '[960_four]Quarter Column[/960_four] ';
			break;
		case 'five':
			colTxt += '[960_five]Quarter Column[/960_five] ';
			break;
		case 'six':
			colTxt += '[960_six]Quarter Column[/960_six] ';
			break;
		case 'seven':
			colTxt += '[960_seven]Quarter Column[/960_seven] ';
			break;
		case 'eight':
			colTxt += '[960_eight]Quarter Column[/960_eight] ';
			break;
		case 'nine':
			colTxt += '[960_nine]Quarter Column[/960_nine] ';
			break;
		case 'ten':
			colTxt += '[960_ten]Quarter Column[/960_ten] ';
			break;
		case 'eleven':
			colTxt += '[960_eleven]Quarter Column[/960_eleven] ';
			break;
		case 'twelve':
			colTxt += '[960_twelve]Quarter Column[/960_twelve] ';
			break;
	}
	insertText();
}

function singleInsert(){
	sel = document.getElementById("selSingles");
	selVal = sel.options[sel.selectedIndex].value;
	insertColumns(selVal);
}

function insertText(){
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, colTxt);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}
</script>
<base target="_self" />
<style type="text/css">
img {
	border: none;
}
input[type="text"] {
	font-size: 12px;
	border: 1px solid #777;
	line-height: 14px;
	height: 16px;
}
select {
	font-size: 12px;
}
.panel {
	margin-bottom: 8px;
}
.hdrRow {
	padding-top: 4px;
	padding-bottom: 4px;
	font-weight: bold;
}
</style>
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');">
<form name="columnPicker" action="#">

		<div class="panel">

			<table border="0" cellpadding="2" cellspacing="0" width="100%">
				<tr>
					<td class="hdrRow">
						<h3>Insert Single Column</h3>
					</td>
				</tr>
				<tr>

					<td  valign="top">
						<select id="selSingles">
						<option value="one">One Column</option>
						<option value="two">Two Column</option>
						<option value="three">Three Column</option>
						<option value="four">Four Column</option>
						<option value="five">Five Column</option>
						<option value="six">Six Column</option>
						<option value="seven">Seven Column</option>
						<option value="eight">Eight Column</option>
						<option value="nine">Nine Column</option>
						<option value="ten">Ten Column</option>
						<option value="eleven">Eleven Column</option>
						<option value="twelve">Twelve Column</option>
						</select>
						<input type="button" id="insert" name="insert" value="Insert" onclick="singleInsert()">
					</td>

				</tr>
			</table>
		</div><!-- panel -->

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" />
		</div>
	</div><!-- mceActionPanel -->

</form>
</body>
</html>