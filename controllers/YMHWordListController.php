	<?php
require_once 'BaseController.php';
require_once 'conf/config.php';
require_once 'dto/PageDto.php';
require_once 'service/YMHWordService.php';

class YMHWordListController extends BaseController
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
			$this->smarty->display('ymhWordList.html');
		} else {
			TransitionHelper::sendException(E002);
			return;
		}
	}

	private function search($form)
	{
		$service = new YMHWordService($this->pdo);
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

				

	

	
}