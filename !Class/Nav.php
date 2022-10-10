<?php

class nav
{

    private $CLIndex;
    private $Page;

    public function __construct($cl, $p)
    {
        $this->CLIndex = $cl;
        $this->Page = $p;
    }

    public function getNav()
    {

        $arr = array();
        //Get all data for each visitable page folder
        foreach ($this->CLIndex->GetLink() as $link) {
            //TODO ../ to ../../ explain why its like that
            $mDataJson = json_decode(file_get_contents("../$link/resources.json"), true);
            //Add folder name to array as link, for usage in link
            $mDataJson['link'] = $link;
            array_push($arr, $mDataJson);
        }

        //Get norder column from array
        $ord = array_column($arr, 'norder');
        //Sort array on norder(navigation order) numbers.
        array_multisort($ord, SORT_ASC, $arr);

        //for each object in array check if its allowed to show then show
        foreach ($arr as $mPage) {
            $link = $mPage['link'];
            //check if page link is in right language, is not hidden and isnt for people who
            // loged in also checks for admittance
            if (in_array($_SESSION['lang'], $mPage["lang"]) && $_SESSION['admittance'] <= $mPage["admittance"] && $mPage["hidden"] == false && $mPage["login"] == false) {

                echo "
                    <li class='nav-item '>    
                        <a class='nav-link Link  " . $this->CLIndex->GetActiveLink($this->Page, $link) . "' href=../$link>
                                    " . $mPage["title"] . "
                        </a>
                    </li>
                    ";
            }

        }
        //Checks for the same things as last time, but only allows page's that the user can only
        // visit while loged in
        if ($_SESSION['login']) {
            foreach ($arr as $lPage) {
                $link1 = $lPage['link'];
                if (in_array($_SESSION['lang'], $lPage["lang"]) && $_SESSION['admittance'] <= $lPage["admittance"] && $lPage["hidden"] == false && $lPage["login"] == true)

                    echo "<li class='nav-item '>    
                        <a class='nav-link Link  " . $this->CLIndex->GetActiveLink($this->Page, $link) . "' href=../$link1>
                                    " . $lPage["title"] . "
                        </a>
                    </li>";
            }
        }
    }

}
