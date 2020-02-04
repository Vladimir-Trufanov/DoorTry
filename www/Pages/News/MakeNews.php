<?php
// PHP7/HTML5, EDGE/CHROME                                 *** MakeNews.php ***

// ****************************************************************************
// * doortry.ru                          Показать в колонке выбранные новости *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 05.06.2019

function ViewSimpArr($aArray)
{
   $s='';
   foreach($aArray as $k=>$v)
   {
      $s=$s."$k => $v"."<br>";
   }
   echo $s;
}

function getValueSimpArr($aArray,$key)
{
   $Result=NULL;
   foreach($aArray as $k=>$v)
   {
      if ($key==$k) 
      {
         $Result=$v;
         break;
      }
   }
   return $Result;
}

function getUrlNews($key)
{
   $Result=NULL;
   global $aNews;
   foreach($aNews as $k=>$v)
   {
      $kt=prown\getTranslit($k);
      /*
      echo '$key='.$key.'<br>';
      echo '$k  ='.$k.'<br>';
      echo '$kt ='.$kt.'<br>';
      echo '$v  ='.$v.'<br>';
      */
      if ($key==$kt) 
      {
         $Result=$v;
         break;
      }
   }
   return $Result;
}
function getH2_News($key)
{
   global $aNews;
   $Result=NULL;
   foreach($aNews as $k=>$v)
   {
      //$kt=$k;
      $kt=prown\getTranslit($k);
      if ($key==$kt) 
      {
         $Result=$k;
         break;
      }
   }
   return $Result;
}

function isNews($News)
{
   if ($News==NotNews) $Result=False;
   else $Result=True;
   return $Result;
}

function getNews()
{
   global $s_NameNews; 
   $ret=prown\getComRequest('novosti');
   //echo '$ret='.$ret.'<br>';
   if ($ret==NULL) $Result=False;
   else
   {
      $Result=True;
      // Изменяем признак активированной ленты новостей до конца сессии
      $s_NameNews=prown\MakeSession('NameNews',$ret,tStr,false); 
   }
   return $Result;
}

function NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews)
{  
   $Result = true;
   // переключаемся на пользовательский обработчик
   if ($p_NewsView)
   {
      //$old_error_handler = set_error_handler("myErrorHandler");
      echo '<h1>'.getH2_News($s_NameNews).'</h1>';
      //echo '<p>';'.getH2_News($s_NameNews).'r</h1>";
      $urlNews=getUrlNews($s_NameNews);
      //echo $urlNews.'<br>';
      if ($p_NewsForm==frnSimple) 
      {
         SimpleTape($urlNews,$p_NewsAmt);
      }
      else
      {
         WithImgTape($urlNews,$p_NewsAmt);
      }
      //echo '</p>';
      
      //restore_error_handler();
      //echo "<b>restore_error_handler</b><br />\n";
   }
   return $Result;
   
}
// *********************************************************** MakeNews.php ***
