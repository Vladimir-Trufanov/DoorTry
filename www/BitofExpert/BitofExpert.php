<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.2, 25.01.2024                                  Автор:       Труфанов В.Е.
// Copyright © 2024 tve                              Дата создания:  21.01.2024

// Выбираем все крошки опыта
function MakeLinks($FileContent)
{
   // Определяем 'нежадное' регулярное выражение для выборки cсылки на страницу .md
   // (далее показаны три работающие регулярки и четвертая с карманами - для использования)
   //$regArts='/<a\shref="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}<\/a>/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}\.md/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   //$regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   $regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/([a-z\-]+)\.md">([0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана)
   //$FileContent=preg_replace($regArts,'href="?list=kroshki-opyta&par=$1&art=$2&tit=$4"',$FileContent);
   //$FileContent=preg_replace($regArts,'href="?list=kroshki-opyta&par=$1&art=$2"',$FileContent);
   $FileContent=preg_replace($regArts,'href="?list=kroshki-opyta&par=$1&art=$2&tit=$4">$4</a>',$FileContent);
   return $FileContent;
}

function ReplaceHtmlExpert($FileSpec,$Title,$BitofExpertCSS='<link rel="stylesheet" href="../BitofExpert/BitofExpert.css">')
{
   // Загружаем файл html
   $FileContent=file_get_contents($FileSpec);
   // Убираем все строки стиля и вставляем ссылку на файл CSS-стилей
   $begreg='<style';
   $endreg='\/style>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$BitofExpertCSS);
   // Вставляем начало общего окна HTML "kroshki-opyta"
   $winKroshkiOpyta='/head>'.'<body>'.'<div id="kroshki-opyta">';
   $begreg='\/head>';
   $endreg='<body>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   // Вставляем завершение общего окна HTML "kroshki-opyta"
   $winKroshkiOpyta='</div>'.'</body>'.'</html>';
   $begreg='<\/body>';
   $endreg='<\/html>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   // Меняем заголовок страницы
   $winKroshkiOpyta='<title>'.$Title.'</title>';
   $begreg='<title>';
   $endreg='<\/title>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   $FileContent=MakeLinks($FileContent);
   return $FileContent;
}


/*
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   //echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
*/

// Определяем путь к файлу загрузки
$FileName='BitofExpert.html';
$FileDir=$SiteRoot.'/BitofExpert/';
$par=prown\getComRequest('par');
if ($par>'')
{
   $FileDir=$FileDir.'bife'.$par.'/';
}
$art=prown\getComRequest('art');
if ($art>'')
{
   //echo '***'.$art.'***<br>';
   $FileDir=$FileDir.$art.'/';
   $FileName=$art.'.html';
}
$FileSpec=$FileDir.$FileName;
//echo $FileSpec.'<br>';

if (($par>'')||($art>''))
{
   echo ('Выделить изображения'.'<br>');
}




// Обрабатываем корневой файл темы BitofExpert, не изменяя его самого
//$FileSpec=$SiteRoot."/BitofExpert/BitofExpert.html";
$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
// Выводим главную страницу темы BitofExpert
// prown\ConsoleLog($urltxt);
//echo $urltxt.'<br>';
echo $FileContent;

// ******************************************************** BitofExpert.php ***

