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
      if ($key==$k) 
      {
         $Result=$v;
         break;
      }
   }
   return $Result;
}

function isNews()
{
            
   $ret=getComRequest();
   //echo '***'.$ret.'***';

   $regNews="/News_/";
   $s=Findes($regNews,$ret);
   //echo '==='.$s.'==='.'<br>';
   if ($s=='News_') $Result=True;
   else $Result=False;
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
      echo $ret.'<br>';
      echo $s.'<br>';
      $str=substr($ret,5,strlen($ret)-5);
      echo $str.'<br>';
      $s_NameNews=prown\MakeSession('NameNews',$str,tStr,false);   // активированная лента новостей
   }
   else $Result=False;
      global $s_Counter; 
      echo $s_Counter.': '.$s_NameNews.'<br>';
   return $Result;
}

function NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt)
{
   $Result = true;
   //
   //
   if ($p_NewsView)
   {
      ?>
      <h2>Столица на онего</h2>
      <p>
      <?php
      
      //echo 'скрипт ещё  8 неь неъ'.'<br>';
      //echo prown\getTranslit('скрипт ещё  8 неь неъ').'<br>';
      
      //
      // Фиксируем начало загрузки новостей
      //echo '<script>';
      //echo 'BeginNews();';
      //echo '</script>';
      // Выводим новости
      //echo '$p_FormNews='.$p_FormNews.'<br>';
      //echo '$p_AmtNews ='.$p_AmtNews.'<br>';
      //$urlNews="http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack";
      $urlNews="http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack";
      
      
      

      
                         

        
      if ($p_NewsForm==frnSimple) 
      {
         SimpleTape($urlNews,$p_NewsAmt);
      }
      else
      {
         WithImgTape($urlNews,$p_NewsAmt);
      }
      ?>
      </p>
      <?php
   }
   return $Result;
}
// <!-- --> ************************************************** MakeNews.php ***
