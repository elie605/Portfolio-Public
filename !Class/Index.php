<?php


class Index
{
    private $ClassName;
    private $FilesNameTypeBase;
    private $FilesNameTypeA;

    public function __construct()
    {
        $this->FilesNameTypeBase =
            preg_grep('/^[a-zA-Z-]*$/',
                explode("\n",
                    implode("\n",
                        array_values(
                            array_diff(
                                //TODO comments
                                scandir("../"),
                                array()
                            )
                        )
                    )
                )
            );
    }

    public function GetLink()
    {
        return $this->FilesNameTypeBase;
    }

    //TODO move to nav?
    public function GetActiveLink($Page, $links)
    {
        if ($Page == $links) {
            return "active";
        }
        else return null;
    }
}