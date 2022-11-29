<?php

require_once 'BaseDao.php';
require_once 'dto/T_AYDto.php';
require_once 'conf/config.php';

class T_AYDao extends BaseDao
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
        return parent::getDataList($stmt, get_class(new T_AYDto()));
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
        return parent::getDataList($stmt, get_class(new T_AYDto()));
    }

    public function getWordData($id)
    {
        $query = " SELECT ";
        $query .= " id ";
        $query .= " ,word_book_name";
        $query .= " ,word_lang_type";
        $query .= " FROM ";
        $query .= " T_AY ";
        $query .= " WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        return parent::getDataList($stmt, get_class(new T_AYDto()));
    }

    public function updateWordInfo($dto)
    {
        $query = " UPDATE T_AY SET ";
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
        return parent::getDataList($stmt, get_class(new T_AYDto()));
    }

    /**
     * 	単語リストのSQLを作成する
     *
     */
    public function createQuery()
    {
        $query = " SELECT ";
        $query .= " t_ay.id id ";
        $query .= " ,t_ay.word_book_name word_book_name";
        $query .= " ,t_ay.word_lang_type word_lang_type ";
        $query .= " FROM ";
        $query .= " T_AY t_ay ";
        return $query;
    }
  
}