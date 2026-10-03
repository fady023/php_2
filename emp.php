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
        $q = "select * from emp";
        $result = $this->con->query($q);
        $employees = array();
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }

        return $employees;
    }

    public function show_emp($id)
    {

        $q = "select * from emp where id='$id'";
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

        if($check_email_rows > 0){
           return ["error"=>"this email already taken"];
        }else{
             $q = "insert into emp(name,email) values('$name','$email')";
        $res = $this->con->query($q);
        if ($res) {
          return ["success"=>"Done","data"=>$res];
        } else {
          return ["error"=>$this->con->error];
        }
    }

        }
        public function update($data,$id){

         $name = $data['name'];
        $email = $data['email'];
       
        $check_email = $this->con->query("select * from emp where email='$email' AND id !='$id'");
        $check_email_rows = $check_email->num_rows;

        if($check_email_rows > 0){
           return ["error"=>"this email already taken"];
        }else{
             $q = "update emp set name='$name' , email='$email' where id='$id'";
        $res = $this->con->query($q);
        if ($res) {
          return ["success"=>"data updated","data"=>$res];
        } else {
          return ["error"=>$this->con->error];
        }
    }
        }

       
}
