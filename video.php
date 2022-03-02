<?php
// 1ページに表示する動画の数
const PAGE_MAX_VIDEO_NUM = 6;

// 最新の動画を降順で記述
$videos = [
    'https://www.youtube.com/embed/tUW_c4gS1a4',
    'https://www.youtube.com/embed/vfak6juztps',
    'https://www.youtube.com/embed/ge8ZmwSqwJ8',
    'https://www.youtube.com/embed/YwtsE7CXuDs',
    'https://www.youtube.com/embed/uRNsDtKju3k',
];

// 最大ページ数
$page_max = ceil(count($videos) / PAGE_MAX_VIDEO_NUM);

// パラメータ
$page = $_GET['page'];

if (!is_numeric($page) || $page > $page_max) {
    $page = 1;
}

// 表示させる動画リストを生成
if (is_null($page) || $page === '1') {
    $video_list = array_slice($videos, 0, PAGE_MAX_VIDEO_NUM);
} else {
    $offset = (($page - 1) * PAGE_MAX_VIDEO_NUM);
    $video_list = array_slice($videos, $offset, PAGE_MAX_VIDEO_NUM);
}

if($page == 1 || $page == $page_max) {
    $range = 4;
} elseif ($page == 2 || $page == $page_max - 1) {
    $range = 3;
} else {
    $range = 2;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="keywords" content="ビデオ,VIDEO">
    <meta name="description" content="RURUDiA ビデオ">
    <link rel="shortcut icon" href="../img/rurudia.jpg">
    <link rel="apple-touch-icon" href="../img/rurudia.jpg">
    <link rel="icon" type="image/png" href="../img/rurudia.jpg">
    <meta property="og:title" content="RURUDiA | VIDEO">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.rurudia.jp/video.html">
    <meta property="og:image" content="https://www.rurudia.jp/img/rurudia.jpg">
    <meta property="og:site_name" content="RURUDiA | VIDEO">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="RURUDiA | VIDEO">
    <meta name="twitter:image" content="https://www.rurudia.jp/img/rurudia.jpg">
    <meta name="twitter:app:country" content="jp">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>RURUDiA | VIDEO</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F8T7QWMD17"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4ZY9SP2RR0');
    </script>
</head>
<body>
<header class="header">
    <div class="logo_block">
        <a href="/"><img class="logo" src="/img/rurudia.png" alt="ロゴ"></a>
    </div>
    <nav class="global_nav">
        <ul class="global_nav_list">
            <li class="global_nav_list_item"><a href="member.html">MEMBER</a></li>
            <li class="global_nav_list_item"><a href="schedule.html">SCHEDULE</a></li>
            <li class="global_nav_list_item"><a class="active" href="video.php">VIDEO</a></li>
            <li class="global_nav_list_item"><a href="regulation.html">REGULATION</a></li>
            <li class="global_nav_list_item"><a href="original_music.html">ORIGINAL MUSIC</a></li>
            <li class="global_nav_list_item"><a href="contact.html">CONTACT</a></li>
        </ul>
    </nav>
    <nav class="hamburger_menu">
        <input type="checkbox" id="menu_btn_check">
        <label for="menu_btn_check" class="menu_btn"><span></span></label>
        <div class="menu_content">
            <ul>
                <li>
                    <a href="member.html">MEMBER</a>
                </li>
                <li>
                    <a href="schedule.html">SCHEDULE</a>
                </li>
                <li>
                    <a href="video.php">VIDEO</a>
                </li>
                <li>
                    <a href="regulation.html">REGULATION</a>
                </li>
                <li>
                    <a href="original_music.html">ORIGINAL MUSIC</a>
                </li>
                <li>
                    <a href="contact.html">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="main">
    <div class="video_block">
        <h1>VIDEO</h1>
        <div class="videos">
            <?php
            foreach ($video_list as $video) {
                echo "<iframe src=$video frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            }
            ?>
        </div>
        <nav>
            <ul class="pagination">
                <?php if ($page >= 2): ?>
                    <li class="page"><a href="?page=<?php echo ($page - 1) ?>">前へ</a></li>
                <?php else: ?>
                    <li class="page"><span>戻る</span></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $page_max; $i++) : ?>
                    <?php if($i >= $page - $range && $i <= $page + $range) : ?>
                        <?php if($i == $page) : ?>
                            <li class="page active"><span><?php echo $i; ?></span></li>
                        <?php else: ?>
                            <li class="page"><a href="?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if($page < $page_max): ?>
                    <li class="page"><a href="?page=<?php echo ($page + 1) ?>">次へ</a></li>
                <?php else : ?>
                    <li class="page"><span>次へ</span></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</main>
<footer class="footer">
    <p class="copyright">© 2021 ADAMASGATI ENTERTAINMENT</p>
</footer>
</body>
</html>