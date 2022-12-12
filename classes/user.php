<?php

class user
{
    public $table = "user";
    public $user_info;
    public $db;
    function __construct()
    {


        $this->db = Database::getInstance();
    }



    public function login($login_info)
    {
        $found_row = $this->db->fetch_data_with_two_column_check($login_info, $this->table, "email", "password");

        if (count($found_row) > 0) {
            echo "login successfull";
            echo  $_SESSION['user_id'] = $found_row[0]['user_id'];
            echo $_SESSION['user_type']
                = $found_row[0]['user_type'];
            $_SESSION['message'] = "Login Successfull!";
            // header("location:http://localhost/Farming-assistant/index.php");
        } else {
            $_SESSION['message'] = "Login failed!";
            header("location:http://localhost/virtual-classroom/loginpage.php");
        }
    }
    public function deleteUser($where = null)
    {

        $sql = "DELETE FROM $this->table WHERE user_id=$where";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
    }

    // public function signup($signup_info)
    // {
    //     if ($this->memberExist($signup_info['email'])) {
    //         $_SESSION['message'] = "This email is already registered!";

    //         header("Location:../signup-page.php");
    //     } else {
    //         $this->db->insert($this->table, $signup_info);
    //        
    //         header("Location:../loginpage.php");
    //     }
    // }

    public function memberExist($email)
    {

        $sql = "select * from $this->table Where email=$email";

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


        $members = $this->db->fetch_data_with_one_column_check($this->user_info, $this->table, "user_type");
        return $members;
    }

    public function countMembers()
    {
        return (count($this->viewAllMembers()));
    }




    public function editUser($edit_info = array())
    {


        echo  $update_query =  "UPDATE $this->table SET  name='{$edit_info["name"]}',phone_number='{$edit_info["phone_number"]}',address='{$edit_info["address"]}',password='{$edit_info["password"]}' WHERE user_id={$edit_info["user_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
    }
}