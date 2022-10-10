<?php

class Admit
{

    protected $CLDatabase;
    protected $conn;

    public function __construct($CLDatabase)
    {
        $this->CLDatabase = $CLDatabase;
        $this->conn = $CLDatabase->getConn();
    }

    public function setAdmit($key)
    {
        //TODO Test this
        $date = date("Y:m:d H:i:s");
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['key' => $key, 'startdate' => $date, 'enddate' => $date])) {
            $ans = $stm->fetch(PDO::FETCH_ASSOC);
            if ($ans) {
                $_SESSION['admittance'] = $ans['level'];
                if (!is_null($ans['welcome_msg'])){
                    $_SESSION['Alert'] = "               
                <div class='alert alert-success' role='alert'>
                    ".$ans['welcome_msg']."
                </div>
                ";
                }
            } else {
                //TODO make err alert non static to local lang / user lang
                $_SESSION['Alert']  = "               
                <div class='alert alert-warning' role='alert'>
                    Key invalid
                </div>
                ";
            }

        }
    }



}