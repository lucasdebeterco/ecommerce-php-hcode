<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use Hcode\Mailer;
use \Hcode\Model;
use MongoDB\Driver\Exception\ExecutionTimeoutException;

class Category extends Model
{
    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
    }

    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
            ":idcategory" => $this->getidcategory(),
            ":descategory" => $this->getdescategory(),
        ));

        $this->setData($results[0]);
    }
}