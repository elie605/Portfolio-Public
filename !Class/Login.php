<?php


class Login
{
    protected $CLDatabase;
    protected $conn;
    /**
     * Login constructor.
     */
    public function __construct($CLDatabase)
    {
        $this->CLDatabase = $CLDatabase;
        $this->conn = $CLDatabase->getConn();
    }

    public function  login($usr , $pp){
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['username'=>$usr,'password'=> $pp ])) {
            $a = $stm->fetchAll(PDO::FETCH_OBJ)[0];

            $_SESSION['admittance'] = $a->admit;
            $_SESSION['user'] =$a->id;
            $_SESSION['login'] = true;

            $_SESSION['Alert'] = "
            <div class='alert alert-success' role='alert'>
               U bent ingelogged
            </div>
            ";
            //TODO static url
            echo '<meta http-equiv="refresh" content="0;url=Something/portfolio/Home/" />';
        }
    }


    public function logout(){
        $_SESSION['user'] = null;
        $_SESSION['login'] = false;

        $_SESSION['Alert'] = "
            <div class='alert alert-success' role='alert'>
               U bent uitgelogged
            </div>
            ";
    }
}