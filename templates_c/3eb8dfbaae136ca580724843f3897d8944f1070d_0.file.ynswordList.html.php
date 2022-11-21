<?php
/* Smarty version 3.1.29, created on 2022-11-21 07:18:24
  from "C:\xampp\htdocs\ecc_test\templates\ynswordList.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_637b183088fac0_94503855',
  'file_dependency' => 
  array (
    '3eb8dfbaae136ca580724843f3897d8944f1070d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ecc_test\\templates\\ynswordList.html',
      1 => 1668740701,
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
function content_637b183088fac0_94503855 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
  <title>単語一覧</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
  
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
js/escape.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('HOME_DIR');?>
js/datatables.min.js"><?php echo '</script'; ?>
>
  
  <link href="<?php echo @constant('HOME_DIR');?>
css/jquery-ui.css" rel="stylesheet" />
  <link href="<?php echo @constant('HOME_DIR');?>
css/default.css" rel="stylesheet" />
  <link href="<?php echo @constant('HOME_DIR');?>
css/datatables.css" rel="stylesheet" />

  <?php echo '<script'; ?>
 type="text/javascript">
    //表示再現
    $(document).ready(function () {
      // MSGのあるなし
      if ($(".error_msg").html() != "") {
        $(".error_section").slideToggle("slow");
      }
      $(".close_icon").on("click", function () {
        $(".error_section").slideToggle("slow");
      });
      /**
       *
       *  検索ボタン押下、必須チェック処理
       *
       **/
      $(".btn_search").on("click", function () {
        // MSGのあるなし
        if ($(".error_msg").html() != "") {
          $(".error_section").slideToggle("slow");
        }
        return true;
      });
      //データテーブルを表示する
      var dataArray = $("#list").val();
      var current_page = parseInt($("#search_page").val());
      var current_page_row = parseInt($("#search_page_row").val());
      var current_order_column = $("#search_page_order_column").val();
      var current_order_dir = $("#search_page_order_dir").val();
      // if (dataArray != "") {
      $("#tbl_search").DataTable({
        pageLength: current_page_row,
        searching: true,
        columns: [
          { searchable: true },
          { searchable: true },
          { searchable: true },
          { searchable: false },
          { searchable: false },
          { searchable: false },
        ],
        language: {
          info: " _TOTAL_ 件中 _START_ から _END_ まで表示",
          paginate: {
            first: "First",
            last: "Last",
            next: "次",
            previous: "前",
          },
          lengthMenu: " _MENU_ 件表示",
        },
      });
      var table = $("#tbl_search").dataTable();
      table.fnPageChange(current_page);
    });
    function playAudio() {
      var x = document.getElementById("myAudio");
      x.play();
    }
  <?php echo '</script'; ?>
>
</head>

<body class="pushmenu-push">
  <form id="main_form" action="<?php echo @constant('HOME_DIR');?>
YNSWordList/Search" method="post">
    <input type="hidden" id="org_no" name="org_no" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->org_no;?>
" />
    <input type="hidden" id="msg" name="msg" value="<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
" />
    <input type="hidden" id="error_msg" name="error_msg" value="<?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
" />
    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
" />
    <input type="hidden" id="screen_mode" name="screen_mode" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->screen_mode;?>
" />
    <input type="hidden" id="back_flg" name="back_flg" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->back_flg;?>
" />
    <input type="hidden" id="home_dir" value="<?php echo @constant('HOME_DIR');?>
" />
    <input type="hidden" id="search_word" name="search_word" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_word;?>
" />
    <input type="hidden" id="search_translation" name="search_translation" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_translation;?>
" />
    <input type="hidden" id="search_file_name" name="search_file_name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->search_file_name;?>
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
    <!-- text to speech using php by STTO -->
    <input type="hidden" id="word_book_name" name="word_book_name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->word_book_name;?>
" />
    <!-- 戻るの場合リストか登録かの画面を分けるため -->
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
          <section class="error_section">
            <img src="<?php echo @constant('HOME_DIR');?>
