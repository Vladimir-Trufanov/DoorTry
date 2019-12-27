<?php namespace prown;

// PHP7/HTML5, EDGE/CHROME                            *** MakeUserError.php ***
// ****************************************************************************
// * TPhpPrown        Cгенерировать ошибку/исключение или просто сформировать *
// *                 сообщение об ошибке в "жёсткой" системе обработки ошибок *
// *                                                                          *
// * v1.2, 27.12.2019                              Автор:       Труфанов В.Е. *
// * Copyright © 2019 tve                          Дата создания:  17.02.2019 *
// ****************************************************************************

require_once "iniConstMem.php";

// Синтаксис
//
//   MakeUserError($Mess,$Prefix='TPhpPrown',$Mode=0,$errtype=E_USER_ERROR)

// Параметры
//
//   $Mess    - текст сообщения об ошибке/исключении;
//   $Prefix  - префикс сообщения, указывающий на программную систему, в модуле
//       которой возникла ошибка/исключение;
//   $Mode   - режим вывода сообщений: rvsCurrentPos, rvsTriggerError, 
//       rvsMakeDiv,rvsDialogWindow;
//   $errtype - тип ошибки/исключения: E_USER_ERROR, E_USER_WARNING, 
//       E_USER_NOTICE, E_USER_DEPRECATED;

// Возвращаемое значение 
//
//   $Result=true, если сообщение сформировано без ошибок 

// Зарегистрированные ошибки/исключения
//   
// 1. Неверно указан тип ошибки

/**
 * "Жёсткой" системой обработки ошибок/исключений называется механизм вывода
 * сообщений с помощью функции MakeUserError и реализующий 4 режима работы: 
 * 
 * в режиме $Mode==rvsCurrentPos просто выводится сообщение в 
 * текущей позиции сайта. Данный режим используется при тестировании модулей;
 * 
 * в режиме по умолчанию $Mode==rvsTriggerError вызывается 
 * исключение с пользовательской ошибкой через trigger_error($Message,$errtype), 
 * где $Message - текст сообщения, $errtype может быть одним из значений 
 * E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE, E_USER_DEPRECATED. 
 * По умолчанию E_USER_ERROR;
 * 
 * в режиме $Mode==rvsMakeDiv предполагается, что ошибка произошла
 * в php-коде до разворачивания html-страницы и, в этом случае, формируется 
 * дополнительный div сообщения с id="Ers";
 * 
 * в режиме $Mode==rvsDialogWindow разворачивается сообщение в 
 * диалоговом окне с помощью JQueryUI. В этом случае на вызывающем сайте должны 
 * быть подключены модули jquery,jquery-ui,jquery-ui.css, например от Microsoft:
 * 
 * <link rel="stylesheet" type="text/css"
 *    href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/ui-lightness/jquery-ui.css">
 *    <script
 *       src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js">
 *    </script>
 *    <script
 *       src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.2/jquery-ui.min.js">
 *    </script>
 *    
 * "Жёсткая" система обработки ошибок/исключений выделяет два вида ошибок 
 * (контроллируемые и неконтроллируемые) и представляется следующим образом:
 *    а) ошибка является контроллируемой в случае, когда известно в каком месте 
 * сайта она может возникнуть и, таким образом, сообщение об ошибке можно 
 * вывести на экран по разметке сайта;
 *    б) в остальных случаях ошибка является неконтроллируемой и вывод сообщения
 * об ошибке выполняется на отдельной странице;
 *    в) по умолчанию функция генерирует неконтроллируемую ошибку/исключение:
 * trigger_error($Message,E_USER_ERROR), предполагая на верхнем уровне обработку
 * ошибки через сайт doortry.ru, где неконтроллируемая ошибка возникает не 
 * чистом экране с трассировкой всплывания исключения;
 *    
**/

// ****************************************************************************
// *       Развернуть сообщение в диалоговом окне  с помощью JQueryUI         *
// ****************************************************************************
function MakeMode2($Mess,$Prefix)
{
   $title="Сообщение  [".$Prefix."]";
   echo "<div id=\"Ers\" title=\"".$title."\">";
   echo $Mess;
   echo "</div>";
?>
<script>
   $(document).ready(function() {
   $('#Ers').dialog
   ({
      width: 600,
      position: 'left top',
      show: {effect:'slideDown'},
      hide: {effect:'explode', delay:250, duration:1000, easing:'easeInQuad'}
   });
   }); // end ready
</script>
<?php
}
// ****************************************************************************
// *     Cгенерировать ошибку/исключение или просто сформировать сообщение    *
// *              об ошибке в "жёсткой" системе обработки ошибок              *
// ****************************************************************************
function MakeUserError($Mess,$Prefix='TPhpPrown',$Mode=0,$errtype=E_USER_ERROR)
{
   $Result=true;
   $Message='['.$Prefix.'] '.$Mess;
   if ($Mode==rvsCurrentPos)
   {
      echo '<pre>'.$Message.'<br>'.'</pre>';
   } 
   else if ($Mode==rvsMakeDiv)
   {
      echo "<div id=\"Ers\" style=\"z-index:999; background: yellow; \">";
      echo 
      "<span style=\"
      
         color:red; 
         font-weight:bold; 
         font-size:1.0em;

      \">".
      $Message.
      "</span>";
      echo "</div>";
   } 
   elseif ($Mode==rvsDialogWindow)
   {
      MakeMode2($Mess,$Prefix);
   } 
   else
   {
      // Выдаем исключение с сообщением об ошибке
      $Result=trigger_error($Message,$errtype);
      // Выдаем исключение, если неверно указан тип ошибки
      if ($Result=false)
      {
         trigger_error($Prefix.': '.WrongTypeError,E_USER_ERROR);
      }   
   }
   return $Result; 
}
// ****************************************************** MakeUserError.php ***
