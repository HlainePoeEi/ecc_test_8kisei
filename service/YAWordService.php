<?php

/*****************************************************
 *  株式会社ECC 新商品開発プロジェクト
 *  PHPシステム構築フレームワーク
 *
 *  Copyright (c) 2016 ECC Co., Ltd
 *
 *****************************************************/
require_once 'dao/T_YADao.php';
require_once 'service/BaseService.php';
/**
 * 単語サービス
 */
class YAWordService extends BaseService
{
	public function saveWord($dto)
	{
		// データベース接続
		$wordDao = new T_YADao();
		// 単語を登録する
		return $wordDao->saveWord($dto, $this->pdo);
	}

	public function getWordLanguage()
	{
		// データベース接続
		$wordDao = new T_YADao();
		// 単語言語を取得すること
		return $wordDao->getWordLanguage();
	}

	public function getWordData($id)
	{
		// データベース接続
		$dao = new T_YADao();
		// 単語データを取得すること
		return $dao->getWordData($id);
	}

	public function updateWordInfo($dto)
	{
		// データベース接続
		$dao = new T_YADao();
		// 単語データを更新すること
		return $dao->updateWordInfo($dto);
	}

	public function getWordListData($form, $flg)
	{
		// データベース接続
		$dao = new T_YADao();
		// 単語リストを取得すること
		return $dao->getWordListData($form, $flg);
	}
}
