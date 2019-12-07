<?php
// PHP7/HTML5, EDGE/CHROME                           *** FunctionsBlock.php ***

// ****************************************************************************
// * TPhpPrown-test                        Блок вспомогательных функций сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 07.12.2019

// ****************************************************************************
// *             Проверить, выбрана ли указанная функция библиотеки           *
// ****************************************************************************
function IsChecked($chkname,$value)
{
   if(!empty($_POST[$chkname]))
   {
      foreach($_POST[$chkname] as $chkval)
      {
         if($chkval == $value)
         {
            return true;
         }
      }
   }
   return false;
}
// ****************************************************************************
// *    Проверить присутствует ли в запросе параметр с указанным значением    *
// ****************************************************************************
function isComRequest($subs,$Com='Com')
{
   //echo '$_REQUEST['.$Com.']='.$_REQUEST[$Com].'<br>';
   $Result=false;
   if (IsSet($_REQUEST[$Com]))
   { 
      if ($_REQUEST[$Com]==$subs) $Result=true;
   }
   return $Result;
}
// ****************************************************************************
// *     Проверить выбор флажков, указывающих на функции TPhpPrown, которые   *
// *              следует протестировать и выполнить тестирование             *
// ****************************************************************************
// http://form.guide/php-form/php-form-checkbox.html
// http://dnzl.ru/view_post.php?id=182
function MakeTest($SiteAbove,$aPhpPrown)
{
   if(isset($_POST['formSubmit'])) 
   {
	  if(empty($_POST['formDoor']))
      {
         echo("<p>Функции для тестирования Вами не выбраны!</p>\n");
      }
      else
      {
         $aDoor=$_POST['formDoor'];
         $N=count($aDoor);
         // Запускаем тестирование и трассировку выбранных функций
         require_once(dirname(__FILE__).'/simpletest/autorun.php');
         $ModeError=-1;
         foreach($aPhpPrown as $k=>$v)
         {
            //echo '<input type="checkbox" checked name="formDoor[]" value="'.$k.'"/>'.$k.' - '.$v.'<br>';
            if(IsChecked('formDoor',$k))
            {
               //echo $k.' тестируется.<br>';
               require_once $SiteAbove."/TPhpPrownTests/".$k."_test.php";
            }
         }
      } 
   }
}
// ****************************************************************************
// *        Вывести сообщение по завершении очередного теста/подтеста         *
// ****************************************************************************
function MakeTestMessage($Name,$Name2='')
{
   echo 
      "<span style=\"color:#993300; font-weight:bold; ".
      "font-family:'Anonymous Pro', monospace; font-size:0.9em\">".' '.
      str_pad($Name,33,'-').' '.
      "</span>";
   echo 
      "<span style=\"color:#993300; font-weight:bold; ".
      "font-family:'Anonymous Pro', monospace; font-size:0.9em\">".
      $Name2.
      "</span>"."<br>";
}
// ****************************************************************************
// *         Вывести заголовок очередной тестируемой функции TPhpPrown        *
// ****************************************************************************
function MakeTitle($Name,$br="<br>")
{
   echo 
      "<span style=\"color:blue; font-weight:bold; font-size:1.1em\">".
      $br.$Name.
      "</span>"."<br>";
}
// ***************************************************** FunctionsBlock.php ***
