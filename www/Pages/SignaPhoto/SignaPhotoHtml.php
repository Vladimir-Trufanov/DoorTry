<?php
// PHP7/HTML5, EDGE/CHROME                           *** SignaPhotoHtml.php ***

// ****************************************************************************
// * SignaPhoto                         Вспомогательные функции сайтостраницы *
// *                                              для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 14.06.2021

// ****************************************************************************
// *                            Начать HTML-страницу сайта                    *
// ****************************************************************************
function IniPage(&$c_SignaPhoto,&$UrlHome)
{
   $Result=true;
   // Инициируем или изменяем счетчик числа запросов страницы
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',0,tInt,true);  
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',$c_SignaPhoto+1,tInt);  
   // Определяем Url домашней страницы
   $UrlHome='https://doortry.ru';
   if ($_SERVER["SERVER_NAME"]=='kwinflatht.nichost.ru') $UrlHome='http://kwinflatht.nichost.ru';

   // Загружаем заголовочную часть страницы
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   echo '<title>Подписать фотографию</title>';
   echo '<meta name="description" content="Проба Img">';
   echo '<meta name="keywords"    content="Проба Img">';
   echo '<script src="SignaPhoto.js"></script>';
   return $Result;
}
// ****************************************************************************
// *                         Завершить HTML-страницу сайта                    *
// ****************************************************************************
function FinaPage()
{
   $Result=true;
   return $Result;
}
// ****************************************************************************
// *     Сформировать запросы для вызова страниц с портретной ориентацией     *
// *   и ландшафтной. Так как страница "Подписать фотографию" использует две  *
// * разметки: для страницы на компьютере и ландшафтной странице на смартфоне -
// *   простая разметка на дивах; а для портретной страницы на смартфоне с    *
// *                              помощью jquery mobile                       *
// ****************************************************************************
function MakeTextPages()
{
   ?> <script>
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе http или https
      $https='<?php echo $_SERVER["HTTPS"];?>';
      if ($https=="off") $https="http"
      else $https="https"; 
      //console.log($https);
      // Готовим URL для мобильно-портретной разметки, то есть разметки
      // для jQuery-мobile c двумя страницами 
      $SignaPortraitUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"?list=signaphotoportrait";
      //console.log($SignaPortraitUrl);
      // Готовим URL для настольно-ландшафтной разметки (одностраничной)
      $SignaUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"?list=signaphoto";
      //console.log($SignaUrl);
   </script> <?php
}
// Вывести изображение последнего загруженного фото
function ViewPhoto()
{
   // Debug1: Выводим просто заполнитель
   /*
   echo 
      'Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo'.
      'Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo'.
      'Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo'.
      'Photo Photo Photo';
   */
   // Debug2: Выводим просто изображение
   echo '<img src="images/photo.jpg" alt="" id="pic">';
   //echo '<img src="images/stamp.png" alt="" id="picStamp">';
   /* 
   $im = imagecreatefrompng('dave.png');
   if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
   {
      echo 'Изображение преобразовано к градациям серого.';
      imagepng($im, 'dave1.png');
   }
   else
   {
      echo 'Преобразование не удалось.';
   }
   imagedestroy($im);
   */   
}
// Вывести изображение подписи последних размеров
function ViewStamp()
{
   /*
   echo 'Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp '.
      'Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp'.
      'Stamp Stamp Stamp Stamp Stamp Stamp';
   */
   echo '<img src="images/stamp.png" alt="" id="picStamp">';
}
// Вывести изображение c подписью
function ViewProba()
{
   echo '<img src="images/proba.png" alt="" id="picProba">';
}
// Вывести область управления
function ViewLead()
{
   echo 'Lead Управление<br>';
   echo '<div id="SiteDevice">Устройство неизвестное</div>';
}

