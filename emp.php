<?php   

class emp{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function get_emps(){
        $sql = "select * from emp";
        $result = $this->con->query($sql);
        $employee = array();
        while($row = $result->fetch_assoc()){
            $employee[] = $row ; 
        }

        return $employee;
    }

    public function show_emp($id){

        $q = "select * from emp where id='$id'";
        $res = $this->con->query($q);
        $employee = $res->fetch_assoc();
        return $employee;

    }
    public function store($data){




    
    }
}