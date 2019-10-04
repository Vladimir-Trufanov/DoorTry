<?php
// PHP7/HTML5, EDGE/CHROME                                *** MakeStihi.php ***

// ****************************************************************************
// * doortry.ru                          Показать в колонке выбранные новости *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 04.10.2019

function MakeStihi($SiteRoot,$SiteDevice)
{
   // Определяем каталог страницы со стихотворением (где есть index.php)
   $StihoPage=getComRequest('stihi');  // sorevnovanie-s-hakerami
   $page='/stihi/'.$StihoPage;
   // Запускаем сценарий стихотворения, отправляя заголовок страницы
   /*
   echo('$StihoPage='.$StihoPage.'<br>');
   echo('$page='.$page.'<br>');
   echo("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */
   Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   // Запускаем сценарий стихотворения через javascript
   /*
   echo '<script>';
   echo 'location.replace("'.$page.'")';
   echo '</script>';
   */
}
// ********************************************************** MakeStihi.php ***
