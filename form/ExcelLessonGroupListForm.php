<?php
/*****************************************************
 *  株式会社ECC
 *  PHPシステム構築フレームワーク
 *
 *  Copyright (c) 2018 ECC Co., Ltd
 *
 *****************************************************/

require_once 'BaseForm.php';

/**
 * ファイルからレッスンとグループ登録FORMクラス
 *
 */
class ExcelLessonGroupListForm extends BaseForm {

	//運用管理者管理№
	public $admin_no;
	//組織管理№
	public $org_no;
	//DB組織管理№
	public $db_org_id;
	//DB組織管理名
	public $db_org_name;
	//ファイル名
	public $file_name;
	//ファイル名１
	public $file_name1;
	//画像ファイルデータ
	public $file_data;
	//画像ファイルエクステンション
	public $image_ext;
	//日付フラグ
	public $date_flg;
	//インプットファイル
	public $input_file;
	//画像ファイルフラグ
	public $img_flg;
	//コーピ画像ファイル
	public $copy_image_file;
	//ファイル
	public $file;
	//レッスン・グループデータ
	public $lessgp_data;
	//レッスンデータ
	public $less_data;
	//グループデータ
	public $group_data;

}

?>