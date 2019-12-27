<?php

// PHP7/HTML5, EDGE/CHROME                     *** isCalcInBrowser_test.php ***

// ****************************************************************************
// * TPhpPrown    Проанализировать UserAgent браузера по версиям родительских *
// *                  браузеров и определить работает ли функция Calc для CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.02.2019
// Copyright © 2019 tve                              Посл.изменение: 23.02.2019

class test_isCalcInBrowser extends UnitTestCase 
{
   function test_isCalcInBrowser_Chrome()
   {
      $ModeError=rvsCurrentPos;
      MakeTitle("isCalcInBrowser");
      // Ошибочный UserAgent, так как 2 Chrome
      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Chrome/72.0.3626.96 Chrome/72.0.3626.96 Safari/537.36";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertTrue($Result);   
      // Ошибочный UserAgent, так как Chrome не имеет версии
      $UserAgent="Mozilla/5.0 "."Chrome/аа";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertFalse($Result);   
      MakeTestMessage('test_isCalcInBrowser_Chrome: ',
         'Ошибочные сообщения функции');
      // Нормальный UserAgent от Chrome
      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Chrome/72.0.3626.96 Safari/537.36";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertTrue($Result);   
      MakeTestMessage('test_isCalcInBrowser_Chrome: ',
         'Нормальный UserAgent от Chrome');
   }
   
   // Проверяем 2 версии от Safari
   function test_isCalcInBrowser_Safari()
   {
      $ModeError=rvsCurrentPos;
      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Safari/534.57.2";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertFalse($Result);

      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Safari/537.21";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertFalse($Result);
         
      MakeTestMessage('test_isCalcInBrowser_Safari: ',
         'Нормальные UserAgent-ы от Safari');
   }

   // Проверяем 2 версии от Firefox
   function test_isCalcInBrowser_Firefox()
   {
      $ModeError=rvsCurrentPos;
      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Firefox/31.0 K-Meleon/75.1";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertTrue($Result);

      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Firefox/65.0";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertTrue($Result);
         
      MakeTestMessage('test_isCalcInBrowser_Firefox: ',
         'Нормальные UserAgent-ы от Firefox');
   }
   
   // Проверяем остальные браузеры (считаем, что Calc не работает)
   function test_isCalcInBrowser_Trident()
   {
      $ModeError=rvsCurrentPos;
      $UserAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) ".
         "Trident/7.0";
      $Result=\prown\isCalcInBrowser($UserAgent,$ModeError); 
      $this->assertFalse($Result);
         
      MakeTestMessage('test_isCalcInBrowser_Trident: ',
         'Прочие UserAgent-ы, включая Trident');
   }
}

// *********************************************** isCalcInBrowser_test.php ***
