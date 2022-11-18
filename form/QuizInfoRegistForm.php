<?php
/*****************************************************
 *  株式会社ECC 新商品開発プロジェクト
 *  PHPシステム構築フレームワーク
 *
 *  Copyright (c) 2016 ECC Co., Ltd
 *
 *****************************************************/

require_once 'BaseForm.php';

/**
 * クイズ登録FORMクラス
 *
 */
class QuizInfoRegistForm extends BaseForm{
	// 組織管理№
	public $org_no;
	// クイズ管理№
	public $quiz_info_no;
	// クイズ名
	public $quiz_name;
	// 解説
	public $long_description;
	//ファイル（音声）
	public $audio_name;
	// 更新備考
	public $remarks;
	// 削除フラグ
	public $del_flg;

	// 更新者ID
	public $updater_id;

	public $audio_file;
	
	public $disable_mode;

	public $screen_mode;
	public $cmb_quiz_type;
	public $chk_status1;
	public $chk_status2;
	public $file_name;
	public $input_audio_file;

	public $audio_del_flg;
	public $audio_chk_del;

	/* 音声ファイルデータ */
	public $audio_data;

	//戻り用
	public $search_quiz_name;
	public $search_long_description;
	public $search_remark;
	public $search_rd_status1;
	public $search_org_id;
	
	public $search_page_qil;
	public $search_page_row_qil;
	public $search_page_order_column_qil;
	public $search_page_order_dir_qil;

}