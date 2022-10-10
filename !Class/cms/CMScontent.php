<?php


class CMScontent extends CMS
{

    private $modules;
    private $pages;

    private $id;
    private $lang;
    private $module;
    private $page;
    private $img;
    private $img_alt;
    private $text;


    /**
     * CMScontent constructor.
     */
    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);


        $this->setModules();
        $this->setPages();
    }

    public function getAllInfo()
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute()) {
            $in = $stm->fetchAll(PDO::FETCH_OBJ);
            return $in;
        }
    }

    private function setModules()
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute()) {
            $this->modules = $stm->fetchAll(PDO::FETCH_COLUMN);

        }
    }

    private function setPages()
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute()) {
            $this->pages = $stm->fetchAll(PDO::FETCH_COLUMN);
        }
    }

    public function setInfo($id)
    {
        $this->id = $id;
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['id' => $id])) {
            $in = $stm->fetch(PDO::FETCH_OBJ);


            $this->lang = $in->lang;
            $this->module = $in->module;
            $this->page = $in->page;
            $this->admit = $in->admit;
            $this->img_alt = $in->img_alt;
            $this->img = $in->img;
            $this->text = $in->text;

        }

    }

    public function alterInfo($id, $text, $admit)
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['text' => $text, 'id' => $id, 'admit' => $admit])) {
            $_SESSION['Alert'] = "
            <div class='alert alert-success' role='alert'>
               U heeft $id bijgewerkt
            </div>";
            echo "<meta http-equiv='refresh' content='0;url=SomeUrlHere/eloi/CMS/?p=cont&id=$id' />";
        }
    }


    public function clearField($id)
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['id' => $id])) {
            $_SESSION['Alert'] = "
            <div class='alert alert-success' role='alert'>
               U heeft $id leeg gehaald
            </div>";
            echo "<meta http-equiv='refresh' content='0;url=SomeUrlHere/eloi/CMS/?p=cont&id=$id' />";
        }
    }

    public function getModuleOpt()
    {
        $this->getOption($this->getModules() ,'module',true);
    }



    public function getPagesOpt()
    {
        $this->getOption($this->getPages(),'pages',true);
    }


    public function getModuleOptId()
    {
        $this->getOptionId($this->modules,$this->module,'module',true);
    }


    public function getPagesOptId()
    {
        $this->getOptionId($this->getPages(),$this->getPage(),'pages',true);
    }
    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @return mixed
     */
    public function getAdmit()
    {
        return $this->admit;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getImgAlt()
    {
        return $this->img_alt;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */


}