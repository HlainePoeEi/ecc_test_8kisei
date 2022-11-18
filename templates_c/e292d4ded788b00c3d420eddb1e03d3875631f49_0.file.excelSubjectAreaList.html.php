<?php
/* Smarty version 3.1.29, created on 2022-10-13 11:46:58
  from "/var/www/html/eccadmin_dev/templates/excelSubjectAreaList.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_63477c22249d52_14685590',
  'file_dependency' => 
  array (
    'e292d4ded788b00c3d420eddb1e03d3875631f49' => 
    array (
      0 => '/var/www/html/eccadmin_dev/templates/excelSubjectAreaList.html',
      1 => 1553234205,
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
function content_63477c22249d52_14685590 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
	<title>教科エクセル登録</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="googlebot" content="noindex, nofollow">
		<link href="<?php echo @constant('HOME_DIR');?>
css/jquery-ui.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/default.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/style.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/excelsubjectarealist.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/datatables.css" rel="stylesheet">
		<link href="<?php echo @constant('HOME_DIR');?>
css/datatables.min.css" rel="stylesheet">
		
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
js/datatables.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/datatables.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/moment.js"><?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
>
			$(document).ready(function(){
				// MSGのあるなし
				if ( $(".error_msg").html() != "" ){
					$(".error_section").slideDown('slow')
				}

				$(".close_icon").on('click',function(){
					$(".error_section").slideUp('slow')
				});

				// ------------------------------------------------------------
				// Base64化する
				// ------------------------------------------------------------
				File.prototype.convertToBase64 = function(callback){
					var reader = new FileReader();
					reader.onload = function(e){
					callback(e.target.result)
					};
					reader.onerror = function(e){
					callback(null);
					};
					reader.readAsDataURL(this);
				};

				function getFile(filePath){
					return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
				}

				// イベントを隠しボタンに変更する
				document.getElementById('img_btn').addEventListener('click',function(){
					document.getElementById('input_file').click();
				});

				// ------------------------------------------------------------
				// ファイルを選択した時に実行されるイベント
				// ------------------------------------------------------------
				$("input[type=file]#input_file").on("change", function (){
					document.getElementById('org-valid').style.display= "none";
					var file_name = getFile(input_file.value);
					// ファイルのタイプチェック
					var fileExtension = ['xlsx','xls','xlsm','csv'];

					if ( $.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1 ){

						$('#input_file').val('');
						$("#file_name").val('');
						$("#img_flg").val(0);

						error_msg = "正しくフィルを選択してください。";
						$('#err_dis').show();
						$(".error_section").slideDown('slow');
						$(".error_msg").html(error_msg);
						return false;

					}else {
						var image_data = "";
						var selectedFile = this.files[0];
						// 画像ファイルデータ設定
						if ( selectedFile != null ){

							selectedFile.convertToBase64(function(base64){
							image_data = base64;
							$("#image_data").val(base64);
							});

						}else {
							image_data = "";
							$("#image_data").val("");
						}

						var fileName = $('input[type=file]').val();
						var clean = fileName.split('\\').pop();
						$("#file_name").val(clean);
						$("#img_flg").val(1);
						$('#copy_image_file').val('');

						// 画像ファイル拡張子設定
						if ( input_file.value != "" ){

							image_ext = "." + input_file.value.split('.').pop();
							$("#image_ext").val(image_ext);
						}
					}
					$('.display').hide();
					$('#hide1').show();
					$('#hide2').show();
					return true;
				});

				//データテーブルを表示する
				var dataArray = $("#dataArray").val();
				if ( dataArray != "" ){

					var t = $('#stu_tbl').DataTable({
						"scrollY": 300,
						"scrollX": true,
						"ordering": false,
						"pageLength": 100,//デフォルトの件表示
						"oLanguage": {
							"sUrl": "<?php echo @constant('HOME_DIR');?>
files/japanese.json"
						}
					});
					t.on( 'draw.dt', function (){
						var PageInfo = $('#stu_tbl').DataTable().page.info();
						t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
							cell.innerHTML = i+1+ PageInfo.start;
						});
					});
				}

				var rowCount = $('#stu_tbl tr').length - 1;
				var colCount = $('#stu_tbl th').length - 1;
				var org_id;
				var subject_area_name;
				var subject_area_name_romaji;
				var start_period;
				var end_period;
				var disp_no;
				var remarks;
				var subject_area_data = [];
				for ( var h = 0; h <= colCount - 1; h++ ){
					var header = document.getElementById("0r"+ h + "c").innerHTML;
					if ( header == "組織ID" ){

						org_id = h + "c";
					}else if ( header == "教科名" ){

						subject_area_name = h + "c";
					}else if ( header == "読み" ){

						subject_area_name_romaji = h + "c";
					}else if ( header == "利用開始" ){

						start_period = h + "c";
					}else if ( header == "利用終了" ){

						end_period = h + "c";
					}else if ( header == "備考" ){

						remarks = h + "c";
					}else if ( header == "表示順" ){

						disp_no = h + "c";
					}
				}

				document.getElementById("subject_area_name").setAttribute('value',subject_area_name);
				document.getElementById("subject_area_name_romaji").setAttribute('value',subject_area_name_romaji);
				document.getElementById("org_id").setAttribute('value',org_id);
				document.getElementById("start_period").setAttribute('value',start_period);
				document.getElementById("end_period").setAttribute('value',end_period);
				document.getElementById("disp_no").setAttribute('value',disp_no);
				document.getElementById("remarks").setAttribute('value',remarks);

				for ( var k = 1; k <= rowCount; k++ ){

					var table = $('#stu_tbl').dataTable();
					var rowOrg_id = document.getElementById(""+k+"r"+org_id).innerHTML;
					var rowSub_area_name = document.getElementById(""+k+"r"+subject_area_name).innerHTML;
					var rowSub_area_name_romaji = document.getElementById(""+k+"r"+subject_area_name_romaji).innerHTML;
					var rowDisp_no = document.getElementById(""+k+"r"+disp_no).innerHTML;
					var rowStart_period = document.getElementById(""+k+"r"+start_period).innerHTML;
					var rowEnd_period = document.getElementById(""+k+"r"+end_period).innerHTML;
					var rowRemarks = document.getElementById(""+k+"r"+remarks).innerHTML;

					if ( rowOrg_id == "" && rowSub_area_name_romaji == "" && rowSub_area_name == "" && rowStart_period == "" && rowEnd_period == "" && rowDisp_no == "" && rowRemarks == ""){

						table.fnDeleteRow( table.$('#'+k)[0], null, false );
					}else {

						array = [rowOrg_id,rowSub_area_name,rowSub_area_name_romaji,rowStart_period,rowEnd_period,rowDisp_no,rowRemarks];
						subject_area_data.push(array);
					}
				}

				$('.display').show();
				if ( $("#btn_flg").val() == 1 ){
					$('#hide1').hide();
					$('#hide2').hide();
				}

				//登録ボッタン処理
				$("#btn_insert").on('click',function(e){

					var org_id = document.getElementById('org_id').value;
					var err_array = [];
					var validate_flg = 1;
					var err_content;
					if ( $(".error_msg").html() != "" ) {

						$(".error_section").slideDown('slow')
					}

					var table = $('#stu_tbl').DataTable();
					var rowCount = table.rows().data();
					if ( rowCount.length == 0 ){

						$('#err_dis').show();
						$(".error_section").slideDown('slow');
						$(".error_msg").html(" エクセルファイルにデータを記入してください。");
						$(".divBody").scrollTop(0);
						return false;
					}

					//最大登録できる件数より多い場合、エラー
					var sub_area_max_count = $("#sub_area_max_count").val();
					if ( subject_area_data.length > sub_area_max_count ){

						$('#err_dis').show();
						$(".error_section").slideDown('slow');
						$(".error_msg").html("登録件数は"+sub_area_max_count+"件以内です。");
						$(".divBody").scrollTop(0);
						return false;
					}
					var org_Array=[];

					// 教科情報チェック
					for ( var i = 0; i < subject_area_data.length ; i++ ) {

						validate_flg = 1;
						var s_org_id = subject_area_data[i][0] ;
						var s_name = subject_area_data[i][1] ;
						var s_name_romaji = subject_area_data[i][2] ;
						var s_start_period = subject_area_data[i][3] ;
						var s_end_period = subject_area_data[i][4] ;
						var s_disp_no = subject_area_data[i][5] ;
						var s_remarks = subject_area_data[i][6] ;
						var st_dt = new Date(s_start_period);
						var ed_dt = new Date(s_end_period);

						var d = new Date();
						var todayDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
						if( s_org_id != "") {
							org_Array.push(s_org_id);
						}

						//教科情報チェック
						if(s_org_id == ""){
							validate_flg = 0;
							err_content = "組織IDが正しくありません。";

						//教科名チェック
						}else if ( s_name == "" || s_name.length > 32 ){
							validate_flg = 0;
							err_content = "教科名が正しくありません。";

						}else if ((err_msg = characterCheck(s_name)) != null){
							validate_flg = 0;
							err_content = "教科名"+ err_msg;
						// 読みチェック
						}else if ( s_name_romaji.length > 32 ){

							validate_flg = 0;
							err_content = "読みが正しくありません。";
						}else  if ( (err_msg = characterCheck(s_name_romaji)) != null){
							validate_flg = 0;
							err_content =  "読みに「"+ err_msg;
						// 利用開始チェック
						}else if ( s_start_period == "" || s_start_period.length > 10 || !dateFormat(moment(st_dt).format('Y-MM-DD')) ){

							validate_flg = 0;
							err_content = "利用開始が正しくありません。";

						// 利用終了チェック
						}else if ( s_end_period == "" || s_end_period.length > 10 || !dateFormat(moment(ed_dt).format('Y-MM-DD')) || Date.parse(s_start_period) > Date.parse(s_end_period) ){

							validate_flg = 0;
							err_content = "利用終了が正しくありません。";

						// 備考チェック
						}else if ( s_disp_no.length > 3 ){
							// 表示順チェック
							validate_flg = 0;
							err_content = "表示順が正しくありません。";

						}else if ( s_remarks.length > 512 ){

							validate_flg = 0;
							err_content = "備考が正しくありません。";

						}else  if ((err_msg = characterCheck(s_remarks)) != null){
							validate_flg = 0;
							err_content =  "備考"+ err_msg;
						}
						// エーラがある場合、
						if ( validate_flg == 0 ) {
							err_array.push(i+1," 行目の ", err_content , "<br/>");
						}

					}

					// エクセルに重複したデータをチェックする
					var rowCount = subject_area_data.length ;
					var sub_area_name='';
					var temp = [];
					var result_dup_err = [];
					var arr = [];
					for ( i = 0; i < rowCount ; i++ ){
						sub_area_name = subject_area_data[i][1].replace(/,/g , "escape comma");
						temp.push(sub_area_name);
					}
					function isEquala(currentValue){

						return currentValue == org_Array[0] ;

					}

					result_dup_err=dupCheck(temp);
					// エラーがある場合エーラメッセージを表す
					if ( err_array.length != 0 ){

						for ( j = 0; j < err_array.length -1; j++ ){

							$('#err_dis').show();
							$(".error_section").slideDown('slow');
							$(".error_msg").html(err_array);
							$(".divBody").scrollTop(0);
						}
						return false;

					}else if (!org_Array.every(isEquala)){
						$('#err_dis').show();
						$(".error_section").slideDown('slow');
						$(".error_msg").html("<?php echo @constant('E027');?>
");
						$(".divBody").scrollTop(0);

					}else if ( result_dup_err.length != 0 ){
						dup_errMsg = "登録ファイルの "+result_dup_err + " 行目が同じ教科名になっています。";
						for ( j = 0; j < result_dup_err.length -1; j++ ){

							$('#err_dis').show();
							$(".error_section").slideDown('slow');
							$(".error_msg").html(dup_errMsg);
							$(".divBody").scrollTop(0);
						}
						return false;
					}else {

						//次へボタンの処理
						var action = '<?php echo @constant('HOME_DIR');?>
ExcelSubjectAreaList/isValid';
						var rowCount = subject_area_data.length ;

						for ( i = 0; i < rowCount ; i++ ){

							//escape comma 処理
							subject_area_data[i][0] = subject_area_data[i][0].replace(/,/g , "escape comma");//組織ID
							subject_area_data[i][1] = subject_area_data[i][1].replace(/,/g , "escape comma");//教科名
							subject_area_data[i][2] = subject_area_data[i][2].replace(/,/g , "escape comma");//読み
							subject_area_data[i][3] = subject_area_data[i][3].replace(/,/g , "escape comma");//利用開始
							subject_area_data[i][4] = subject_area_data[i][4].replace(/,/g , "escape comma");//利用終了
							subject_area_data[i][5] = subject_area_data[i][5].replace(/,/g , "escape comma");//表示順
							subject_area_data[i][6] = subject_area_data[i][6].replace(/,/g , "escape comma");//備考
							arr.push(subject_area_data[i]);
						}

						$("#main_form").attr("action", action);
						$("#subject_area_data").val(arr);
						$("#main_form").submit();
					}
				});

			});
    	<?php echo '</script'; ?>
>
	</head>
	<body class="pushmenu-push">
		<form action="<?php echo @constant('HOME_DIR');?>
ExcelSubjectAreaList/save" method="post" id="main_form">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="divHeader">
				<!--header-->
					<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<!--header-->
			</div>
			<div class="divBody">
				<div class="container">
					<div class="main">
						<div id="err_dis" tabindex="1">
							<section class="error_section">
							<img src="<?php echo @constant('HOME_DIR');?>
image/close_icon.png" style="width:15px;float:right" class="close_icon">
							<?php if (!empty($_smarty_tpl->tpl_vars['err_msg']->value)) {?>
								<div class="error_msg"><?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>
</div>
							<?php } else { ?>
								<div  class="error_msg"></div>
							<?php }?>
							</section>
						</div>
						<section class="content">
							<br/>
							<p>
								> <span class="title">データ登録 / 教科登録</span>
							</p>
							<br/>
							<input type="hidden" id="fileExt" value="<?php echo $_smarty_tpl->tpl_vars['fileExt']->value;?>
" />
							<input type="hidden" id="home_dir" value="<?php echo @constant('HOME_DIR');?>
" />
							<input type="hidden" id="org_no" name="org_no" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->org_no;?>
" />
							<input type="hidden" id="dataArray" value="<?php echo $_smarty_tpl->tpl_vars['dataArray']->value;?>
"/>
							<input type="hidden" id="db_org_name" name="db_org_name" value="<?php echo $_smarty_tpl->tpl_vars['db_org_name']->value;?>
"/>

							<!-- for image -->
							<input type="hidden" id="image_ext" name="image_ext" value=""/>
							<input type="hidden" id="image_data" name="image_data" value=""/>
							<input type="hidden" id="img_flg" name="img_flg" value=""/>
							<input type="hidden" id="image_del_flg" name="image_del_flg" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->image_del_flg;?>
"/>
							<input type="hidden" id="hddImage" name="hddImage" value=""/>

							<!--  for excel column -->
							<input type="hidden" id="subject_area_data" name="subject_area_data" />
							<input type="hidden" id="subject_area_name" name="subject_area_name" />
							<input type="hidden" id="subject_area_name_romaji" name="subject_area_name_romaji" />
							<input type="hidden" id="start_period" name="start_dt" />
							<input type="hidden" id="end_period" name="end_dt" />
							<input type="hidden" id="disp_no" name="disp_no" />
							<input type="hidden" id="remarks" name="remarks" />
							<input type="hidden" id="btn_flg" name="btn_flg" value="<?php echo $_smarty_tpl->tpl_vars['btn_flg']->value;?>
" />
							<input type="hidden" id="sub_area_max_count" name ="sub_area_max_count" value = "<?php echo $_smarty_tpl->tpl_vars['sub_area_max_count']->value;?>
">
							<input type="hidden" id="org_id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->org_id;?>
"/>
							<input type="hidden" id="org_name_flg" value="<?php echo $_smarty_tpl->tpl_vars['org_name_flg']->value;?>
"/>
							<div id="hidden">
								<table class="tsk_regist_tbl2">
									<tr height="45px;">
										<td id="tdImage" width="100px">ファイル</td>
										<td>
											<input type="text" id="file_name" name="file_name" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->file_name1;?>
" class="task_file" style="height:25px;"/>
										</td>
										<td width="150px">
											<input type="file" id="input_file" name="input_file" accept=".xlsx, .xls, .csv"/>
											<button type="button" id="img_btn" style="height:30px;">ファイルを選択</button>
										</td>
										<td width="131px;" id="hide1">
											<input type="button" name="btn_upload" title="表示" class="btn_confirm" id="btn_upload" onclick="javascript:show('<?php echo @constant('HOME_DIR');?>
ExcelSubjectAreaList/show')">
										</td>
										<td width="400px;" align="right" id="hide2">
											<input type="button" id="btn_all_dl" name="btn_all_dl" title="フォーマットダウンロード" class="btn_all_dl" onclick="javascript:excelDl('<?php echo @constant('HOME_DIR');?>
ExcelSubjectAreaList/newExcel')">
										</td>
									</tr>
								</table>
							</div>
							<div id="org-valid">
								<?php if ($_smarty_tpl->tpl_vars['org_name_flg']->value == '0') {?>
									<label id="db_org_name" name="db_org_name" style='color:red'><?php echo $_smarty_tpl->tpl_vars['db_org_name']->value;?>
</label>
								<?php } else { ?>
									<label id="db_org_name" name="db_org_name" style='color:black'><?php echo $_smarty_tpl->tpl_vars['db_org_name']->value;?>
</label>
								<?php }?>
							</div>
							<div class="display">
								<table id="stu_tbl" class="display" style="width:100%; border-collapse: collapse; font-size: 1.0em; display: none;">
									<?php if (!empty($_smarty_tpl->tpl_vars['dataArray']->value)) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['dataArray']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datagrid_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid'] : false;
$__foreach_datagrid_0_saved_item = isset($_smarty_tpl->tpl_vars['rows']) ? $_smarty_tpl->tpl_vars['rows'] : false;
$_smarty_tpl->tpl_vars['rows'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid'] = new Smarty_Variable(array('index' => -1));
$_smarty_tpl->tpl_vars['rows']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']++;
$__foreach_datagrid_0_saved_local_item = $_smarty_tpl->tpl_vars['rows'];
?>
											<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null) == 0) {?>
												<thead style="background-color: #e6b9b8;">
											<?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null) == 1) {?>
												<tbody>
											<?php }?>
												<tr id="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null);?>
">
											<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null) == 0) {?>
												<th style=" min-width: 30px;" >No</th>
											<?php } else { ?>
												<td id="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null);?>
rno"></td>
											<?php }?>
											<?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datagrid1_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1'] : false;
$__foreach_datagrid1_1_saved_item = isset($_smarty_tpl->tpl_vars['cols']) ? $_smarty_tpl->tpl_vars['cols'] : false;
$_smarty_tpl->tpl_vars['cols'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1'] = new Smarty_Variable(array('index' => -1));
$_smarty_tpl->tpl_vars['cols']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cols']->value) {
$_smarty_tpl->tpl_vars['cols']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index']++;
$__foreach_datagrid1_1_saved_local_item = $_smarty_tpl->tpl_vars['cols'];
?>
												<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null) != 0) {?>
													<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index'] : null) > 0) {?>
														<td id="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null);?>
r<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index'] : null);?>
c" style=" min-width: 60px; word-break: break-all;" contenteditable="false"><?php echo $_smarty_tpl->tpl_vars['cols']->value;?>
</td>
													<?php } else { ?>
														<td id="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null);?>
r<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index'] : null);?>
c" style=" min-width: 60px; word-break: break-all;" contenteditable="false"><?php echo $_smarty_tpl->tpl_vars['cols']->value;?>
</td>
													<?php }?>
												<?php } else { ?>
													<th id="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null);?>
r<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1']->value['index'] : null);?>
c" style=" min-width: 60px; align: left;" ><?php echo $_smarty_tpl->tpl_vars['cols']->value;?>
</th>
												<?php }?>
											<?php
$_smarty_tpl->tpl_vars['cols'] = $__foreach_datagrid1_1_saved_local_item;
}
if ($__foreach_datagrid1_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid1'] = $__foreach_datagrid1_1_saved;
}
if ($__foreach_datagrid1_1_saved_item) {
$_smarty_tpl->tpl_vars['cols'] = $__foreach_datagrid1_1_saved_item;
}
?>
												</tr>
													<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_datagrid']->value['index'] : null) == 0) {?>
												</thead>
													<?php }?>
										<?php
$_smarty_tpl->tpl_vars['rows'] = $__foreach_datagrid_0_saved_local_item;
}
if ($__foreach_datagrid_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_datagrid'] = $__foreach_datagrid_0_saved;
}
if ($__foreach_datagrid_0_saved_item) {
$_smarty_tpl->tpl_vars['rows'] = $__foreach_datagrid_0_saved_item;
}
?>
									<?php }?>
									</tbody>
								</table>
								<?php if (!empty($_smarty_tpl->tpl_vars['dataArray']->value)) {?>
									<div id="hidden1" style="width:100%;text-align:right; padding-top: 5px;">
										<input type="button" name="insert" title="登録" class="btn_insert" id="btn_insert" >
									</div>
								<?php }?>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="divFooter">
				<!--footer-->
					<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<!--footer-->
			</div>
		</form>

		<?php echo '<script'; ?>
 type="text/javascript">
		//表示ボタン処理
		function show(action){

			var input_file = $("#input_file").val();

				//インプットファイル必須チェック
			if ( input_file == "" ){
				error_msg = "ファイルを選択してください。";
				$('#err_dis').show();
				$(".error_section").slideDown('slow');
				$(".error_msg").html(error_msg);
				$('#err_dis')[0].focus();
				return false;
			}else {
				$("#main_form").attr("action", action);
				$("#main_form").submit();
			}

		}

		//フォーマットダウンロードボタン処理
		function excelDl(action){

			var menuOpen = document.getElementById('menuOpen').value;
			var menuStatus = document.getElementById('menuStatus').value;

			$("#main_form").attr("action", action);
			$("#menuOpen").val(menuOpen);
			$("#menuStatus").val(menuStatus);
			$("#main_form").submit();
		}

		<?php echo '</script'; ?>
>
	</body>
</html><?php }
}
