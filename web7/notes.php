<?php
include_once "common.php";
include_once "config.php";
require_once "crypt.php";
$user = getUser();
if ($user === -1) {
    die("");
}
$username = $_SESSION['token'] == '0' ? 'admin' : $user;
if (isset($_POST['contents'])) {
    $data = getCache();
    if ($data && $data->contents == $_POST['contents']) {
        $username = $data->username;
        $contents = $data->contents;

    } else {
        $contents = $_POST['contents'];
    }
    if (isset($_POST['cache'])) {
        setCache($username, $contents);
        echo "<script>alert('缓存成功');location.href='index.php'</script>";
    } else {
        setcookie('cache');
        $sql = "INSERT INTO notes (uid, contents, time) VALUES ((select id from users where username = '${username}'), '${contents}', localtime())";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('提交成功');location.href='index.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //TODO:删掉
        }
    }
}
$result = $conn->query("select contents, time from notes where uid=(select id from users where username='${username}') order by time desc ");
?>

<?php if ($result && $result->num_rows > 0): ?>
<div class="comment-list">
    <?php while ($row = $result->fetch_assoc()):?>
        <div class="comment-input-area comment-single">
            <div class="comment-cell">
                <div class="img"><?php echo "<img src='data:image/jpg;base64,${jpg}' style='width: 60px; height: 50px'/>"; ?></div>
                <div class="comment-text">
                    <div style="margin-bottom: 8px">
                        <span class="comment-name"><?php echo $username ?></span>
                        <span style="float: right; margin-top: 5px"><?=$row["time"]?></span>
                    </div>
                    <p class="comment-content"><?=$row["contents"]?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>