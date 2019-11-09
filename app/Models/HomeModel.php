<?php

namespace Quantox\Models;

use Quantox\Init\Model;
use \PDO;

class HomeModel extends Model
{
    protected $table_name = 'students';

    public function __construct($db_name = DB_NAME)
    {
        parent::__construct($db_name);
    }

    public function load_students()
    {
        $query = "SELECT student_id, student_firstname, student_lastname, student_indexnomber FROM ".DB_NAME.".".$this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
