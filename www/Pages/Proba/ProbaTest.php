<?php
// PHP7/HTML5, EDGE/CHROME                                *** ProbaTest.php ***

// ****************************************************************************
// * DoorTry                                   Заготовка для пробной страницы *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 07.12.2019

// Инициализируем корневой каталог сайта, надсайтовый каталог и каталог хостинга
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once $SiteRoot."/iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

// https://qunitjs.com/

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mangled date examples</title>
  <script>
  function prettyDate(now, time){
    var date = new Date(time || ""),
      diff = (((new Date(now)).getTime() - date.getTime()) / 1000),
      day_diff = Math.floor(diff / 86400);
 
    if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 )
      return;
 
    return day_diff == 0 && (
        diff < 60 && "just now" ||
        diff < 120 && "1 minute ago" ||
        diff < 3600 && Math.floor( diff / 60 ) +
          " minutes ago" ||
        diff < 7200 && "1 hour ago" ||
        diff < 86400 && Math.floor( diff / 3600 ) +
          " hours ago") ||
      day_diff == 1 && "Yesterday" ||
      day_diff < 7 && day_diff + " days ago" ||
      day_diff < 31 && Math.ceil( day_diff / 7 ) +
        " weeks ago";
  }
  window.onload = function() {
    var links = document.getElementsByTagName("a");
    for ( var i = 0; i < links.length; i++ ) {
      if ( links[i].title ) {
        var date = prettyDate("2008-01-28T22:25:00Z",
          links[i].title);
        if ( date ) {
          links[i].innerHTML = date;
        }
      }
    }
  };
  </script>
</head>
<body>
 
<ul>
  <li class="entry">
    <p>blah blah blah...</p>
    <small class="extra">
      Posted <span class="time">
        <a href="#2008/01/blah/57/" title="2008-01-28T20:24:17Z">
          <span>January 28th, 2008</span>
        </a>
      </span>
      by <span class="author"><a href="#john/">John Resig</a></span>
    </small>
  </li>
  <!-- more list items -->
</ul>
 
</body>
</html>
 
<ul>
  <li class="entry">
    <p>blah blah blah...</p>
    <small class="extra">
      Posted <span class="time">
        <a href="#2008/01/blah/57/" title="2008-01-28T20:24:17Z">
          <span>January 28th, 2008</span>
        </a>
      </span>
      by <span class="author"><a href="#john/">John Resig</a></span>
    </small>
  </li>
  <!-- more list items -->
</ul>
 
</body>
</html>


<?php
// <!-- --> ************************************************* ProbaTest.php ***
