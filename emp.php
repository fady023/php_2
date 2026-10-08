<?php

class emp
{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function get_emps()
    {
        $q = "select name as employee_name,email as employee_email,dep_name as department_name from emp join departments on depart_id=dep_id" ;
        $result = $this->con->query($q);
        $employees = array();
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }

        return $employees;
    }

    public function show_emp($id)
    {

        $q = "select name,email,dep_name from emp join departments on depart_id=dep_id where id='$id'";
        $res = $this->con->query($q);
        $employee = $res->fetch_assoc();
        return $employee;
    }
    public function store($data)
    {

        $name = $data['name'];
        $email = $data['email'];

        $check_email = $this->con->query("select * from emp where email='$email'");
        $check_email_rows = $check_email->num_rows;

        if ($check_email_rows > 0) {
            return ["error" => "this email already taken"];
        } else {
            $q = "insert into emp(name,email,depart_id) values('$name','$email',2)";
            $res = $this->con->query($q);
            if ($res) {
                return ["success" => "Done", "data" => $res];
            } else {
                return ["error" => $this->con->error];
            }
        }
    }
    public function update($data, $id)
    {

        $name = $data['name'];
        $email = $data['email'];

        $check_email = $this->con->query("select * from emp where email='$email' AND id !='$id'");
        $check_email_rows = $check_email->num_rows;

        if ($check_email_rows > 0) {
            return ["error" => "this email already taken"];
        } else {
            $q = "update emp set name='$name' , email='$email' where id='$id'";
            $res = $this->con->query($q);
            if ($res) {
                return ["success" => "data updated", "data" => $res];
            } else {
                return ["error" => $this->con->error];
            }
        }
    }

    public function destroy($id)
    {
        $res = $this->con->query("delete from emp where id='$id'");
        if ($res) {
            return ["success" => "deleted", "data" => $res];
        } else {
            return ["error" => $this->con->error];
        }
    }
}
