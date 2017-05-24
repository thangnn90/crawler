<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24/05/2017
 * Time: 08:54
 */
require "../simple_html_dom.php";
$html = file_get_html("http://thethao247.vn/lich-thi-dau-bong-da/");
$items = $html->find('ul.matchList li');
$jobs = array();
foreach ($items as $item) {

    foreach ($item->find('.teamName') as $team) {
        $team->plaintext;
        echo $team . "<br>";
    }
    $jobs['daymatch'] = $item->find('.daymatch')[0]->plaintext;
    echo $jobs['daymatch'] . "<br>";
    //get logo team
    foreach ($item->find('img') as $logo) {
        $img = $logo->src;
        $path = '../images/logoteam/' . basename($img);
        file_put_contents($path, file_get_contents($img));
        echo basename($img) . "<br>";
    }
    //End
    $jobs['score'] = $item->find('.score')[0]->plaintext;
    echo $jobs['score'] . "<br>";

}