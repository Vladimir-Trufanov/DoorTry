<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.2, 24.01.2024                                  Автор:       Труфанов В.Е.
// Copyright © 2024 tve                              Дата создания:  21.01.2024

function ReplaceHtmlExpert($FileSpec,$Title,$BitofExpertCSS='<link rel="stylesheet" href="../BitofExpert/BitofExpert.css">')
{
   //prown\Alert($FileSpec);
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
   // Заменяем ссылки на подгружаемые страницы
   $FileContent=RedoLink($FileContent);
   /*
   // Заменяем расширения подгружаемых файлов 'md' на 'html'
   $FileContent=str_replace('.md"','.html"',$FileContent);
   // Заменяем каталог загрузки подгружаемых файлов html
   $FileContent=str_replace('href="bife','href="BitofExpert/bife',$FileContent);
   */
   return $FileContent;
}
// Заменяем ссылки на подгружаемые страницы с файлами .md на url-запросы
function RedoLink($FileContent)
{

   /*
   // Определяем регулярное выражение для выборки первой ссылки
   //$regArts='/href="bife[0-9a-zA-Z\/\-_]{1,}\.md"/u';
   //$regArts='/<ahref="bife[0-9a-zA-Z\/\-_]{1,}\.md"/u';
   $regArts='/<a\shref="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}<\/a>/u';
   $Linki=prown\Findes($regArts,$FileContent,$point);    
   prown\ConsoleLog('$Linki='.$Linki.'===');
   prown\ConsoleLog('$point='.$point.'===');
   */
   MakeLinks($FileContent);
   
   $urltext='';
   $Result=$FileContent;
   return $Result;
}

function MakeLinks($FileContent)
{
   // Определяем регулярное выражение для выборки cсылки на страницу .md
   $regArts='/<a\shref="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}<\/a>/u';
   // Выбираем все ссылки на страницы .md
   $point=0;
   $Text=$FileContent;
   //prown\Alert($Text);
   while ($point>-1) 
   {
      $Linki=prown\Findes($regArts,$Text,$point);
      if ($point>-1)
      {    
         prown\ConsoleLog('$Linki='.$Linki.'===');
         prown\ConsoleLog('$point='.$point.'===');
         // Выбираем следующий фрагмент
         $point=$point+strlen($Linki);
         $Text=substr($Text,$point);
         prown\ConsoleLog('$point='.$point.'===');
         prown\ConsoleLog('$Text='.$Text.'===');
         prown\Alert('Text');
      }
   }
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


function ReplaceHtmlExpert1($FileSpec,$Title,$BitofExpertCSS='<link rel="stylesheet" href="../BitofExpert/BitofExpert.css">')
{
   //prown\Alert($FileSpec);
   // Загружаем файл html
   $FileContent=file_get_contents($FileSpec);
   /*
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
   // Заменяем расширения подгружаемых файлов 'md' на 'html'
   $FileContent=str_replace('.md"','.html"',$FileContent);
   // Заменяем каталог загрузки подгружаемых файлов html
   $FileContent=str_replace('href="bife','href="BitofExpert/bife',$FileContent);
   */
   return $FileContent;
}


//$SiteRoot=preg_quote($SiteRoot);
// Готовим ссылку на файл CSS-стилей для файлов темы BitofExpert
$BitofExpertCSS='<link rel="stylesheet" href="'.'../../'.'BitofExpert/BitofExpert.css">';
// Обрабатываем файлы раздела Windows
// prown\ConsoleLog('$SiteRoot='.$SiteRoot);
$FileSpec=$SiteRoot."/BitofExpert/bifeGitHub/kak-udalit-repozitarij-v-github/kak-udalit-repozitarij-v-github.html";
$FileContent=ReplaceHtmlExpert1($FileSpec,'Как удалить репозитарий из GitHub',$BitofExpertCSS);

// Обрабатываем корневой файл темы BitofExpert, не изменяя его самого
// prown\ConsoleLog('$SiteRoot='.$SiteRoot);
$FileSpec=$SiteRoot."/BitofExpert/BitofExpert.html";
$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');


// Выводим главную страницу темы BitofExpert
echo $FileContent;

// ******************************************************** BitofExpert.php ***

