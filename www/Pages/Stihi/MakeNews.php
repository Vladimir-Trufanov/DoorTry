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
      
      //echo $k.'='.$k.'<br>';
      //echo $kt.'='.$kt.'<br>';
      //echo $v.'='.$v.'<br>';

      
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
   $Result=NULL;
   global $aNews;
   foreach($aNews as $k=>$v)
   {
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
   $ret=getComRequest();
   $regNews="/News_/";
   $s=Findes($regNews,$ret);
   if ($s=='News_') 
   {
      $Result=True;
      //echo $ret.'<br>';
      //echo $s.'<br>';
      $str=substr($ret,5,strlen($ret)-5);
      //echo $str.'<br>';
      // Изменяем признак активированной ленты новостей до конца сессии
      $s_NameNews=prown\MakeSession('NameNews',$str,tStr,false);   
   }
   else $Result=False;
      //global $s_Counter; 
      //echo $s_Counter.': '.$s_NameNews.'<br>';
   return $Result;
}

function NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews)
{  
   $Result = true;
   if ($p_NewsView)
   {
      echo '<h2>'.getH2_News($s_NameNews).'</h2>';
      echo '<p>';
      $urlNews="http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack";
      $urlNews=getUrlNews($s_NameNews);
      if ($p_NewsForm==frnSimple) 
      {
         SimpleTape($urlNews,$p_NewsAmt);
      }
      else
      {
         WithImgTape($urlNews,$p_NewsAmt);
      }
      echo '</p>';
   }
   return $Result;
   
}
// *********************************************************** MakeNews.php ***
