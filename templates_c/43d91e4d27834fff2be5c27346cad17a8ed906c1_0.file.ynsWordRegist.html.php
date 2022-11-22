<?php
/* Smarty version 3.1.29, created on 2022-11-22 08:43:05
  from "C:\xampp\htdocs\ecc_test\templates\ynsWordRegist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_637c7d8934e3a5_10971843',
  'file_dependency' => 
  array (
    '43d91e4d27834fff2be5c27346cad17a8ed906c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ecc_test\\templates\\ynsWordRegist.html',
      1 => 1668740701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftMenu.html' => 1,
    'file:header.html' => 1,
    'file:footer.html' => 2,
  ),
),false)) {
function content_637c7d8934e3a5_10971843 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>単語登録</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="googlebot" content="noindex, nofollow">
	
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/jquery-ui.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/common.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/moment.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/nicEdit-latest.js"><?php echo '</script'; ?>
>
	
	<link href="<?php echo @constant('HOME_DIR');?>
css/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo @constant('HOME_DIR');?>
css/default.css" rel="stylesheet">
	<link href="<?php echo @constant('HOME_DIR');?>
css/style.css" rel="stylesheet">
	<?php echo '<script'; ?>
 type="text/javascript">

		//表示再現
		$(document).ready(function () {
			// MSGのあるなし
			if ($(".error_msg").html() != "") {
				$(".error_section").slideDown('slow')
			}
			$(".close_icon").on('click', function () {
				$(".error_section").slideUp('slow')
			});
			/**
			*
			*  登録ボタン押下、必須チェック処理
			*
			**/
			$("#btn_insert").on('click', function () {
				$(".error_section").hide();
				var word_book_name = $('#word_book_name').val();
				var word_lang_type = $('#word_lang_type').val();
				var trans_lang_type = $('#trans_lang_type').val();
				if (word_book_name == "") {
					$('#err_dis').show();
					$(".error_section").slideToggle('slow');
					$(".error_msg").html("単語名を入力してください。");
					$(".divBody").scrollTop(0);
					return false;
				}
				if (word_lang_type == "") {
					$('#err_dis').show();
					$(".error_section").slideToggle('slow');
					$(".error_msg").html("単語言語を入力してください。");
					$(".divBody").scrollTop(0);
					return false;
				}
				if (trans_lang_type == "") {
					$('#err_dis').show();
					$(".error_section").slideToggle('slow');
					$(".error_msg").html("訳言語を入力してください。");
					$(".divBody").scrollTop(0);
					return false;
				}
			});
		});
	<?php echo '</script'; ?>
>
</head>

<body class="pushmenu-push">
	<form id="main_form" name="main_form1" action="<?php echo @constant('HOME_DIR');?>
YNSWordRegist/Save" method="post">
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="divHeader">
			<!--header-->
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!--header-->
		</div>
		<div class="divBody">
			<div class="main">
				<section class="error_section">
					<img src="<?php echo @constant('HOME_DIR');?>
image/close_icon.png" style="width: 15px; float: right"
						class="close_icon">
					<?php if (!empty($_smarty_tpl->tpl_vars['error_msg']->value)) {?>
					<div class="error_msg"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>
					<?php } elseif (!empty($_smarty_tpl->tpl_vars['info_msg']->value)) {?>
					<div class="error_msg"><?php echo $_smarty_tpl->tpl_vars['info_msg']->value;?>
</div>
					<?php } else { ?>
					<div class="error_msg"></div>
					<?php }?>
				</section>
				<section class="content">
					<p>
						>> <span class="title">YNS / 単語登録</span>
					</p>
					<p style="text-align: right; width: 100%;">
						<input type="button" title="戻る" value="" class="btn_back1"
							onclick="javascript:doBack('<?php echo @constant('HOME_DIR');?>
YNSWordRegist/back')">
					</p>
					<input type="hidden" id="msg" name="msg" value="<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
" />
					<input type="hidden" id="error_msg" name="error_msg" value="<?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
" />
					<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
					<input type="hidden" id="screen_mode" name="screen_mode" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->screen_mode;?>
" />
					<input type="hidden" id="search_word" name="search_word" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_word;?>
" />
					<input type="hidden" id="search_translation" name="search_translation"
						value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_translation;?>
" />
					<input type="hidden" id="search_org_id" name="search_org_id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_org_id;?>
" />
					<input type="hidden" id="search_page" name="search_page" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_page;?>
" />
					<input type="hidden" id="search_page_row" name="search_page_row" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_page_row;?>
" />
					<input type="hidden" id="search_page_order_column" name="search_page_order_column"
						value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_page_order_column;?>
" />
					<input type="hidden" id="search_page_order_dir" name="search_page_order_dir"
						value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_page_order_dir;?>
" />
					<div width="100%">

						<table width="100%">
							<tr>
								<td style="width: 240px;">単語名<span class="required">※</span></td>
								<td><input type="text" class="text" id="word_book_name" name="word_book_name"
										value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_book_name;?>
" maxlength="512" size="30">
								</td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td style="width: 240px;"><label>単語言語</label><span class="required">※</span>
								</td>
								<td><select name="word_lang_type" id="word_lang_type" style="width: 189px;"
										value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_lang_type;?>
