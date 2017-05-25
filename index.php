<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: nguye-->
<!-- * Date: 23/05/2017-->
<!-- * Time: 08:25-->
<!-- */-->
<html>
<head>
    <title>Crawler manager</title>
    <!--    <style href="/dist/css/bootstrap.css"></style>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <style>
        body {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-weight: bold">Crawler Manage</a>
        </div>
    </nav>
</div>
<div class="container">
    <form method="post" action="handler/crawlerNews.php">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">URL</div>
                <input type="text" class="form-control" id="urlsite" name="urlsite" placeholder="nhập đường dẫn">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
$con = mysqli_connect("localhost", "root", "", "thethao247") or die('connect error!');
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM news ORDER BY ID DESC";
$result = mysqli_query($con, $sql);

?>
<div class="container">
    <div style="text-align: right;">
        <span class="" style="color:#777">Tổng 14 item</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Nội dung</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 1; ?>
        <?php foreach ($result as $k): ?>
            <tr>
                <td><?php echo $stt++ ?></td>
                <td><img src="<?php echo '../images/' . $k['img'] ?>" alt="<?php echo $k['title'] ?>"></td>
                <td><?php echo $k['title'] ?></td>
                <td><?php echo $k['desc_'] ?></td>
                <td><?php echo substr($k['content'], 0, 200) . '...'; ?>
                    <span>
                        <!-- Button trigger modal -->
                        <a href="#" data-toggle="modal" data-target="#myModal" id="readmore">
                          đọc thêm
                        </a>
                    </span>
                </td>
                <td>xóa
                    <input type="hidden" id="id" value="<?php echo $k['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal Đọc thêm-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php mysqli_close($con); ?>
</body>
<script>
    $(document).ready(function () {
        $('#readmore').click(function (e) {
            e.preventDefault();
        })
    });
</script>
</html>