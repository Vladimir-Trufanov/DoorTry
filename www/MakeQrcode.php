<?php
// PHP7/HTML5, EDGE/CHROME                               *** MakeQrcode.php ***

// ****************************************************************************
// * doortry.ru                                           Сформировать QrCode *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

function MakeQrcode()
{
   $Result = true;
   /*
   ?>
   <!-- 1 штрих-код 
   <div style="text-align:center;">
   <a target="_blank" style="font-family:arial;text-decoration:none;color:#000;font-size:13px;" 
      href="http://qrcc.ru/qrcode.html">
      <script type="text/javascript" src="http://qrcc.ru/urlqr.js"></script><br>
      QR код этой страницы
   </a>
   </div>
   -->
   <?php
   */
   
   // 2 штрих-код
   //include "QrCode/qrlib.php";
   //QRcode::png("TPhpPrown - библиотека PHP-прикладных функций","TPhpPrown.png","L",4,4);

   //QRcode::png("http://doortry.ru - Обработчик ошибок и исключений","doortry.png","L",4,4);
   //QRcode::png("http://ittve.me", "test.png", "L", 4, 4);
  
   // 3 штрих-код
   //$backColor = 0xFFFF00; //0x555555;
   //$foreColor = 0xFF00FF; //0x111111;
   //QRcode::png("http://doortry.ru","doortry.png","L",4,4,false,$backColor,$foreColor);
   return $Result;
}
// <!-- --> ************************************************ MakeQrcode.php ***
