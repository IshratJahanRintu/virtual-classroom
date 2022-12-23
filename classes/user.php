<?php

class user
{


    public $db;
    public $user_info;
    function __construct($user_type)
    {

        $this->user_info["user_type"] = $user_type;
        $this->db = Database::getInstance();
    }



    // public function login($login_info)
    // {
    //     $found_row = $this->db->fetch_data_with_two_column_check($login_info, $this->table, "email", "password");

    //     if (count($found_row) > 0) {
    //         echo "login successfull";
    //         echo  $_SESSION['user_id'] = $found_row[0]['user_id'];
    //         echo $_SESSION['user_type']
    //             = $found_row[0]['user_type'];
    //         $_SESSION['message'] = "Login Successfull!";
    //         // header("location:http://localhost/Farming-assistant/index.php");
    //     } else {
    //         $_SESSION['message'] = "Login failed!";
    //         header("location:http://localhost/virtual-classroom/loginpage.php");
    //     }
    // }


    public function deleteUser($where = null)
    {

        $sql = "DELETE FROM user WHERE user_id=$where";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
    }

    public function addMemeber($member_info)
    {

        if ($this->memberExist($member_info['email'])) {
            $_SESSION['message'] = "This email is already registered!";

            return false;
        } else {
            $this->db->insert("user", $member_info);
            return true;
        }
    }

    public function memberExist($email)
    {

        echo  $sql = "select * from user Where email='$email'";

        $statement = $this->db->connection->prepare($sql);
        $statement->execute();

        if ($statement->rowCount()) {


            return true;
        } else {

            return false;
        }
    }
    public function viewAllMembers()
    {


        $members = $this->db->fetch_data_with_one_column_check($this->user_info, "user", "user_type");
        return $members;
    }

    //     public function countMembers()
    //     {
    //         return (count($this->viewAllMembers()));
    //     }




    public function editStudent($edit_info = array())
    {


        echo  $update_query =  "UPDATE user SET  name='{$edit_info["name"]}',contact_no='{$edit_info["contact_no"]}',semester='{$edit_info["semester"]}' WHERE user_id={$edit_info["user_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        return true;
    }
    public function editTeacher($edit_info = array())
    {


        echo  $update_query =  "UPDATE user SET  name='{$edit_info["name"]}',contact_no='{$edit_info["contact_no"]}',designation='{$edit_info["designation"]}' WHERE user_id={$edit_info["user_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        return true;
    }
}