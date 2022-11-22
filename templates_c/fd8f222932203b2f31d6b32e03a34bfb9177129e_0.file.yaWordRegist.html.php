<?php
/* Smarty version 3.1.29, created on 2022-11-22 02:21:59
  from "C:\xampp\htdocs\ecc_test\templates\yaWordRegist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_637c243789ebc6_35615524',
  'file_dependency' => 
  array (
    'fd8f222932203b2f31d6b32e03a34bfb9177129e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ecc_test\\templates\\yaWordRegist.html',
      1 => 1669017354,
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
function content_637c243789ebc6_35615524 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
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

			// エンターキー押下時のsubmitを無効化
			$(document).on("keypress", "input:not(.allow_submit)", function(event) {
				return event.which !== 13;
			});
			// エンターキー押下時のsubmitを無効化
			$(document).on("keypress", "select:not(.allow_submit)", function(event) {
				return event.which !== 13;
			});
			//表示再現
			$(document).ready(function() {
				// MSGのあるなし
				if ( $(".error_msg").html() != "" ){
					$(".error_section").slideDown('slow')
				}
				$(".close_icon").on('click', function(){
					$(".error_section").slideUp('slow')
				});
				var input_audio_file = document.getElementById("input_audio_file");
			    var audio_data = "";
				// ------------------------------------------------------------
				// Base64化する
				// ------------------------------------------------------------
				File.prototype.convertToBase64 = function(callback){
					var reader = new FileReader();
					reader.onload = function(e) {
						callback(e.target.result)
					};
					reader.onerror = function(e) {
						callback(null);
					};
					reader.readAsDataURL(this);
				};
					/**
					*
					*  登録ボタン押下、必須チェック処理
					*
					**/
					$("#btn_insert").on('click', function(){
					$(".error_section").hide();
				    var word_book_name = $('#word_book_name').val();
				    var word_lang_type =  $('#word_lang_type').val();
	                  if ( word_book_name == "" ) {
						   $('#err_dis').show();
	                       $(".error_section").slideToggle('slow');
		                   $(".error_msg").html("単語名を入力してください。");
		                    $(".divBody").scrollTop(0);
	                        return false;
	                    }
					  if ( word_lang_type == "" ) {
						$('#err_dis').show();
						$(".error_section").slideToggle('slow');
						$(".error_msg").html("単語言語を入力してください。");
						$(".divBody").scrollTop(0);
						return false;
					}
					});
			});
		<?php echo '</script'; ?>
>
</head>
<body class="pushmenu-push">
	<form id="main_form" name="main_form1"
		action="<?php echo @constant('HOME_DIR');?>
YAWordRegist/Save" method="post">
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
image/close_icon.png"
						style="width: 15px; float: right" class="close_icon">
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
						>> <span class="title">YA / 単語登録</span>
					</p>
					<p style="text-align: right; width: 100%;">
						<input type="button" title="戻る" value="" class="btn_back"
							onclick="javascript:doBack('<?php echo @constant('HOME_DIR');?>
YAWordRegist/back')">
					</p>
					<input type="hidden" id="msg" name="msg" value="<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
" />
					<input type="hidden" id="error_msg" name="error_msg" value="<?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
" />
					<input type="text" id="word_id" name="word_id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_id;?>
">
					<input type="hidden" id="audio_data" name="audio_data" value="" />
					<input type="hidden" id="screen_mode" name="screen_mode" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->screen_mode;?>
" />
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_book_name;?>
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
								<td style="width: 240px;"><label>単語言語</label><span
									class="required">※</span>
								</td>
								<td><select name="word_lang_type" id="word_lang_type"
									style="width: 189px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_lang_type;?>
">
									<?php if (!empty($_smarty_tpl->tpl_vars['word_category']->value)) {?> <?php ob_start();
echo ($_smarty_tpl->tpl_vars['form']->value->word_lang_type);
$_tmp1=ob_get_clean();
if ($_tmp1 == '') {?>
										<option value="" 　selected>選択してください。</option>
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
								<td></td>
							</tr>
						</table>
						<br />
						<table>
							<tr class="rb_row1">
								<td></td>
								<td width="75px;"></td>
								<td colspan="2"></td>
								<td width="100px;"></td>
								<td width="400px;"></td> <?php if ($_smarty_tpl->tpl_vars['form']->value->screen_mode == 'update') {?>
								<input id="btn_del" type="button" name="btn_del"
									class="btn_delete"
									onclick="checkDelete('<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
','<?php echo @constant('HOME_DIR');?>
YAWordRegist/delete');"
									style="text-align: left;"> <?php }?>
							</tr>
							<tr>
								<input type="submit" name="submit_add" id="btn_insert"
									name="btn_insert" value="" class="btn_insert"
									style="padding-right: 20px; float: right;">
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
	</form>
	<!--footer-->
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	<!--footer-->
</body>
</html><?php }
}