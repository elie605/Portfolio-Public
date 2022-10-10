<?php


class Project extends Content
{
    private $Title;
    private $Link;
    private $Email;
    private $Desc;
    private $MyRoll;
    private $MyExp;
    private $Logo;
    private $LogoAlt;
    private $Project;
    private $ProjectAlt;

    /**
     * Project constructor.
     */
    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);


    }

    public function getProjects(){
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['permit'=>$_SESSION['admittance'],'lang'=> $_SESSION['lang'] ])) {
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function setInfo($id){
        //$q = "Something";
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['permit'=>$_SESSION['admittance'],'id'=> $id ])) {
            $v = $stm->fetchAll(PDO::FETCH_OBJ)[0];
            $this->Title = $v->title;
            $this->Link = $v->link;
            $this->Email = $v->email;
            $this->Desc = $v->desc;
            $this->MyRoll = $v->my_roll;
            $this->MyExp = $v->my_exp;
            $this->Logo = $v->logo_img;
            $this->LogoAlt = $v->logo_alt;
            $this->Project = $v->project_img;
            $this->ProjectAlt = $v->project_img_alt;
            return true;
        }else return false;
    }

    public function getTalen($id)
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['id'=>$id])) {
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->Link;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->Desc;
    }

    /**
     * @return mixed
     */
    public function getMyRoll()
    {
        return $this->MyRoll;
    }

    /**
     * @return mixed
     */
    public function getMyExp()
    {
        return $this->MyExp;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->Logo;
    }

    /**
     * @return mixed
     */
    public function getLogoAlt()
    {
        return $this->LogoAlt;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->Project;
    }

    /**
     * @return mixed
     */
    public function getProjectAlt()
    {
        return $this->ProjectAlt;
    }




}