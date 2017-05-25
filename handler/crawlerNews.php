<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 23/05/2017
 * Time: 09:27
 */
require "../simple_html_dom.php";
require "../model/Tintuc.php";
$urlsite = $_POST['urlsite'];
//http://thethao247.vn/bong-da-quoc-te-c2/

if (isset($urlsite)) {

    if (mb_strpos($urlsite, "http://thethao247.vn/bong-da-quoc-te-c2/") !== false) {
        //Tin thể thao quốc tế
        $html = file_get_html($urlsite);
    } else if (mb_strpos($urlsite, "http://thethao247.vn/champions-league-c13/") !== false) {
        //Tin c1
        $html = file_get_html($urlsite);
    } else if (mb_strpos($urlsite, "http://thethao247.vn/tin-chuyen-nhuong-c14/") !== false) {
        //Tin chuyển nhượng
        $html = file_get_html($urlsite);
    } else {

    }

}
//echo json_encode($json);