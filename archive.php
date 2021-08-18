<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hamburgerメニュー</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/hamburger.css">

</head>

  <body>
    <main class="l-main">

      <article class="l-main__left">

      <php? get_header(); ?>

        <div class="p-contents">

          <div class="p-mainvisual-archive">
            <div class="p-mainvisual-archive__text">
              <h2>MENU：</h2>
              <p>チーズバーガー</p>
            </div>
          </div>

          <div class="p-box-archivepage">
            <h4>小見出しが入ります</h4>
            <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
          </div>

          <div class="p-menu">
            <div class="p-menu__card">
              <img src="./img/burg_cheese.png" alt="チーズバーガーの写真">
              <div class="p-menu__card__text">
                <h3>チーズバーガー</h3>
                <h4>小見出しが入ります</h4>
                <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                <a href="#">詳しく見る</a>
              </div>
            </div>
            <div class="p-menu__card">
              <img src="./img/burg_cheese.png" alt="">
              <div class="p-menu__card__text">
                <h3>ダブルチーズバーガー</h3>
                <h4>小見出しが入ります</h4>
                <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                <a href="#">詳しく見る</a>
              </div>
            </div>
            <div class="p-menu__card">
              <img src="./img/burg_cheese.png" alt="">
              <div class="p-menu__card__text">
                <h3>スペシャルチーズバーガー</h3>
                <h4>小見出しが入ります</h4>
                <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                <a href="#">詳しく見る</a>
              </div>
            </div>
          </div>
        </div>

        <div class="p-pagenation">
          <ul>
              <li>page 1/10</li>
              <li><a href="/html/archive.html">1</a></li>
              <li><a href="/html/archive.html">2</a></li>
              <li><a href="/html/archive.html">3</a></li>
              <li><a href="/html/archive.html">4</a></li>
              <li><a href="/html/archive.html">5</a></li>
              <li><a href="/html/archive.html">6</a></li>
              <li><a href="/html/archive.html">7</a></li>
              <li><a href="/html/archive.html">8</a></li>
              <li><a href="/html/archive.html">9</a></li>
          </ul>
      </div>

      <div class="p-pagenation-sp">
        <a href="#">&#60;&#60; 前へ</a>
        <a href="#">次へ &#62;&#62;</a>
      </div>
      </article>

      <?php get_sidebar(); ?>

    </main>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script src="js/style.js"></script>

  </body>

  <?php get_footer(); ?>

</html>