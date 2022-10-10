<?php


class Home extends Talen
{
    private $titleWieBenIk;
    private $articelWieBenIk;
    private $titleTalen;
    private $articleTalen;


    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);

        $this->setContent();
        $this->getLang();
    }

    /**Sets all available modules to display to visitor**/
    public function setContent()
    {
        foreach ($this->getContent("home") as $o) {
            switch ($o->module) {
                case "TitleWieBenIk":
                    $this->titleWieBenIk = $o->text;
                    break;
                case "ArticleWieBenIk":
                    $this->articelWieBenIk = $o->text;
                    break;
                case "TitleTalen":
                    $this->titleTalen = $o->text;
                    break;
            }
        }
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
    public function getArticelWieBenIk()
    {
        return $this->articelWieBenIk;
    }

    /**
     * @return mixed
     */
    public function getTitleTalen()
    {
        return $this->titleTalen;
    }

    /**
     * @return mixed
     */
    public function getArticleTalen()
    {
        return $this->articleTalen;
    }


}