<?php
// PHP7                                                   *** _TestPart.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown             Выполнить тесты функции и вывести их итоги *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 03.02.2020

function TestPart($SiteHost,$Parm)
{
   // Размечаем низ страницы в случае, когда следует запустить тест
   // (то есть, когда кукис $_COOKIE['WasTest'] ещё не установлен):
   // так как теги </body> и </html> ставятся внутри теста, то закрываем
   // только <div class="TPhpPrown"> тегом </div> 
   if (!(IsSet($_COOKIE['WasTest'])))
   {
      ?>
         <p><br><strong>Сообщения выполненного теста функции</strong></p>
         <script>
            setcookie("WasTest","<?php echo WasTest;?>");
         </script>
      <?php
      // Запускаем тестирование и трассировку выбранных функций
      require_once($SiteHost.'/TSimpleTest/autorun.php');
      require_once($SiteHost.'/TPhpPrown/TPhpPrown/'.FuncName.'.php');
      require_once($SiteHost.'/TPhpPrown/TPhpPrownTests/'.FuncName.'_test.php');
   }
   // Размечаем низ страницы в случае, когда устанавливаем кнопку для теста
   else
   {
      // Готовим ссылку для кнопки на doortry.ru
      if (isHost('doortry.ru','kwinflatht.nichost.ru'))
      {
         $ListName=ScriptName;
      }
      // Готовим ссылку для кнопки на localhost
      else
      {
         $ListName="_dispTPhpPrown.php?list=".ScriptName;
      }
      // Выводим кнопку перезагрузки текущей страницы
      ?>
      <script>
         function isOnButtonClick() 
         {
            var cScript="<?php echo $ListName; ?>";
            DeleteCookie('WasTest');
            location.replace(cScript);
         }
      </script>
      <button id="button" onclick="isOnButtonClick()">Протестировать функцию!</button>
      </body></html>
      <?php
   }
}
// <!-- --> ************************************************* _TestPart.php ***
