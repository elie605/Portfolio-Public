<?php


class CMSproject extends CMS
{

    private $lang;
    private $bedrijfId;
    private $bedrijven;
    private $allProgTalen;


    private $title;
    private $link;
    private $email;
    private $desc;
    private $descshort;
    private $myroll;
    private $myexp;
    private $progTalen;


    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);


        $this->setBedrijf();
        $this->setAllProgTalen();
    }

    private function setBedrijf()
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute()) {
            $this->bedrijven = $stm->fetchAll(PDO::FETCH_BOTH);
        }
    }

    private function setAllProgTalen()
    {
        $q = "Something";
        $stm0 = $this->conn->prepare($q);
        if ($stm0->execute()) {
            $this->allProgTalen = $stm0->fetchAll(PDO::FETCH_BOTH);
        }
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

    public function setInfo($id)
    {
        $this->id = $id;
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['id' => $id])) {
            $in = $stm->fetch(PDO::FETCH_OBJ);

            $this->lang = $in->lang;
            $this->bedrijfId = $in->bedrijf_id;
            $this->title = $in->title;
            $this->link = $in->link;
            $this->email = $in->email;
            $this->desc = $in->desc;
            $this->descshort = $in->desc_short;
            $this->myexp = $in->my_exp;
            $this->myroll = $in->my_exp;
            $this->admit = $in->admit;

            $q = "Something";
            $stm0 = $this->conn->prepare($q);
            if ($stm0->execute(['id' => $id])) {
                $this->progTalen = $stm0->fetchAll(PDO::FETCH_BOTH);
            }
        }
    }

    public function alterInfo($id, $admit, $taal, $bedrijf, $Title, $link, $email, $desc, $descShort, $myroll, $myexp, $progTalen)
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);

        if ($stm->execute(['id' =>$id, 'bedrijf_id' => $bedrijf, 'lang' => $taal, 'title' => $Title, 'link' => $link, 'email' => $email, 'desc' => $desc, 'desc_short' => $descShort, 'my_roll' => $myroll, 'my_exp' => $myexp, 'admit' => $admit])) {
            $q = "Something";
            $stm0 = $this->conn->prepare($q);
            if ($stm0->execute(['id' => $id])) {
                $this->submitProgTalen($id, $progTalen);
                $_SESSION['Alert'] = "
                        <div class='alert alert-success' role='alert'>
                           U heeft $Title aangepast
                        </div>";
                echo "<meta http-equiv='refresh' content='0;url=SomeUrlHere/eloi/CMS/?p=proj' />";
            }
        }
    }

    public function submitInfo($admit, $taal, $bedrijf, $Title, $link, $email, $desc, $descShort, $myroll, $myexp, $progTalen)
    {
        $q = "Something";
        $stm0 = $this->conn->prepare($q);
        if ($stm0->execute()) {
            $order = $stm0->fetchColumn();
            $order++;
            $q = "Something";
            $stm = $this->conn->prepare($q);

            if ($stm->execute(['order' => $order, 'bedrijf_id' => $bedrijf, 'lang' => $taal, 'title' => $Title, 'link' => $link, 'email' => $email, 'desc' => $desc, 'desc_short' => $descShort, 'my_roll' => $myroll, 'my_exp' => $myexp, 'admit' => $admit])) {
                $q = "Something";
                $stm0 = $this->conn->prepare($q);
                if ($stm0->execute()) {
                    $this->submitProgTalen($stm0->fetchColumn(), $progTalen);
                    $_SESSION['Alert'] = "
                        <div class='alert alert-success' role='alert'>
                           U heeft $Title toegevoegd
                        </div>";
                    echo "<meta http-equiv='refresh' content='0;url=SomeUrlHere/eloi/CMS/?p=proj' />";
                }
            }
        }
    }

    private function submitProgTalen($id, $progTalen)
    {
        foreach ($progTalen as $o) {
            $q = "Something";
            $stm1 = $this->conn->prepare($q);
            $stm1->execute(['pid' => $id, 'tid' => $o]);
        }
    }

    public function deleteField($id)
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['id' => $id])) {
            $q = "Something";
            $stm = $this->conn->prepare($q);
            if ($stm->execute(['id' => $id])) {
                $_SESSION['Alert'] = "
            <div class='alert alert-success' role='alert'>
               U heeft $id verwijdert
            </div>";
                echo "<meta http-equiv='refresh' content='0;url=SomeUrlHere/eloi/CMS/?p=proj' />";
            }
        }
    }

    public function getBedrijfOptId($dis)
    {
        $this->getOptionId($this->bedrijven, $this->bedrijfId, 'bedrijf', $dis);
    }

    public function getBedrijfOpt($dis)
    {
        $this->getOption($this->bedrijven, 'bedrijf', $dis);
    }

    public function getProgTaalCheckId($dis)
    {
        $this->getCheckId($this->allProgTalen, $this->progTalen, 'ProgTaal', $dis);

    }

    public function getProgTaalCheck($dis)
    {
        $this->getCheck($this->allProgTalen, 'ProgTaal', $dis);
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
    public function getBedrijfId()
    {
        return $this->bedrijfId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @return mixed
     */
    public function getDescshort()
    {
        return $this->descshort;
    }

    /**
     * @return mixed
     */
    public function getMyroll()
    {
        return $this->myroll;
    }

    /**
     * @return mixed
     */
    public function getMyexp()
    {
        return $this->myexp;
    }

    /**
     * @return mixed
     */
    public function getAllProgTalen()
    {
        return $this->allProgTalen;
    }


}