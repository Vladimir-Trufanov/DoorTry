<?php                                           
// PHP7/HTML5, EDGE/CHROME                               *** ComRequest.php ***

// ****************************************************************************
// * doortry.ru           Проверить передана ли данная команда через параметр *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2018
// Copyright © 2018 tve                              Посл.изменение: 26.08.2019

function isComRequest($subs,$Com='Com')
{
   $Result=false;
   if (IsSet($_REQUEST[$Com]))
   { 
      if ($_REQUEST[$Com]==$subs) $Result=true;
      //echo '$_REQUEST['.$Com.']='.$_REQUEST[$Com].'<br>';
   }
   return $Result;
}

function getComRequest($Com='Com')
{
   $Result=NULL;
   if (IsSet($_REQUEST[$Com]))
   { 
      $Result=$_REQUEST[$Com];
   }
   return $Result;
}
// ********************************************************* ComRequest.php *** 
