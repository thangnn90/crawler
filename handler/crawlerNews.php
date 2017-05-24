<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 23/05/2017
 * Time: 09:27
 */
require "../simple_html_dom.php";
require "../model/Tintuc.php";
$html = file_get_html("http://thethao247.vn/bong-da-quoc-te-c2/");
$items = $html->find('ul.list_cate_news li');
$jobs = array();
$con = mysqli_connect("localhost", "root", "", "thethao247") or die('connect error!');
mysqli_set_charset($con, 'utf8');
foreach ($items as $item) {

    $jobs["title"] = $item->find('.info_cate_news h3 a')[0]->plaintext;
    $jobs['desc'] = str_replace('Thể Thao 247 - ', '', $item->find('.sapo_news')[0]->plaintext);
    $jobs['img'] = $item->find('img')[0]->src;
    $path = '../images/' . basename($jobs['img']);
    file_put_contents($path, file_get_contents($jobs['img']));
    $link = $item->find('.info_cate_news h3 a')[0]->href;
    $html_content = file_get_html($link);
    $content = $html_content->find('#main-detail')[0];
    foreach ($content->find('p') as $link_content) {
        $link_content->outertext = $link_content->plaintext;
    }
    foreach ($content->find('img') as $value2) {
        $value2->outertext = "";
    }
    foreach ($content->find('iframe') as $value2) {
        $value2->outertext = "";
    }
    $jobs["content"] = trim($content->innertext);

    $title = addslashes($jobs['title']);
    $img = basename($jobs['img']);
    $desc = addslashes($jobs['desc']);
    $content_ = addslashes($jobs["content"]);

//    $new = new Tintuc($title, $img, $desc, $content_);
//    array_push($json, $new);
//    var_dump($title);
    $query = "SELECT * FROM news where title='$title'";
    if ($result_exits = mysqli_query($con, $query)) {
        if (mysqli_num_rows($result_exits) > 0) {
            echo 'Tồn tại tin trong dữ liệu'."<br>";
//            $sql_delete = "DELETE FROM news WHERE title='$title'";
//            mysqli_query($con, $sql_delete);
        } else {
            $sql = "INSERT INTO news(title,img,desc_,content) VALUES ('$title','$img','$desc','$content_')";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                echo 'Lỗi';
            } else {
                echo 'Thêm dữ liệu thành công' . '</br>';
            }
        }
    } else {
        echo 'truy vấn lỗi';
    }
}
mysqli_close($con);
//echo json_encode($json);