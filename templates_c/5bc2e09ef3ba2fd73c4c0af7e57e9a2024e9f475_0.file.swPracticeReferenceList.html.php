<?php
/* Smarty version 3.1.29, created on 2022-10-17 05:26:52
  from "D:\xampp\htdocs\eccadmin_dev\templates\swPracticeReferenceList.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_634ccb7c3a4d59_52509944',
  'file_dependency' => 
  array (
    '5bc2e09ef3ba2fd73c4c0af7e57e9a2024e9f475' => 
    array (
      0 => 'D:\\xampp\\htdocs\\eccadmin_dev\\templates\\swPracticeReferenceList.html',
      1 => 1544428972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftMenu.html' => 1,
    'file:header.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_634ccb7c3a4d59_52509944 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SW Practice 参照</title>
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
		
		<link href="<?php echo @constant('HOME_DIR');?>
css/jquery-ui.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/default.css" rel="stylesheet">

		<?php echo '<script'; ?>
>
			// エンターキー押下時のsubmitを無効化
			$(document).on("keypress", "input:not(.allow_submit)", function(event) {
				return event.which !== 13;
			});
			// エンターキー押下時のsubmitを無効化
			$(document).on("keypress", "select:not(.allow_submit)", function(event) {
				return event.which !== 13;
			});
			$(document).ready(function(){

				$('#data_table tr').each(function() {

					var cdname = $(this).find(".course_detail_name").text();
					if(cdname == ""){
						$(this).find(".btn_preview_list").css("display", "none");
					}
				});

				// MSGのあるなし
				if ( $(".error_msg").html() != "" ){

					$(".error_section").slideToggle('slow')
				}

				$(".close_icon").on('click', function(){

					$(".error_section").slideToggle('slow')

					$('#err_dis').slideToggle('slow')

				});

				$('.btn_preview_list').on('click',function(){

					$(this).val('').attr('disabled','disabled');
					return true;
				});
			});
		<?php echo '</script'; ?>
>
	</head>
	<body class="pushmenu-push">
		<form id="main_form" action="<?php echo @constant('HOME_DIR');?>
SWPracticeReferenceList/search" method="post">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="divHeader">
				<!--header-->
					<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<!--header-->
			</div>
			<div class="divBody">
				<div id="err_dis">
					<section class="error_section">
						<img src="<?php echo @constant('HOME_DIR');?>
image/close_icon.png" style="width:15px;float:right" class="close_icon">
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
				</div>
				<input type="hidden" id="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->status;?>
" />
				<input type="hidden" id="search_test_kbn" name="search_test_kbn" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_test_kbn;?>
" />
				<input type="hidden" id="search_course_level" name="search_course_level" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_course_level;?>
" />
				<input type="hidden" id="page" name="page" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->page;?>
" />
				<input type="hidden" id="search_page" name="search_page" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_page;?>
"/>
				<input type="hidden" id="search_course_id" name="search_course_id" />
				<input type="hidden" id="search_course_detail_no" name="search_course_detail_no" />
				<input type="hidden" id="search_test_kbn_type" name="search_test_kbn_type" />
				<input type="hidden" id="search_name" name="search_name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_name;?>
" />
				<input type="hidden" id="search_remarks" name="search_remarks" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_remarks;?>
" />
				<input type="hidden" id="btn_flg" name="btn_flg" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->btn_flg;?>
" />
				<section class="content">
					<p>
						><span class="title">SW 参照 / SW Practice 参照</span>
					</p>
					<table class="main_tbl">
						<tr>
							<td>SW</td>
							<td class="input">
								<?php if (!empty($_smarty_tpl->tpl_vars['test_kbn']->value)) {?>
									<?php
$_from = $_smarty_tpl->tpl_vars['test_kbn']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
										<?php if ((in_array($_smarty_tpl->tpl_vars['item']->value->type,$_smarty_tpl->tpl_vars['search_test_kbn']->value))) {?>
											<label><input type="checkbox" class="test_kbn" name="test_kbn" value='<?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
' checked><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</label>
										<?php } else { ?>
											<label><input type="checkbox" class="test_kbn" name="test_kbn" value='<?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
' ><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</label>
										<?php }?>
									<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
								<?php }?>
							</td>
						</tr>
						<tr>
							<td>レベル</td>
							<td class="input">
								<?php if (!empty($_smarty_tpl->tpl_vars['course_level_list']->value)) {?>
									<?php
$_from = $_smarty_tpl->tpl_vars['course_level_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
										<?php if ((in_array($_smarty_tpl->tpl_vars['item']->value->type,$_smarty_tpl->tpl_vars['search_course_level']->value))) {?>
											<label><input type="checkbox" class="course_level" name="course_level" value='<?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
' checked><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</label>
										<?php } else { ?>
											<label><input type="checkbox" class="course_level" name="course_level" value='<?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
' ><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</label>
										<?php }?>
									<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
?>
								<?php }?>
							</td>
						</tr>
						<tr>
							<td>名称</td>
							<td class="input">
								<input class="text" type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" maxlength = "32" size="30">
							</td>
						</tr>
						<tr>
							<td>備考</td>
							<td class="input">
								 <input class="text" type="text" name="remarks" id="remarks" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->remarks;?>
" maxlength = "32" size="30">
							</td>
						</tr>
						<tr>
							<td>状況</td>
							<td>
								<?php if (!empty($_smarty_tpl->tpl_vars['form']->value->chk_status2 != '')) {?>
									<label><input type="checkbox" id="chk_status2" name="chk_status2" value='0' checked>非公開</label>
								<?php } else { ?>
									<label><input type="checkbox" id="chk_status2" name="chk_status2" value='0'>非公開</label>
								<?php }?>
								<?php if (!empty($_smarty_tpl->tpl_vars['form']->value->chk_status1 != '')) {?>
									<label><input type="checkbox" id="chk_status1" name="chk_status1" value='1' checked>公開</label>
								<?php } else { ?>
									<label><input type="checkbox" id="chk_status1" name="chk_status1" value='1'>公開</label>
								<?php }?>
							</td>
						</tr>
					</table>
					<div align="right" style="width:100%">
						<input type="submit" id="btn_search" name="search" title="検索" class="btn_search" alt="search" value="" style="padding-right:50px;">
					</div>
					<div class="pagging" align="right">
					<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)) {?>
						<?php if ($_smarty_tpl->tpl_vars['form']->value->max_page >= 4) {?>
							<?php if ($_smarty_tpl->tpl_vars['form']->value->page > 1) {?>
								<a href="javascript:doPage(1);">&lt;&lt;</a>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->page-1;?>
);">&lt;</a>
							<?php }?>
							<?php if ((($_smarty_tpl->tpl_vars['form']->value->page+3) == $_smarty_tpl->tpl_vars['form']->value->max_page) || (($_smarty_tpl->tpl_vars['form']->value->page+3) >= $_smarty_tpl->tpl_vars['form']->value->max_page)) {?>
							  	<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['form']->value->max_page+1) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_start = (int)@$_smarty_tpl->tpl_vars['form']->value->max_page-3 < 0 ? max(0, (int)@$_smarty_tpl->tpl_vars['form']->value->max_page-3 + $__section_i_0_loop) : min((int)@$_smarty_tpl->tpl_vars['form']->value->max_page-3, $__section_i_0_loop);
$__section_i_0_total = min(($__section_i_0_loop - $__section_i_0_start), $__section_i_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = $__section_i_0_start; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<?php if ($_smarty_tpl->tpl_vars['form']->value->page == (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
										<label><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</label>
									<?php } else { ?>
										<a href="javascript:doPage(<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
);"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</a>
									<?php }?>
								  <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
							<?php } else { ?>
								<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['form']->value->page+4) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_start = (int)@$_smarty_tpl->tpl_vars['form']->value->page < 0 ? max(0, (int)@$_smarty_tpl->tpl_vars['form']->value->page + $__section_i_1_loop) : min((int)@$_smarty_tpl->tpl_vars['form']->value->page, $__section_i_1_loop);
$__section_i_1_total = min(($__section_i_1_loop - $__section_i_1_start), $__section_i_1_loop);
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = $__section_i_1_start; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<?php if ($_smarty_tpl->tpl_vars['form']->value->page == (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
										<label><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</label>
									<?php } else { ?>
										<a href="javascript:doPage(<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
);"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</a>
									<?php }?>
								<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['form']->value->page <= $_smarty_tpl->tpl_vars['form']->value->max_page-1) {?>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->page+1;?>
);">&gt;</a>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->max_page;?>
);">&gt;&gt;</a>
							<?php }?>
						<?php } else { ?>
							<?php if ($_smarty_tpl->tpl_vars['form']->value->page > 1) {?>
								<a href="javascript:doPage(1);">&lt;&lt;</a>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->page-1;?>
);">&lt;</a>
							<?php } else { ?>
								<a class="disable_link">&lt;</a>
							<?php }?>
							<?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['form']->value->max_page+1) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_start = min(1, $__section_i_2_loop);
$__section_i_2_total = min(($__section_i_2_loop - $__section_i_2_start), $__section_i_2_loop);
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = $__section_i_2_start; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<?php if ($_smarty_tpl->tpl_vars['form']->value->page == (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
									<label><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</label>
								<?php } else { ?>
									<a href="javascript:doPage(<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
);"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</a>
								<?php }?>
							<?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
							<?php if ($_smarty_tpl->tpl_vars['form']->value->page <= $_smarty_tpl->tpl_vars['form']->value->max_page-1) {?>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->page+1;?>
);">&gt;</a>
								<a href="javascript:doPage(<?php echo $_smarty_tpl->tpl_vars['form']->value->max_page;?>
);">&gt;&gt;</a>
							<?php } else { ?>
								<a class="disable_link">&gt;</a>
							<?php }?>
						<?php }?>
					</div>
					<?php }?>
					<table class="tbl_search" id="data_table">
						<tr>
							<th width="120px;">コースID</th>
							<th width="120px;">SW</th>
							<th width="100px;">レベル</th>
							<th >コース名</th>
							<th >コース詳細名</th>
							<th >備考</th>
							<th >登録日</th>
							<th >参照</th>
						</tr>
						<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)) {?>
							<?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_result_2_saved_item = isset($_smarty_tpl->tpl_vars['result']) ? $_smarty_tpl->tpl_vars['result'] : false;
$_smarty_tpl->tpl_vars['result'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['result']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->_loop = true;
$__foreach_result_2_saved_local_item = $_smarty_tpl->tpl_vars['result'];
?>
							<tr>
								<td ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->course_id, ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->name2, ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td ><?php echo $_smarty_tpl->tpl_vars['result']->value->name1;?>
</td>
								<td ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->course_name, ENT_QUOTES, 'UTF-8', true);?>
<br><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->course_name_romaji, ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td class="course_detail_name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->course_detail_name, ENT_QUOTES, 'UTF-8', true);?>
<br><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->course_detail_romaji, ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result']->value->remarks, ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['result']->value->date;?>
</td>
								<td class="td_img">
									<input type="button" class="btn_preview_list" title="参照" name="assign" onclick="transfer('<?php echo $_smarty_tpl->tpl_vars['result']->value->course_id;?>
', '<?php echo $_smarty_tpl->tpl_vars['result']->value->course_detail_no;?>
', '<?php echo $_smarty_tpl->tpl_vars['result']->value->test_kbn;?>
', '<?php echo @constant('HOME_DIR');?>
SWCourseDetailRef/index')">
								</td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['result'] = $__foreach_result_2_saved_local_item;
}
if ($__foreach_result_2_saved_item) {
$_smarty_tpl->tpl_vars['result'] = $__foreach_result_2_saved_item;
}
?>
						<?php }?>
					</table>
				</div>
				</section>
			</div>
			<!--footer-->
				<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!--footer-->
		</form>
		<?php echo '<script'; ?>
 type="text/javascript">
			

				function transfer(course_id, course_detail_no, test_kbn_type, action){

					$("#search_page").val($("#page").val());
					$("#search_course_id").val(course_id);
					$("#search_course_detail_no").val(course_detail_no);
					$("#search_test_kbn_type").val(test_kbn_type);

					var name = $("#name").val();
					$("#search_name").val(name);

					var remarks = $("#remarks").val();
					$("#search_remarks").val(remarks);

					prepareCheckboxData();
					var status = "";

					if ( $('#chk_status1').prop('checked') === true ){

						status += $('#chk_status1').attr('value');
					}

					if ( $('#chk_status2').prop('checked') === true ){

						if ( status != "" ){
							status += ",";
						}

						status += $('#chk_status2').attr('value');
					}

					$('#status').val(status);
					$("#main_form").attr("action", action);
					$("#main_form").submit();
				}

				$(".btn_search").on("click", function(){

					prepareCheckboxData();
					var status = "";

					if ( $('#chk_status1').prop('checked') === true ){

						status += $('#chk_status1').attr('value');
					}

					if ( $('#chk_status2').prop('checked') === true ){

						if ( status != "" ){
							status += ",";
						}

						status += $('#chk_status2').attr('value');
					}
					$("#page").val(1);
					$('#status').val(status);
					$("#btn_flg").val("1");
				});

				function prepareCheckboxData(){

					var test_kbn_list = '';
					var test_kbn_count = $("input.test_kbn:checked").length;
					var count = 0;
					$("#search_test_kbn").val("");
					$("#search_course_level").val("");

					$('input.test_kbn:checked').each(function() {
						count++;
						test_kbn_list += $(this).val();

						if ( count < test_kbn_count ){
							test_kbn_list += ",";
						}
					});
					$("#search_test_kbn").val(test_kbn_list);

					count = 0;
					var course_level_count = $("input.course_level:checked").length;
					var course_level_list = '';

					$('input.course_level:checked').each(function() {
						count++;
						course_level_list += $(this).val();

						if ( count < course_level_count ){
							course_level_list += ",";
						}
					});
					$("#search_course_level").val(course_level_list);
				}

				//ページング
				function doPage(pageNo){

					prepareCheckboxData();
					var status = "";

					if ( $('#chk_status1').prop('checked') === true ){

						status += $('#chk_status1').attr('value');
					}

					if ( $('#chk_status2').prop('checked') === true ){

						if ( status != "" ){
							status += ",";
						}

						status += $('#chk_status2').attr('value');
					}

					$('#status').val(status);
					$("#page").val(pageNo);
					$("#main_form").submit();
				}
			
		<?php echo '</script'; ?>
>
	</body>
</html><?php }
}
