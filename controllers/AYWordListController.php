<?php
require_once 'BaseController.php';
require_once 'conf/config.php';
require_once 'dto/PageDto.php';
require_once 'service/AYWordService.php';

class AYWordListController extends BaseController
{

	public function indexAction()
	{
		if ($this->check_login() == true) {
			$this->form->word = "";
			$this->form->search_page = 0;
			$this->form->search_page_row = 10;
			$this->form->search_page_order_column = 1;
			$this->form->search_page_order_dir = true;
			$this->form->org_no = "";
			$this->form->search_org_id = COMMON_TEST_INFO_ORG;
			$this->form->login_id = $_SESSION['login_id'];
			$path = COMMON_TEST_INFO_ORG;
			// メニュー情報を取得、セットする
			$this->setMenu();
			$this->search($this->form);
			$this->smarty->assign('form', $this->form);
			$this->smarty->display('ayWordList.html');
		} else {
			TransitionHelper::sendException(E002);
			return;
		}
	}

	private function search($form)
	{
		$service = new AYWordService($this->pdo);
		// 検索結果を取得
		$list = $service->getWordListData($form, "0");
		$count = count($list);
		if ($count > 0) {
			$this->smarty->assign('err_msg', '');
			$this->smarty->assign('list', $list);
		} else {
			// エラーメッセージを設定　「検索結果がありません」
			$err_msg = W001;
			$this->smarty->assign('list', "");
			$this->smarty->assign('err_msg', $err_msg);
		}
	}

	public function searchAction()
	{
		$err_msg = "";
		if (isset($_SESSION['regist_msg'])) {
			if ($_SESSION['regist_msg'] != "") {
				$this->smarty->assign('err_msg', $_SESSION['regist_msg']);
				$_SESSION['regist_msg'] = "";
			}
		}
		if (isset($_SESSION['back_flg']) &&  ($_SESSION['back_flg'] != "")) {
			$this->form->search_page = $_SESSION['search_page'];
			$this->form->search_page_row = $_SESSION['search_page_row'];
			$this->form->search_page_order_column = $_SESSION['search_page_order_column'];
			$this->form->search_page_order_dir = $_SESSION['search_page_order_dir'];
			$this->form->word = $_SESSION['search_word'];
			if (empty($this->form->search_page)) {
				$this->form->search_page = 0;
				$this->form->search_page_row = 10;
				$this->form->search_page_order_column = 1;
				$this->form->search_page_order_dir = true;
			}
			//クリア
			$_SESSION['back_flg'] = false;
			$_SESSION['search_word'] = "";
			$_SESSION['search_page'] = "";
			$_SESSION['search_page_row'] = "";
			$_SESSION['search_page_order_column'] = "";
			$_SESSION['search_page_order_dir'] = "";
		}
		if ($this->check_login() == true) {
			if (isset($_SESSION['org_no'])) {
				$this->form->org_no = $_SESSION['org_no'];
			}
			$service = new AYWordService($this->pdo);
			$this->setMenu();
			// 検索結果を取得
			$list = $service->getWordListData($this->form, "0");
			$count = count($list);
			if ($count > 0) {
				$this->smarty->assign('list', $list);
			} else {
				// エラーメッセージを設定　「検索結果がありません」
				$err_msg = sprintf(W001);
				$this->smarty->assign('list', "");
				$this->smarty->assign('err_msg', $err_msg);
			}
			$this->smarty->assign('form', $this->form);
			$this->smarty->display('ayWordList.html');
		} else {
			TransitionHelper::sendException(E002);
			return;
		}
	}

	
}