<?php
mb_language("japanese");
mb_internal_encoding("UTF-8");

// フォームデータ
$form_data = $_POST;

//$to = "akb03260902@gmail.com";
$to = "rurudia1113@gmail.com";

if ($form_data['select_form_val'] == 'request') {
    $subject = "出演依頼";
    $message = "下記の出演依頼がありました。\r\n\r\n";
    $message .= "<依頼者>\r\n" . htmlspecialchars($form_data['name'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<メールアドレス>\r\n" . htmlspecialchars($form_data['email'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<主催 or 対バン>\r\n" . htmlspecialchars($form_data['type'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<日時>\r\n" . htmlspecialchars($form_data['date'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<会場>\r\n" . htmlspecialchars($form_data['place'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<チケットバック>\r\n" . htmlspecialchars($form_data['ticket_back'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<持ち時間>\r\n" . htmlspecialchars($form_data['time'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<マイク本数>\r\n" . htmlspecialchars($form_data['mike'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<他共演者>\r\n" . htmlspecialchars($form_data['performer'], ENT_QUOTES) . "\r\n";
} else {
    $subject = "お問い合わせ";
    $message = "下記のお問い合わせがありました。\r\n\r\n";
    $message .= "<お名前>\r\n" . htmlspecialchars($form_data['name'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<メールアドレス>\r\n" . htmlspecialchars($form_data['email'], ENT_QUOTES) . "\r\n\r\n";
    $message .= "<お問い合わせ内容>\r\n" . htmlspecialchars($form_data['inquiry'], ENT_QUOTES) . "\r\n";
}

$result = mb_send_mail($to, $subject, $message);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="shortcut icon" href="../img/rurudia.png">
    <link rel="apple-touch-icon" href="../img/rurudia.png">
    <link rel="icon" type="image/png" href="../img/rurudia.png">
    <meta property="og:title" content="RURUDiA | CONTACT">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.rurudia.jp/form.php">
    <meta property="og:image" content="https://www.rurudia.jp/img/rurudia.jpeg">
    <meta property="og:site_name" content="RURUDiA | CONTACT">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="RURUDiA | CONTACT">
    <meta name="twitter:image" content="https://www.rurudia.jp/img/rurudia.jpeg">
    <meta name="twitter:app:country" content="jp">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>RURUDiA | CONTACT COMPLETE</title>
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
                <li class="global_nav_list_item"><a href="video.php">VIDEO</a></li>
                <li class="global_nav_list_item"><a href="regulation.html">REGULATION</a></li>
                <li class="global_nav_list_item"><a href="original_music.html">ORIGINAL MUSIC</a></li>
                <li class="global_nav_list_item"><a class="active" href="contact.html">CONTACT</a></li>
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
        <div class="contact_complete_block">
            <p class="message">
                <?php
                if ($result) {
                    echo "送信完了しました。<br>内容を確認させていただき、後ほど担当者よりご回答をさせていただきます。<br>恐れ入りますが、今しばらくお待ちいただけますよう、よろしくお願い申し上げます。";
                } else {
                    echo "送信失敗しました。";
                }
                ?>
            </p>
        </div>
    </main>
    <footer class="footer">
        <p class="copyright">© 2021 ADAMASGATI ENTERTAINMENT</p>
    </footer>
</body>
</html>