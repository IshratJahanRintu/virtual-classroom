<?php

class course
{

    public $table = "course";
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }





    function addCourse($course_info)
    {


        if ($this->db->insert($this->table, $course_info)) {

            return true;
        }
    }


    public function deleteCourse($where)
    {

        $sql = "DELETE FROM $this->table WHERE course_id={$where}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function editCourse($edit_info = array())
    {
        $update_query =  "UPDATE $this->table SET  course_title='{$edit_info["course_title"]}',teacher_id='{$edit_info["teacher_id"]}',semester='{$edit_info["semester"]}' WHERE course_id={$edit_info["course_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        return true;
    }

    public function viewAllCourses()
    {
        $sql = "select course.course_id,course.course_title,course.teacher_id,course.semester,user.name  from course LEFT JOIN user on course.teacher_id=user.user_id 
        ORDER BY course.course_id DESC";



        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        return $row;
    }

    public function viewSpecificTeacherCourses($teacher_info)
    {
        return $this->db->fetch_data_with_one_column_check($teacher_info, $this->table, "teacher_id");
    }

    public function viewSpecificSemesterCourses($student_info)
    {
        return $this->db->fetch_data_with_one_column_check($student_info, $this->table, "semester");
    }
}