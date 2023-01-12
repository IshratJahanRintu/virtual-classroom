<?php

class notice
{

    public $table = "notice";
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }



    function addNotice($notice_info)
    {


        if ($this->db->insert($this->table, $notice_info)) {

            return true;
        }
    }


    public function deleteNotice($where)
    {

        $sql = "DELETE FROM $this->table WHERE notice_id={$where}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function editNotice($edit_info = array())
    {
        $update_query =  "UPDATE $this->table SET  notice_desc='{$edit_info["notice_desc"]}' WHERE notice_id={$edit_info["notice_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        return true;
    }

    public function viewAllNotices()
    {
        return  $this->db->fetch_all_data($this->table);
    }


    public function viewSpecificCourseNotices($course_info)
    {
        return $this->db->fetch_data_with_one_column_check($course_info, $this->table, "course_id");
    }
}