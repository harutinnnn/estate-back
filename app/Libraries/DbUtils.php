<?php


namespace App\Libraries;


use CodeIgniter\Model;

class DbUtils
{

    const LIKE = "like";
    const EQUAL = "=";

    /**
     * @param Model $model
     * @param Model $modelMl
     * @param $id
     */
    public static function deleteMl(Model $model, Model $modelMl, $id)
    {

        $model->delete(intval($id));
    }


    /**
     * @param string $table
     * @param int $id
     */
    public static function toggle(string $table, int $id)
    {
        $db = db_connect();
        $db->query("UPDATE " . $table . " SET status = 1 - status WHERE id = " . intval($id));

    }


    /**
     * @param Model $model
     * @return int|string
     */
    public static function countRows(Model $model): int|string
    {
        return $model->countAllResults();

    }


    public static function customQueryBuilder($conditions = [])
    {

        $builder = [];

        foreach ($conditions as $type => $conditionRow) {
            switch ($type) {
                case self::LIKE:

                    foreach ($conditionRow as $conditionKey => $conditionVal) {
                        $builder[] = "`{$conditionKey}` LIKE '%" . urldecode($conditionVal) . "%'";
                    }

                    break;
                case self::EQUAL:

                    foreach ($conditionRow as $conditionKey => $conditionVal) {
                        $builder[] = "`{$conditionKey}` = '" . urldecode($conditionVal) . "'";
                    }

                    break;
            }
        }

        return implode(' AND ', $builder);

    }
}