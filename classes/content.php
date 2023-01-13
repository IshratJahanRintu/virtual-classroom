<?php

class content
{

    public $table = "content";
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }





    function addContent($content_info)
    {


        if ($this->db->insert($this->table, $content_info)) {

            return true;
        }
    }


    public function deletecontent($where)
    {

        $sql = "DELETE FROM $this->table WHERE content_id={$where}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    // public function editcontent($edit_info = array())
    // {
    //     $update_query =  "UPDATE $this->table SET  course_title='{$edit_info["course_title"]}',teacher_id='{$edit_info["teacher_id"]}',semester='{$edit_info["semester"]}' WHERE course_id={$edit_info["course_id"]}";
    //     $stmnt = $this->db->connection->prepare($update_query);
    //     $stmnt->execute() or die("update query failed");
    //     return true;
    // }

    public function viewAllcontents()
    {
        $sql = "select * from content";



        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        return $row;
    }



    public function viewSpecificCourseDocuments($content_info)

    {
        $content_info["content_type"] = "document";
        return $this->db->fetch_data_with_two_column_check($content_info, $this->table, "course_id", "content_type");
    }

    public function viewSpecificCourseSlides($content_info)

    {
        $content_info["content_type"] = "slide";
        return $this->db->fetch_data_with_two_column_check($content_info, $this->table, "course_id", "content_type");
    }
    public function viewSpecificCourseVideos($content_info)

    {
        $content_info["content_type"] = "video";
        return $this->db->fetch_data_with_two_column_check($content_info, $this->table, "course_id", "content_type");
    }
}