image/close_icon.png" style="width: 15px; float: right"
              class="close_icon" />
            <!-- text to speech using php by STTO -->
            <?php if (!empty($_smarty_tpl->tpl_vars['voice']->value)) {?> { assign var ="voice" value=<?php ob_start();
echo $_smarty_tpl->tpl_vars['voice']->value;
$_tmp1=ob_get_clean();
echo $_tmp1;?>
 } <?php }?>
            <!-- text to speech using php by NMZ -->
            <?php if (!empty($_smarty_tpl->tpl_vars['sound']->value)) {?> { assign var ="voices" value=<?php ob_start();
echo $_smarty_tpl->tpl_vars['sound']->value;
$_tmp2=ob_get_clean();
echo $_tmp2;?>
 }
            <?php }?> <?php if (!empty($_smarty_tpl->tpl_vars['err_msg']->value)) {?>
            <div class="error_msg"><?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>
</div>
            <?php } elseif (!empty($_smarty_tpl->tpl_vars['info_msg']->value)) {?>
            <div class="error_msg"><?php echo $_smarty_tpl->tpl_vars['info_msg']->value;?>
</div>
            <?php } else { ?>
            <div class="error_msg"></div>
            <?php }?>
          </section>
          <section class="content">
            <p>>> <span class="title">YNS / 単語一覧</span></p>
            <br />
            <!-- <div class="divideCol"> -->
            <!-- <input class="text" type="text" name="search_word" id="search_word" maxlength="512" size="30" />
              <input type="submit" id="btn_search" name="search" title="検索" class="btn_search1" alt="search" value="" /> -->
            <input type="button" id="add" name="add_word" class="btn_add1" value="" title="新規追加"
              onclick="javascript:doInsert('<?php echo @constant('HOME_DIR');?>
YNSWordRegist/index')" />
            <!-- </div> -->
            <br />
            <table class="tbl_search" id="tbl_search">
              <thead>
                <tr>
                  <th width="100px;">単語名</th>
                  <th width="100px;">単語言語</th>
                  <th width="100px;">通訳言語</th>
                  <th width="70px;"></th>
                  <th width="70px;"></th>
                  <th width="50px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['list']->value)) {?> <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_result_0_saved_item = isset($_smarty_tpl->tpl_vars['result']) ? $_smarty_tpl->tpl_vars['result'] : false;
$_smarty_tpl->tpl_vars['result'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['result']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->_loop = true;
$__foreach_result_0_saved_local_item = $_smarty_tpl->tpl_vars['result'];
?>
                <tr>
                  <td width="100px;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['result']->value->word_book_name;
$_tmp3=ob_get_clean();
echo $_tmp3;?>
</td>
                  <?php if ($_smarty_tpl->tpl_vars['result']->value->word_lang_type == '001') {?>
                  <td width="100px;">en</td>
                  <?php } else { ?>
                  <td width="100px;">ja</td>
                  <?php }?> <?php if ($_smarty_tpl->tpl_vars['result']->value->trans_lang_type == '001') {?>
                  <td width="100px;">en</td>
                  <?php } else { ?>
                  <td width="100px;">ja</td>
                  <?php }?>
                  <!-- text to speech using php by STTO -->
                  <td width="70px;">
                    <input type="button" class="btn-sound_list1" name="v1"
                      onclick="trans1('<?php echo $_smarty_tpl->tpl_vars['result']->value->word_book_name;?>
','<?php echo @constant('HOME_DIR');?>
YNSWordList/sound')" />
                  </td>
                  <!-- text to speech using php by NMZ -->
                  <td width="70px;">
                    <input type="button" class="btn_sound" name="audio" 　
                      onclick="trans('<?php echo $_smarty_tpl->tpl_vars['result']->value->id;?>
','<?php echo @constant('HOME_DIR');?>
YNSWordList/audio')" />
                  </td>
                  <td width="50px;">
                    <input type="button" class="btn_edit1" name="edit" title="編集"
                      onclick="trans('<?php echo $_smarty_tpl->tpl_vars['result']->value->id;?>
','<?php echo @constant('HOME_DIR');?>
YNSWordRegist/index')" />

                    <input type="button" class="btn_delete1" id="btn_del" name="edit" title="削除"
                      onclick="checkDelete('<?php echo $_smarty_tpl->tpl_vars['result']->value->id;?>
','<?php echo @constant('HOME_DIR');?>
YNSWordRegist/delete')" />
                  </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['result'] = $__foreach_result_0_saved_local_item;
}
if ($__foreach_result_0_saved_item) {
$_smarty_tpl->tpl_vars['result'] = $__foreach_result_0_saved_item;
}
?> <?php }?>
              </tbody>
            </table>
          </section>
        </div>
      </div>
    </div>
    <!-- End divBody -->
    <div class="divFooter">
      <!--footer-->
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <!--footer-->
    </div>
  </form>
  { literal }
  <?php echo '<script'; ?>