// Выполнить разметку мобильных подстраниц "Подписать фотографию"
function markupMobileSite($c_SignaPhoto,$UrlHome,$SiteRoot)
{
   // Начинаем 1 страницу
   echo '<div data-role = "page" id = "page1">';
   // Выводим заголовок 1 страницы с двумя кнопками навигации
   echo '
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
            <div id="bTasks" class="dibtn">
               <a href="'.$UrlHome.'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>
            </div>
            <div id="c1Title"> <h1>'.'Подготовка фото для подписания'.'</h1></div>
            <div id="bHandoright" class="dibtn">
               <a href="#page2"><i class="fa fa-hand-o-right fa-lg" aria-hidden="true"> </i></a>
            </div>
         </div>
      </div>
   ';
   // Выводим контент: фотографию и штамп   
   echo '<div role="main" class="ui-content" id="cCenter">';
   echo '<div id="Photo">';
      ViewPhoto();
   echo '</div>';
   echo '<div id="Stamp">';
      ViewStamp();
   echo '</div>';
   echo '</div>  ';
   // Выводим подвал с кнопками обработкт фотографий
   // https://habr.com/ru/post/245689/
   echo '<div data-role = "footer">';
   LoadImg();
   LoadStamp();
   Register();
   Indoor();

   // Заготавливаем скрытый фрэйм для обработки загружаемого изображения 
   echo '
      <iframe id="rFrame" name="rFrame" style="display: none"> </iframe>   
   ';
   
   echo '</div>';
   // Завершаем 1 страницу 
   echo '</div>'; 
   
   // Начинаем 2 страницу
   echo '
   <div data-role = "page" id = "page2">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a href="#page1"><i class="fa fa-hand-o-left fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   echo  '<div id="c2Title"> <h1>Подписанная фотография</h1></div>';
   echo '
         <div id="bHandoright" class="dibtn">
         <a href="'.$UrlHome.'"><i class="fa fa-sign-out fa-lg" aria-hidden="true"> </i></a>
         </div>
         </div>
      </div>
      <div role="main" class="ui-content" id="exPhp">
   ';
   // Размечаем область изображения с подписью
   echo '<div  id="Proba">';
   ViewProba();
   echo '</div>';
   echo '
      </div>
      <div data-role = "footer">';
   echo $c_SignaPhoto; echo ': PORTRAIT<br>';
   echo '
      </div>
   </div>
   ';
}


function LoadImg()
{ 
   $RequestFile='photo';
   // Рисуем нашу кнопку, определяем ей реакцию на нажатие кнопки мыши
   echo '
      <div id="btnLoadImg" class="navButtons" onclick="FindFile();" title="Загрузка файла">
         <img src="openfile.png"   width=100% height=100%/></img>
      </div>
   ';
   // Начинаем форму запроса изображения по типу: photo, stamp, proba
   echo '
      <form action="SignaPhotoUpload.php?img='.$RequestFile.'" '.
      'target="rFrame" method="POST" enctype="multipart/form-data">';  
   // Формируем два inputа для обеспечения ввода в диве с нулевыми размерами,
   // для того чтобы их скрыть
   echo'
   <div class="hiddenInput">
      <input type="file"    id="my_hidden_file" '.
         'accept="image/jpeg,image/png,image/gif" name="loadfile" onchange="LoadFile();">'.
      '<input type="submit" id="my_hidden_load" '.
         'style="display:none" value="Загрузить">'.
   '</div>';
   // Завершаем форму запроса
   echo '</form>';
}

function LoadStamp()
{ 
   $RequestFile='stamp';
   // Рисуем нашу кнопку, определяем ей реакцию на нажатие кнопки мыши
   echo '
      <div id="btnLoadStamp" class="navButtons" onclick="FindFile();" title="Загрузка файла">
         <img src="openfile.png"   width=100% height=100%/></img>
      </div>
   ';
   // Начинаем форму запроса изображения по типу: photo, stamp, proba
   echo '
      <form action="SignaPhotoUpload.php?img='.$RequestFile.'" '.
      'target="rFrame" method="POST" enctype="multipart/form-data">';  
   // Формируем два inputа для обеспечения ввода в диве с нулевыми размерами,
   // для того чтобы их скрыть
   echo'
   <div class="hiddenInput">
      <input type="file"    id="my_hidden_file" '.
         'accept="image/jpeg,image/png,image/gif" name="loadfile" onchange="LoadFile();">'.
      '<input type="submit" id="my_hidden_load" '.
         'style="display:none" value="Загрузить">'.
   '</div>';
   // Завершаем форму запроса
   echo '</form>';
}

function Register()
{ 
   echo '
      <div id="btnRegister" class="navButtons" title="Загрузка файла">
         <a  href="Register.html">
         <img src="openfile.png"   width=100% height=100%/></img>
         </a>
     </div>
    ';
}

function Indoor()
{ 
   echo '
      <div id="btnIndoor" class="navButtons" title="Загрузка файла">
         <a  href="Register.html">
         <img src="openfile.png"   width=100% height=100%/></img>
         </a>
     </div>
    ';
}

// *** <!-- --> **************************************** SignaPhotoHtml.php ***
