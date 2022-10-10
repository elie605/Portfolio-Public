<?php


class Overmij extends Talen
{


    private $titleWieBenIk;
    private $articleWieBenIk;
    private $titleHobby;
    private $articleHobby;
    private $titleOpleidingen;
    private $titleContactGe;
    private $titleWerkervaring;
    private $titleTalen;

    //TODO implement order into vvvvvvv
    private $opleiArray;
    private $werkEArray;

    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);

        $this->setContent();
        $this->getLang();
        $this->setOpleidingen();
        $this->setWerkervaringen();
    }

    /**Get and Sets all available modules to display to visitor**/
    public function setContent()
    {
        foreach ($this->getContent("overmij") as $o) {
            switch ($o->module) {
                case "TitleWieBenIk":
                    $this->titleWieBenIk = $o->text;
                    break;
                case "ArticleWieBenIk":
                    $this->articleWieBenIk = $o->text;
                    break;
                case "TitleHobby":
                    $this->titleHobby = $o->text;
                    break;
                case "ArticleHobby":
                    $this->articleHobby = $o->text;
                    break;
                case "TitleOpleidingen":
                    $this->titleOpleidingen = $o->text;
                    break;
                case "TitleContactGe":
                    $this->titleContactGe = $o->text;
                    break;
                case "TitleWerkervaring":
                    $this->titleWerkervaring = $o->text;
                    break;
                case "TitleTalen":
                    $this->titleTalen = $o->text;
                    break;
            }
        }
    }

    /**Get and Sets list of known opleidingen by owner of the portfolio from database**/
    public function setOpleidingen(){
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['lang'=>$_SESSION['lang']])) {
            $this->opleiArray = $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }


    /**Get and Sets list of known Work experience by owner of the portfolio from database**/
    public function setWerkervaringen(){
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['lang'=>$_SESSION['lang']])) {
            $this->werkEArray = $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**
     * @return mixed
     */
    public function getWerkEArray()
    {
        return $this->werkEArray;
    }

    /**
     * @return mixed
     */
    public function getOpleiArray()
    {
        return $this->opleiArray;
    }

    /**
     * @return mixed
     */
    public function getTitleWieBenIk()
    {
        return $this->titleWieBenIk;
    }

    /**
     * @return mixed
     */
    public function getArticleWieBenIk()
    {
        return $this->articleWieBenIk;
    }

    /**
     * @return mixed
     */
    public function getTitleHobby()
    {
        return $this->titleHobby;
    }

    /**
     * @return mixed
     */
    public function getArticleHobby()
    {
        return $this->articleHobby;
    }

    /**
     * @return mixed
     */
    public function getTitleOpleidingen()
    {
        return $this->titleOpleidingen;
    }

    /**
     * @return mixed
     */
    public function getTitleContactGe()
    {
        return $this->titleContactGe;
    }

    /**
     * @return mixed
     */
    public function getTitleWerkervaring()
    {
        return $this->titleWerkervaring;
    }

    /**
     * @return mixed
     */
    public function getTitleTalen()
    {
        return $this->titleTalen;
    }



}