">
										<?php if (!empty($_smarty_tpl->tpl_vars['word_category']->value)) {?> <?php ob_start();
echo ($_smarty_tpl->tpl_vars['form']->value->word_lang_type);
$_tmp1=ob_get_clean();
if ($_tmp1 == '') {?>
										<option value="" selected>選択してください。</option>
										<?php
$_from = $_smarty_tpl->tpl_vars['word_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_word_0_saved_item = isset($_smarty_tpl->tpl_vars['word']) ? $_smarty_tpl->tpl_vars['word'] : false;
$_smarty_tpl->tpl_vars['word'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['word']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['word']->value) {
$_smarty_tpl->tpl_vars['word']->_loop = true;
$__foreach_word_0_saved_local_item = $_smarty_tpl->tpl_vars['word'];
?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['word']->value->type;?>
> <?php echo $_smarty_tpl->tpl_vars['word']->value->name;?>
</option>
										<?php
$_smarty_tpl->tpl_vars['word'] = $__foreach_word_0_saved_local_item;
}
if ($__foreach_word_0_saved_item) {
$_smarty_tpl->tpl_vars['word'] = $__foreach_word_0_saved_item;
}
?> <?php }?> <?php ob_start();
echo $_smarty_tpl->tpl_vars['form']->value->word_lang_type;
$_tmp2=ob_get_clean();
if (!empty($_tmp2)) {?>
										<option value="">選択してください。</option>
										<?php
$_from = $_smarty_tpl->tpl_vars['word_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_word_1_saved_item = isset($_smarty_tpl->tpl_vars['word']) ? $_smarty_tpl->tpl_vars['word'] : false;
$_smarty_tpl->tpl_vars['word'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['word']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['word']->value) {
$_smarty_tpl->tpl_vars['word']->_loop = true;
$__foreach_word_1_saved_local_item = $_smarty_tpl->tpl_vars['word'];
?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['word']->value->type;?>

											<?php ob_start();
echo ($_smarty_tpl->tpl_vars['form']->value->word_lang_type);
$_tmp3=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['word']->value->type;
$_tmp4=ob_get_clean();
if ($_tmp3 == $_tmp4) {?> selected <?php }?> >
											<?php echo $_smarty_tpl->tpl_vars['word']->value->name;?>
</option> <?php
$_smarty_tpl->tpl_vars['word'] = $__foreach_word_1_saved_local_item;
}
if ($__foreach_word_1_saved_item) {
$_smarty_tpl->tpl_vars['word'] = $__foreach_word_1_saved_item;
}
?> <?php }?> <?php }?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td style="width: 240px;"><label>訳言語</label><span class="required">※</span>
								</td>
								<td><select name="trans_lang_type" id="trans_lang_type" style="width: 189px;"
										value="<?php echo $_smarty_tpl->tpl_vars['form']->value->trans_lang_type;?>
"> <?php if (!empty($_smarty_tpl->tpl_vars['trans_category']->value)) {?> <?php ob_start();
echo ($_smarty_tpl->tpl_vars['form']->value->trans_lang_type);
$_tmp5=ob_get_clean();
if ($_tmp5 == '') {?>
										<option value="" selected>選択してください。</option> <?php
$_from = $_smarty_tpl->tpl_vars['trans_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tran_2_saved_item = isset($_smarty_tpl->tpl_vars['tran']) ? $_smarty_tpl->tpl_vars['tran'] : false;
$_smarty_tpl->tpl_vars['tran'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['tran']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tran']->value) {
$_smarty_tpl->tpl_vars['tran']->_loop = true;
$__foreach_tran_2_saved_local_item = $_smarty_tpl->tpl_vars['tran'];
?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['tran']->value->type;?>
> <?php echo $_smarty_tpl->tpl_vars['tran']->value->name;?>
</option>
										<?php
$_smarty_tpl->tpl_vars['tran'] = $__foreach_tran_2_saved_local_item;
}
if ($__foreach_tran_2_saved_item) {
$_smarty_tpl->tpl_vars['tran'] = $__foreach_tran_2_saved_item;
}
?> <?php } else { ?>
										<option value="">選択してください。</option> <?php
$_from = $_smarty_tpl->tpl_vars['trans_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tran_3_saved_item = isset($_smarty_tpl->tpl_vars['tran']) ? $_smarty_tpl->tpl_vars['tran'] : false;
$_smarty_tpl->tpl_vars['tran'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['tran']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tran']->value) {
$_smarty_tpl->tpl_vars['tran']->_loop = true;
$__foreach_tran_3_saved_local_item = $_smarty_tpl->tpl_vars['tran'];
?> <?php ob_start();
echo ($_smarty_tpl->tpl_vars['form']->value->trans_lang_type);
$_tmp6=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['tran']->value->type;
$_tmp7=ob_get_clean();
if ($_tmp6 == $_tmp7) {?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['tran']->value->type;?>

											selected><?php echo $_smarty_tpl->tpl_vars['tran']->value->name;?>
</option> <?php } else { ?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['tran']->value->type;?>
 ><?php echo $_smarty_tpl->tpl_vars['tran']->value->name;?>
</option> <?php }?>
										<?php
$_smarty_tpl->tpl_vars['tran'] = $__foreach_tran_3_saved_local_item;
}
if ($__foreach_tran_3_saved_item) {
$_smarty_tpl->tpl_vars['tran'] = $__foreach_tran_3_saved_item;
}
?> <?php }?> <?php }?>
									</select>
								</td>
							</tr>
						</table>
						<br />
						<table>
							<tr>
								<input type="submit" name="submit_add" id="btn_insert" name="btn_insert" value=""
									class="btn_insert1" style="padding-right: 20px; float: right;">
							</tr>
						</table>
					</div>
				</section>
				<!-- End Content -->
			</div>
			<!-- End Main -->
		</div>
		<!-- End divBody -->
		<div class="divFooter">
			<!--footer-->
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!--footer-->
		</div>
		</div>
	</form>
	<!--footer-->
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	<!--footer-->
</body>

</html><?php }
}
