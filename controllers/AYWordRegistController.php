<?php

/*****************************************************
 *  株式会社ECC 新商品開発プロジェクト
 *  PHPシステム構築フレームワーク
 *
 *  Copyright (c) 2017 ECC Co., Ltd
 *
 *****************************************************/
require_once 'BaseController.php';
require_once 'conf/config.php';
require_once 'util/DateUtil.php';
require_once 'dto/PageDto.php';
require_once 'dto/T_WordDto.php';
require_once 'util/DateUtil.php';
require_once 'service/AYWordService.php';
require_once 'service/WordBookWordService.php';
require_once 'dto/T_WordBook_Set_WordDto.php';

/**
 * 単語登録コントローラー
 */
class AYWordRegistController extends BaseController
{
	/**
	 * 初期処理
	 */
	public function indexAction()
	{
		if ($this->check_login() == true) {
			$word_service = new AYWordService($this->pdo);
			$word_id = $this->form->id;
			$screen_mode = $this->form->screen_mode;
			$word_category = "";
			$err_msg = "";
			$word_category = $word_service->getWordLanguage();
			if (count($word_category) > 0) {
				$this->smarty->assign('word_category', $word_category);
			} else {
				$this->smarty->assign('word_category', "");
				$this->smarty->assign('error_msg', "ドロップダウンリストのデータがありません。");
			}
			// 更新処理
			if ($word_id != null) {
				$today_date = DateUtil::getDate('Y/m/d');
				// 検索結果を取得
				$list = $word_service->getWordData($word_id);
				if ($list != null) {
					foreach ($list as $value) {
						$this->form->word_id = $value->id;
						$this->form->word_book_name = $value->word_book_name;
						$this->form->word_lang_type = $value->word_lang_type;
						$this->form->screen_mode = "update";
					}
				}
				// 登録処理
			} else {
				$word_services = new AYWordService($this->pdo);
				$this->form->word_id = "";
				$this->form->word_book_name = "";
				$this->form->word_lang_type = "";
				$this->form->screen_mode = "new";
			}
			// メニュー情報を取得、セットする
			$this->setMenu();
			$this->smarty->assign('form', $this->form);
			$this->smarty->display('ayWordRegist.html');
		} else {
			TransitionHelper::sendException(E002);
			return;
		}
	}

	public function saveAction()
	{
		if ($this->check_login() == true) {
			$word_service = new AYWordService($this->pdo);
			// メニュー情報を取得、セットする
			$this->setMenu();
			$word_category = "";
			$word_category = $word_service->getWordLanguage();
			if (count($word_category) > 0) {
				$this->smarty->assign('word_category', $word_category);
			} else {
				$this->smarty->assign('word_category', "");
				$this->smarty->assign('error_msg', "ドロップダウンリストのデータがありません。");
			}
			$screen_mode = $this->form->screen_mode;
			$word_id = $this->form->word_id;
			$word = $this->form->word_book_name;
			$word_lang_type = $this->form->word_lang_type;

			// テストデータ情報登録
			$word_dto = new T_AYDto();
			$word_dto->word_book_name = $word;
			$word_dto->word_lang_type = $word_lang_type;
			$word_dto->id = $this->form->word_id;
			if ($screen_mode == 'update') {
				$word_id = $this->form->word_id;
				$dao = new AYWordService($this->pdo);
				$result = $dao->updateWordInfo($word_dto);
				// 更新処理が正常の場合、
				if ($result == 1) {
					// 登録完了
					$this->setMenu();
					$this->smarty->assign('info_msg', I007);
					$this->form->screen_mode = 'update';
					$this->smarty->assign('form', $this->form);
					$this->smarty->display('ayWordRegist.html');
					// 更新出来ない場合、
				} else {
					$this->setMenu();
					$error = sprintf(E007, '更新');
					$this->smarty->assign('msg', $error);
					$this->smarty->assign('form', $this->form);
					$this->smarty->display('ayWordRegist.html');
					return;
				}
				// 登録状況
			} else {
				$word_dto->id = $this->form->word_id;
				$dao = new AYWordService($this->pdo);
				$result = $dao->saveWord($word_dto);
				// 登録処理が正常の場合、クイズ一覧画面に遷移する。
				if ($result == 1) {
					// 登録完了
					//$this->setBackData ();
					// 登録完了
					$this->setMenu();
					$this->smarty->assign('info_msg', I004);
					$this->form->screen_mode = 'update';
					//allow update after insertion
					$this->form->word_id = $this->pdo->lastInsertId();
					$this->smarty->assign('form', $this->form);
					$this->smarty->display('ayWordRegist.html');
					// 登録出来ない場合
				} else {
					$this->setMenu();
					$error = sprintf(E007, '登録');
					$this->smarty->assign('error_msg', $error);
					$this->smarty->assign('form', $this->form);
					$this->smarty->display('ayWordRegist.html');
					return;
				}
			}
		} else {
			TransitionHelper::sendException(E002);
			return;
		}
	}

	public function backAction()
	{
		// 登録完了
		$this->setBackData();
		$this->setMenu();
		// クイズ一覧画面へ遷移する
		$this->dispatch('AYWordList/Search');
	}

	public function setBackData()
	{
		$_SESSION['back_flg'] = true;
		$_SESSION['search_page'] = $this->form->search_page;
		$_SESSION['search_word'] = $this->form->search_word;
		$_SESSION['search_org_id'] = $this->form->search_org_id;
		$_SESSION['search_translation'] = $this->form->search_translation;
		$_SESSION['search_file_name'] = $this->form->search_file_name;
		$_SESSION['search_page_row'] = $this->form->search_page_row;
		$_SESSION['search_page_order_column'] = $this->form->search_page_order_column;
		$_SESSION['search_page_order_dir'] = $this->form->search_page_order_dir;
	}
	
}