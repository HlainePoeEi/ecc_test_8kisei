<?php

require_once 'BaseDao.php';
require_once 'dto/T_YADto.php';
require_once 'conf/config.php';

class T_YADao extends BaseDao
{

    public function saveWord($dto, $pdo)
    {
        return parent::insertWithPdo($dto, $pdo);
    }

    public function getWordLanguage()
    {
        $query = " SELECT ";
        $query .= " category";
        $query .= " ,type";
        $query .= " ,name";
        $query .= " ,name_kana";
        $query .= " FROM ";
        $query .= " M_TYPE ";
        $query .= " WHERE category = '028' ";
        $query .= " AND del_flg = '0' ";
        $query .= " ORDER BY disp_no ASC ";
        $stmt = $this->pdo->prepare($query);
        return parent::getDataList($stmt, get_class(new T_YADto()));
    }

    public function getTranslationLanguage()
    {
        $query = " SELECT ";
        $query .= " category";
        $query .= " ,type";
        $query .= " ,name";
        $query .= " ,name_kana";
        $query .= " FROM ";
        $query .= " M_TYPE ";
        $query .= " WHERE category = '029' ";
        $query .= " AND del_flg = '0' ";
        $query .= " ORDER BY disp_no ASC ";
        $stmt = $this->pdo->prepare($query);
        return parent::getDataList($stmt, get_class(new T_YADto()));
    }

    public function getWordData($id)
    {
        $query = " SELECT ";
        $query .= " id ";
        $query .= " ,word_book_name";
        $query .= " ,word_lang_type";
        $query .= " FROM ";
        $query .= " T_YA ";
        $query .= " WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        return parent::getDataList($stmt, get_class(new T_YADto()));
    }

    public function updateWordInfo($dto)
    {
        $query = " UPDATE T_YA SET ";
        $query .= " word_book_name = :word_book_name, ";
        $query .= " word_lang_type = :word_lang_type ";
        $query .= " WHERE id = :id ";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":word_book_name", $dto->word_book_name, PDO::PARAM_STR);
        $stmt->bindParam(":word_lang_type", $dto->word_lang_type, PDO::PARAM_STR);
        $stmt->bindParam(":id", $dto->id, PDO::PARAM_STR);
        return parent::update($stmt);
    }

    /**
	 * 単語リストを取得する
	 *
	 */
	public function getWordListData($param, $flg)
	{
		$query = $this->createQuery();
		// $query .= $this->createSearchWhere($param);
		$stmt = $this->pdo->prepare($query);
		// $this->setSearchParam($stmt, $param);
		return parent::getDataList($stmt, get_class(new T_YADto()));
	}

    /**
	 * 	単語リストのSQLを作成する
	 *
	 */
	public function createQuery()
	{
		$query = " SELECT ";
		$query .= " t_ya.id id ";
        $query .= " ,t_ya.word_book_name word_book_name";
		$query .= " ,t_ya.word_lang_type word_lang_type ";
		$query .= " FROM ";
		$query .= " T_YA t_ya ";
		return $query;
	}

	/**
	 * 単語リストのSQL検索を作成する
	 *
	 */
	public function createSearchWhere($param)
	{
		$query = " WHERE ";
		$query .= " type.category = :word_category ";
		$query .= " AND (t_word.word_system_kbn = '001' or t_word.word_system_kbn = '002') ";
		$query .= " AND t_word.del_flg = '0' ";
		if (! StringUtil::isEmpty ( $param->search_org_id )) {
			$query .= " AND m_organization.org_id LIKE :org_id ";
		}
		if (!StringUtil::isEmpty($param->word)) {
			$query .= " AND (t_word.word LIKE :word ) ";
		}
		$query .= " ORDER BY ";
		$query .= " t_word.word_id DESC";
		return $query;
	}

	/**
	 * パラメータバインド
	 *
	 */
	public function setSearchParam($stmt, $param)
	{
		$word_category = WORD_CATEG_KBN;
		$stmt->bindParam(":word_category", $word_category, PDO::PARAM_STR);
		if (!StringUtil::isEmpty($param->search_org_id)) {
			$org_id = '%' . $param->search_org_id. '%';
			$stmt->bindParam(":org_id", $org_id, PDO::PARAM_STR);
		}
		if (!StringUtil::isEmpty($param->word)) {
			$word = '%' . $param->word . '%';
			$stmt->bindParam(":word", $word, PDO::PARAM_STR);
		}
	}
}
