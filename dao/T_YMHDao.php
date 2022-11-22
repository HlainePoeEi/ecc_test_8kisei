<?php

require_once 'BaseDao.php';
require_once 'dto/T_YMHDto.php';
require_once 'conf/config.php';

class T_YMHDao extends BaseDao
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
        return parent::getDataList($stmt, get_class(new T_YMHDto()));
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
        return parent::getDataList($stmt, get_class(new T_YMHDto()));
    }

    public function getNextId()
    {
        return parent::getId('id');
    }

    public function getWordListData($param, $flg)
    {
        // $query = $this->createQuery();
        $query = " SELECT *";
        $query .= " FROM t_ymh";
        // $query .= " WHERE ";
        // $query .= " t_ymh.word_book_name LIKE :word_book_name ";
        // $word_book_name = '%' . $param->search_word . '%';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(

            ":word_book_name",

            $word_book_name,

            PDO::PARAM_STR

        );
        return parent::getDataList($stmt, get_class(new T_YMHDto()));
    }

    public function createQuery()
    {
        $query = " SELECT *";
        $query .= " FROM t_ymh";
        return $query;
    }

    public function getWordData($id)
    {
        $query = " SELECT ";
        $query .= " id ";
        $query .= " ,word_book_name";
        $query .= " ,word_lang_type";
        $query .= " ,trans_lang_type";
        $query .= " FROM ";
        $query .= " T_YNS ";
        $query .= " WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        return parent::getDataList($stmt, get_class(new T_YMHDto()));
    }

    public function updateWordInfo($dto)
    {
        $query = 'update t_yns
        SET word_book_name = :word_book_name,
            word_lang_type = :word_lang_type,
            trans_lang_type = :trans_lang_type
        WHERE id = :id';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":word_book_name", $dto->word_book_name, PDO::PARAM_STR);
        $stmt->bindParam(":word_lang_type", $dto->word_lang_type, PDO::PARAM_STR);
        $stmt->bindParam(":trans_lang_type", $dto->trans_lang_type, PDO::PARAM_STR);
        $stmt->bindParam(":id", $dto->id, PDO::PARAM_STR);
        return parent::update($stmt);
    }

    public function deleteWordInfo($dto)
    {
        $query = " DELETE ";
        $query .= " FROM ";
        $query .= " T_YNS ";
        $query .= " WHERE ";
        $query .= " id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $dto->id, PDO::PARAM_STR);
        return parent::delete($stmt);
    }

   
}
