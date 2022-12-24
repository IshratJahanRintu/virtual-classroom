<?php

class exam
{

    public $table = "exams";
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }





    function addExam($exam_info)
    {


        if ($this->db->insert($this->table, $exam_info)) {

            return true;
        }
    }


    public function deleteExam($where)
    {

        $sql = "DELETE FROM $this->table WHERE exam_id={$where}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    // public function editEourse($edit_info = array())
    // {
    //     $update_query =  "UPDATE $this->table SET  topic='{$edit_info["topic"]}',teacher_id='{$edit_info["teacher_id"]}',semester='{$edit_info["semester"]}' WHERE course_id={$edit_info["course_id"]}";
    //     $stmnt = $this->db->connection->prepare($update_query);
    //     $stmnt->execute() or die("update query failed");
    //     return true;
    // }

    public function viewAllExams()
    {
        $sql = "select *  from exams LEFT JOIN course on exams.course_id=course.course_id 
        ORDER BY exams.exam_id DESC";



        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        return $row;
    }

    public function viewSpecificTeacherExams($teacher_info)
    {
        $course = new course();
        $courses = $course->viewSpecificTeacherCourses($teacher_info);
        $result = array();
        foreach ($courses as $c) {
            $sql = "select *  from exams LEFT JOIN course on exams.course_id=course.course_id 
            where exams.course_id={$c["course_id"]}
        ORDER BY exams.exam_id DESC";



            $statement = $this->db->connection->prepare($sql);
            $statement->execute();
            while ($row = $statement->fetch()) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function viewSpecificCourseExams($course_info)
    {
        return $this->db->fetch_data_with_one_column_check($course_info, $this->table, "course_id");
    }
}
