<?php


abstract class Content
{
    protected $CLDatabase;
    protected $conn;

    protected $arrayContactInfo;

    public function __construct($CLDatabase)
    {
        $this->CLDatabase = $CLDatabase;
        $this->conn = $CLDatabase->getConn();
        $this->setContactInfo();
    }



    public function setContactInfo(){
        //TODO fix admit and permittance naming
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['lang'=>$_SESSION['lang'],'permit'=>$_SESSION['admittance']])) {
            $this->arrayContactInfo = $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**Gets all available modules to display to visitor*
     * @param $page
     * @return false
     */
    public function getContent($page){
        $q = "Something";

        $stm = $this->conn->prepare($q);
        if ($stm->execute(['permit'=>$_SESSION['admittance'],'lang'=>$_SESSION['lang'],'page'=>$page])) {

            return $content = $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

    /**Check if modules is empty cuz of admittance or no translation*
     * @param $module
     * @return bool
     */
    public function checkModule($module)
    {
        if (empty($module) || $module == null) {
            return false;
        } else return true;
    }

    /**
     * @return mixed
     */
    public function getArrayContactInfo()
    {
        return $this->arrayContactInfo;
    }


}