>
    if ("speechSynthesis" in window) {
      //   alert("このブラウザは音声合成に対応しています。🎉")
    } else {
      alert("このブラウザは音声合成に対応していません。😭");
    }

    // 発言を作成
    const uttr = new SpeechSynthesisUtterance("Hello World!");
    uttr.voice = speechSynthesis
      .getVoices()
      .filter((voice) => voice.name == "Google US English")[0];

    // { literal }
    function setDataTableData() {
      var page = 0;
      var page_row = 10;
      var order;
      var page_order_column = 1;
      var page_order_dir = true;
      //初期で登録する場合、データテーブルをチェックする
      if ($.fn.DataTable.isDataTable("#tbl_search")) {
        //データテーブルがある場合、確認ボタン、複写ボタンと編集ボタンの処理
        var table = $("#tbl_search").DataTable();
        var info = table.page.info();
        page = info.page; // データテーブルのページ
        page_row = table.page.info().length; // データテーブルのドロップダウンリストの行
        order = table.order();
        page_order_column = order[0][0];
        page_order_dir = order[0][1];
      }
      $("#search_page").val(page);
      $("#search_page_row").val(page_row);
      $("#search_page_order_column").val(page_order_column);
      $("#search_page_order_dir").val(page_order_dir);
    }
    // 更新ボタン処理
    function trans(id, action) {
      var menuOpen = document.getElementById("menuOpen").value;
      var menuStatus = document.getElementById("menuStatus").value;
      $("#search_word").val($("#word").val());
      $("#search_translation").val($("#translation").val());
      setDataTableData();
      $("#main_form").attr("action", action);
      $("#screen_mode").val("update");
      $("#id").val(id);
      $("#menuOpen").val(menuOpen);
      $("#menuStatus").val(menuStatus);
      $("#main_form").submit();
    }
    //text to speech using php by STTO
    function trans1(word_book_name, action) {
      var menuOpen = document.getElementById("menuOpen").value;
      var menuStatus = document.getElementById("menuStatus").value;
      $("#search_word").val($("#word").val());
      $("#search_translation").val($("#translation").val());
      setDataTableData();
      $("#main_form").attr("action", action);
      $("#screen_mode").val("update");
      $("#word_book_name").val(word_book_name);
      $("#menuOpen").val(menuOpen);
      $("#menuStatus").val(menuStatus);
      $("#main_form").submit();
    }
    // 登録ボタン処理
    function doInsert(action) {
      setDataTableData();
      var menuOpen = document.getElementById("menuOpen").value;
      var menuStatus = document.getElementById("menuStatus").value;
      $("#search_word").val($("#word").val());
      $("#search_translation").val($("#translation").val());
      $("#search_org_id").val($("#org_id").val());
      $("#main_form").attr("action", action);
      $("#screen_mode").val("new");
      $("#menuOpen").val(menuOpen);
      $("#menuStatus").val(menuStatus);
      $("#main_form").submit();
    }

    //発音再生
    function playWordSound(word, type) {
      // 発言を作成
      const uttr = new SpeechSynthesisUtterance(word);
      // 言語 (日本語:ja-JP, アメリカ英語:en-US, イギリス英語:en-GB, 中国語:zh-CN, 韓国語:ko-KR)
      var type_name = "en-US";
      var voice_name = "Google US English";
      if (type == "002") {
        type_name = "ja-JP";
        voice_name = "Google 日本語";
      }
      uttr.lang = "en-US";
      console.log(type_name);

      // 選択された声を指定
      uttr.voice = speechSynthesis
        .getVoices()
        .filter((voice) => voice.name == voice_name)[0];

      // 発言を再生 (発言キュー発言に追加)
      speechSynthesis.speak(uttr);
    }
    //削除 ボタン押下処理
    function checkDelete(id, action) {
      alertDialog = confirm("Are you sure to delete this word?");
      if (alertDialog == false) {
        return false;
      } else {
        var menuOpen = document.getElementById("menuOpen").value;
        var menuStatus = document.getElementById("menuStatus").value;
        $("#main_form").attr("action", action);
        $("#id").val(id);
        $("#menuOpen").val(menuOpen);
        $("#menuStatus").val(menuStatus);
        $("#main_form").submit();
      }
    }

      // { /literal}
  <?php echo '</script'; ?>
>
  { /literal}
</body>

</html><?php }
}
