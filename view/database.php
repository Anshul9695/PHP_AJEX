<?php
class Database
{
    private $connection;
    public function __construct()
    {
        $this->connection_db();
    }
    public function connection_db()
    {
        $this->connection = mysqli_connect('localhost', 'root', 'rootdb', 'oopscrud');
        if (mysqli_connect_error()) {
            die("Database connection error" . mysqli_connect_error() . mysqli_connect_errno());
        } else {
            // echo 'connection created successfully';
            // die;
        }
    }
    public function save_value($first_name, $last_name, $email, $gender, $age, $address)
    {
        $sql = "INSERT INTO crud_table(firstname,lastname,email,gender,age,address) VALUES('$first_name','$last_name','$email','$gender','$age','$address')";
        $insert = mysqli_query($this->connection, $sql);
        if ($insert) {
            return $insert;
        } else {
            return false;
        }
    }

    public function display()
    {
        $sql = "SELECT * FROM crud_table";
        $select = mysqli_query($this->connection, $sql);
        if ($select->num_rows > 0) {
            return $select;
        } else {
            return false;
        }
    }

    public function select_by_id($id)
    {
        $sql = "SELECT * FROM crud_table WHERE id='$id'";
        $select = mysqli_query($this->connection, $sql);
        if ($select->num_rows > 0) {
            return $select;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM crud_table WHERE id='$id'";
        $delete_data = mysqli_query($this->connection, $sql);
        if ($delete_data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function Update($edit_id, $edit_fname, $edit_lname, $edit_email, $edit_gender, $edit_age, $edit_address)
    {
        $sql = "UPDATE crud_table SET firstname='$edit_fname',lastname='$edit_lname',email='$edit_email',gender='$edit_gender',age='$edit_age',address='$edit_address' WHERE id='$edit_id'";
        $update_data = mysqli_query($this->connection, $sql);
        if ($update_data) {
            echo 1;
        } else {
            echo 0;
        }
    }


 //search by the first name and last name 
 public function search($search_terms)
    {
        $sql = "SELECT * FROM crud_table WHERE firstname LIKE '%{$search_terms}%' OR lastname LIKE '%{$search_terms}%'";
        $select = mysqli_query($this->connection, $sql);
        if ($select->num_rows > 0) {
            return $select;
        } else {
            return false;
        }
    }   
}
$database = new Database;
