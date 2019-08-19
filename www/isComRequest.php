<?php                                           
// PHP7/HTML5, EDGE/CHROME                             *** isComRequest.php ***

// ****************************************************************************
// * doortry.ru           Проверить передана ли данная команда через параметр *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2018
// Copyright © 2018 tve                              Посл.изменение: 08.08.2019

function isComRequest($subs)
{
   $Result=false;
   if (IsSet($_REQUEST['Com']))
   { 
      if ($_REQUEST['Com']==$subs) $Result=true;
      //echo '***'.$_REQUEST['Com'].'***';
   }
   return $Result;
}

function getComRequest()
{
   $Result=NULL;
   if (IsSet($_REQUEST['Com']))
   { 
      $Result=$_REQUEST['Com'];
   }
   return $Result;
}
// ******************************************************* isComRequest.php *** 
