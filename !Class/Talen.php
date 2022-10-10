<?php


abstract class Talen extends Content
{
    /**$langArray page CMScontent 'talen'**/
    protected $langArray;

    public function __construct($CLDatabase)
    {
        parent::__construct($CLDatabase);
    }


    public function getLang(){
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute(['lang'=>$_SESSION['lang']])) {
            $this->langArray = $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getLangHTML($Talen){
        //TODO fix this cancer and probably use a global indent rather then us it in each article
        $i = 0;
        $r = 0;
        foreach ($Talen as $Taal){
            if ($i == 0) {
                if ($r == 0) {
                    $IIndent = 1;
                    $r = 1;
                } else {
                    $IIndent = 2;
                    $r = 0;
                }
                echo "
                <div class='row mt-5'>
                    <div class='col-xl-$IIndent'>

                    </div>";
            }
            echo "
              <div class='col-xl-3'>
                        <div class='row'>
                            <div class='col-xl-6'>
                                <img class='card-img-bottom rounded-circle' src='../!IMG/PF.jpg' alt='Card image'>
                            </div>
                            <div class='col-xl-6 p-0'>
                                <div class='card-body text-center'>
                                    <article>
                                    <h4 class='card-title '>" . $Taal->title . "</h4>
                                    
                                        <p class='card-text'>" . $Taal->desc . "</p>
                                    </article>
                                </div>
                            </div>
                        </div>
              </div>
                    ";
            $i++;
            if ($i == 3) {
                echo " </div>   ";
                $i=0;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getLangArray()
    {
        return $this->langArray;
    }
}