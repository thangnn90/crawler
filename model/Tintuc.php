<?php

/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24/05/2017
 * Time: 02:40
 */
class Tintuc
{
    public $title;
    public $img;
    public $desc;
    public $content;

    /**
     * Tintuc constructor.
     * @param $title
     * @param $img
     * @param $desc
     * @param $content
     */
    function Tintuc($title, $img, $desc, $content)
    {
        $this->title = $title;
        $this->img = $img;
        $this->desc = $desc;
        $this->content = $content;
    }


}