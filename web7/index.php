<?php
include_once "common.php";
include_once "config.php";
include_once "crypt.php";
$user = getUser();

$available_theme = ['light', 'dark'];

if (isset($_POST['theme']) && $user !== -1 && in_array($_POST['theme'], $available_theme)) {
    if ($user === 0) {
        $profile_path = "config/admin/profile";
    } else {
        $profile_path = "config/${_SESSION['token']}/profile";
    }
    file_put_contents($profile_path, "<?php define('THEME','${_POST['theme']}');?>");
}

$upload_path = 'assets';
if ($user === -1) {
    define('THEME', 'light');
    $jpg = false;
} else {
    if ($user === 0) {
        include "config/admin/profile";
        $result = $conn->query("select upload from users where username='admin'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //区区普通用户也想有专属上传路径，你也配？？
            $upload_path = "config/admin/${row['upload']}";
        } else {
            echo "出错了!";
        }
    } else {
        include "config/${_SESSION['token']}/profile";
        $result = $conn->query("select upload from users where username='${user}'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $upload_path = "config/${_SESSION['token']}/${row['upload']}";
        } else {
            echo "出错了!";
        }
    }
    $jpg = file_get_contents("php://filter/convert.base64-encode/resource=" . $upload_path . "/pro.jpg");
}
?>


<html>
<head>
    <meta charset="utf-8">
    <title>重生之狂龙战神</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <?php
    if (THEME === 'dark') {
        echo "
        <link rel='stylesheet' href='css/dark.css'>
        ";
    } else {
        echo "
        <link rel='stylesheet' href='css/light.css'>
        ";
    }
    ?>
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar <?php echo THEME === 'light' ? 'navbar-default' : 'navbar-inverse' ?>" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="margin-right: 15px">重生之狂龙战神</a>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="nav-item active">
                    <a class="nav-link" href="#">首页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">太乙神针</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">召集天神战队</a>
                </li>
                <?php if ($user !== -1): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">切换主题 <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="padding-bottom: 0; height: 35px; min-width: 100px">
                            <?php
                            if (THEME === 'light') {
                                echo '<li>
                                <form action="index.php" method="post">
                                    <input name="theme" value="dark" type="hidden"/>
                                    <input type="submit" style="border: none; background-color: transparent; width: 100%" value="dark">
                                </form>
                            </li>';
                            } else {
                                echo '<li>
                                <form action="index.php" method="post">
                                    <input name="theme" value="light" type="hidden"/>
                                    <input type="submit" style="border: none; background-color: transparent; width: 100%" value="light">
                                </form>
                            </li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if ($user === 0): ?>
                <form class="navbar-form navbar-left" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group" style="min-width: 100px; margin-right: 0">
                        <span class="control-fileupload">
                            <label for="file" style="color: #888">选择头像</label>
                            <input type="file" id="file" name="pic">
                        </span>
                    </div>
                    <button type="submit" class="btn btn-default" style="color: #888">上传</button>
                </form>
            <?php endif; ?>
            <ul class="nav navbar-nav">
                <?php
                if ($user !== -1) {
                    echo "<li class='nav-item'>
                                <a class=\"nav-link\" href=\"logout.php\">登出</a>
                            </li>
                        ";
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($user === -1) {
                    echo "<li class=\"nav-item\" >
                        <a class=\"nav-link\" href=\"login.html\">登录</a>
                      </li>";
                } else {
                    if ($user === 0) {
                        echo "<li class=\"nav-item\" >
                            <a class=\"nav-link\" href=\"#\">admin</a>
                          </li>";
                    } else {
                        echo "<li class=\"nav-item\" >
                            <a class=\"nav-link\" href=\"#\">" . $user . "</a> </li>";
                    }
                }
                ?>
                <li>
                    <div>
                        <?php if ($jpg) {
                            echo "<img src='data:image/jpg;base64,${jpg}' style='width: 60px; height: 50px'/>";
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 15px">
    <!--    --><?php //if ($user !== 0):?>
    <div style="width: 700px; margin: 15px auto">
        <div class="comment-input-area">
            <form action="notes.php" method="post">

                <!--                    <textarea name="contents" class="form-control"-->
                <!--                              rows="4"-->
                <!--                    >-->
                <!--                        --><?php //$data=getCache();
                //                        if ($data){
                //                            echo $data->contents;
                //                        } else {
                //                            echo "发表评论";
                //                        }?>
                <!--                    </textarea>-->
                <input name="contents" class="form-control"
                    <?php if ($user === -1): ?>
                        disabled
                    <?php endif; ?>
                    <?php
                    if ($user === -1) {
                        echo "placeholder='现在的云家，做赘婿你都不配！'";
                    }
                    $data = getCache();
                    if ($data) {
                        echo "value=" . $data->contents;
                    } else {
                        echo "placeholder='区区赘婿，也敢口出狂言？'";
                    }
                    ?>
                >
                <div style="float: right; margin-top: 15px">
                    <button type="submit" name="submit" class="btn btn-info" style="margin-right: 10px"
                        <?php if ($user === -1): ?>
                            disabled
                        <?php endif; ?>
                    >发布
                    </button>
                    <button type="submit" name="cache" class="btn btn-success"
                        <?php if ($user === -1): ?>
                            disabled
                        <?php endif; ?>
                    >暂存
                    </button>
                </div>
            </form>
        </div>
        <?php include_once "notes.php" ?>

    </div>

    <!--    --><?php //endif; ?>
</div>
<script>
    $('input[type=file]').change(function () {
        let t = $(this).val();
        let arr = t.split('\\');
        let fileName = arr[arr.length - 1];
        $(this).prev('label').text(fileName);
    })
</script>
</body>
</html>