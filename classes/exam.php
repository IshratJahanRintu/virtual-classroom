<?php

class exam
{

    public $table = "exams";
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getIndividual($exam_id)

    {
        $info['exam_id'] = $exam_id;

        $found_row = $this->db->fetch_data_with_one_column_check($info, $this->table, "exam_id");

        if (count($found_row) > 0) {

            return $found_row[0];
        }
    }

    function addExam($exam_info)
    {


        if ($this->db->insert($this->table, $exam_info)) {

            return true;
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

    public function questionExist($exam_id)
    {
        $exam_info['exam_id'] = $exam_id;
        return count($this->db->fetch_data_with_one_column_check($exam_info, "question", "exam_id"));
    }

    public function viewSpecificExamQuestions($exam_id)
    {
        $exam_info['exam_id'] = $exam_id;
        return $this->db->fetch_data_with_one_column_check($exam_info, "question", "exam_id");
    }
    public function examMark($exam_id)

    {
        $exam_info['exam_id'] = $exam_id;

        $found_row = $this->db->fetch_data_with_one_column_check($exam_info, $this->table, "exam_id");

        if (count($found_row) > 0) {

            return $found_row[0]['marks_per_qn'];
        }
        # code...
    }

    public function addHistory($history_info)
    {
        if ($this->db->insert("exam_history", $history_info)) {

            return true;
        }
    }

    public function examCourse($exam_id)

    {
        $exam_info['exam_id'] = $exam_id;

        $found_row = $this->db->fetch_data_with_one_column_check($exam_info, $this->table, "exam_id");

        if (count($found_row) > 0) {

            return $found_row[0]['course_id'];
        }
        # code...
    }

    public function examTopic($exam_id)

    {
        $exam_info['exam_id'] = $exam_id;

        $found_row = $this->db->fetch_data_with_one_column_check($exam_info, $this->table, "exam_id");

        if (count($found_row) > 0) {

            return $found_row[0]['topic'];
        }
        # code...
    }




    public function examTaken($exam_info)
    {
        return ((count($this->db->fetch_data_with_two_column_check($exam_info, "exam_history", "exam_id", "student_id"))) > 0);
        # code...
    }
    public function specificExamResult($exam_id)
    {
        $sql = "select *  from user LEFT JOIN exam_history  on exam_history.student_id=user.user_id
            where exam_history.exam_id=$exam_id ORDER BY achieved_mark desc";

        $result = array();

        $statement = $this->db->connection->prepare($sql);
        $statement->execute() or die("q fail");
        while ($row = $statement->fetch()) {
            $result[] = $row;
        }

        return $result;
        # code...
    }
    public function scificExamSingleResult($info)
    {
        return  $this->db->fetch_data_with_two_column_check($info, "exam_history", "exam_id", "student_id");
        # code...
    }

    public function specificStudentResult($info)
    {
        $sql = "select *  from exam_history LEFT JOIN exams on exam_history.exam_id=exams.exam_id 
            where exam_history.student_id={$info["student_id"]}";



        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            $result[] = $row;
        }

        return $result;
        # code...
    }
    public function courseResult($course_id)
    {
        $course_info['course_id'] = $course_id;
        return   $this->db->fetch_data_with_one_column_check($course_info, "exam_history", "course_id");
    }
}