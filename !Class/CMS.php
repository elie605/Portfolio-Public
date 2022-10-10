<?php


abstract class CMS
{
    protected $admit;
    protected $taal;
    protected $talen;

    protected $CLDatabase;
    protected $conn;


    public function __construct($CLDatabase)
    {
        $this->CLDatabase = $CLDatabase;
        $this->conn = $CLDatabase->getConn();

        $this->setTalen();

    }

    public abstract function getAllInfo();

    public abstract function setInfo($id);

    public function getAdmitOptId()
    {
        echo "<select name='admit'> ";
        for ($i = 1; $i < 4; $i++) {
            if ($this->admit == $i) {
                echo "<option selected value='$i'>$i</option>";
            } else {
                echo "<option value='$i'>$i</option>";
            }
        }
        echo "</select>";
    }

    /**
     * getOptionId echo's an option field that is generated from a given array or array nested
     * inside another array.
     *
     * @param $obj (array)  array to build option list from. if the first item on the array list
     * is an array it wil use that nested array to generate an option with a different value than
     * what is displayed to the user
     * @param $dis (bool)   set field disabled or not
     * @param $naam (string) name of select field
     */
    protected function getOption($obj, $naam, $dis)
    {
        $this->getOpenOption($naam, $dis);
        if (is_array($obj[0])) {
            foreach ($obj as $o) {
                echo "<option value='$o[0]'>$o[1]</option>";
            }
        } else {
            foreach ($obj as $o) {
                echo "<option value='$o'>$o</option>";
            }
        }
        echo "</select>";
    }

    /**
     * getOptionId echo's an option field that is generated from a given array or array nested
     * inside another array. and displays option field with same id as given.
     *
     * @param $obj (array)  array to build option list from. if the first item on the array list
     * is an array it wil use that nested array to generate an option with a different value than
     * what is displayed to the user
     * @param $dis (bool)  set field disabled or not
     * @param $id (int)   id/value of option that needs to be selected, if no id available use:
     * getOption
     * @param $naam (string) name of select field
     */
    protected function getOptionId($obj, $id, $naam, $dis)
    {
        $this->getOpenOption($naam, $dis);
        if (is_array($obj[0])) {
            foreach ($obj as $o) {
                if ($id == $o[0]) {
                    echo "<option selected value='$o[0]'>$o[1]</option>";
                } else {
                    echo "<option value='$o[0]'>$o[1]</option>";
                }
            }
        } else {
            foreach ($obj as $o) {
                if ($id == $o) {
                    echo "<option selected value='$o'>$o</option>";
                } else {
                    echo "<option value='$o'>$o</option>";
                }
            }
        }

        echo "</select>";
    }

    protected function getCheckId($obj, $id, $naam, $dis)
    {
        if (empty($id)) {
            $this->getCheck($obj, $naam, $dis);
        } else {
            if ($dis) {
                echo "<fieldset disabled>";
            } else {
                echo "<fieldset>";
            }
            if (is_array($obj[0])) {
                $i = 0;
                foreach ($obj as $o) {
                    echo "<input" . $this->checkCheckId($o, $id[0]) . " type='checkbox' name='$naam$i' value='$o[0]'><label for='$naam$i'>$o[1]</label><br/>";
                    $i++;
                }
            } else {
                $i = 0;
                foreach ($obj as $o) {
                    echo "<input " . $this->checkCheckId($o, $id) . " type='checkbox' name='$naam$i' value='$o'><label for='$naam$i'>$o</label><br/>";
                    $i++;
                }
            }
            echo "</fieldset>";
        }
    }

    protected function getCheck($obj, $naam, $dis)
    {
        if ($dis) {
            echo "<fieldset disabled>";
        } else {
            echo "<fieldset>";
        }
        if (is_array($obj[0])) {
            $i = 0;
            foreach ($obj as $o) {
                echo "<input type='checkbox' name='$naam$i' value='$o[0]'><label for='$naam$i'>$o[1]</label><br/>";
                $i++;
            }
        } else {
            foreach ($obj as $o) {
                $i = 0;
                foreach ($obj as $o) {
                    echo "<input type='checkbox' name='$naam$i' value='$o'><label for='$naam$i'>$o</label><br/>";
                    $i++;
                }
            }
        }
        echo "</fieldset>";
    }

    private function checkCheckId($obj, $id)
    {
        if ($obj == $id) return " checked";
    }

    private function setTalen()
    {
        $q = "Something";
        $stm = $this->conn->prepare($q);
        if ($stm->execute()) {
            $this->talen = $stm->fetchAll(PDO::FETCH_BOTH);
        }
    }

    public function getAdmitOpt()
    {
        echo "<select name='admit'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                </select>
             ";
    }

    private function getOpenOption($naam, $dis)
    {
        if ($dis) {
            echo "<select name='$naam' disabled> ";
        } else echo "<select name='$naam'> ";
    }

    public function getTalenOptId($dis)
    {
        $this->getOptionId($this->talen, $this->taal, 'talen', $dis);
    }

    public function getTalenOpt($dis)
    {
        $this->getOption($this->talen, 'talen', $dis);
    }

}