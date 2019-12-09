<?php

// PHP7/HTML5, EDGE/CHROME                              *** Findes_test.php ***

// ****************************************************************************
// * TPhpPrown                                   Выбрать из строки подстроку, *
// *                                    соответствующую регулярному выражению *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  02.04.2019
// Copyright © 2019 tve                              Посл.изменение: 23.05.2019

class test_Findes extends UnitTestCase 
{
   // Здесь все должно хорошо найтись в своих позициях
   function test_Findes_Simple()
   {
      MakeTitle("Findes",'');
      $string='Это строка для проверки функции Findes';
      $preg="/".'Это'."/u";
      MakeTestMessage('test_Findes_Simple: ','$preg '.$preg);
      $Result=\prown\Findes($preg,$string,$point);
      MakeTestMessage('$Result: ',$Result.' 888 '.$point);
      $Result=\prown\Findes($preg,$string);
      MakeTestMessage('$Result: ','***'.$Result.'***');
      $this->assertEqual($point,0);
      MakeTestMessage('test_Findes_Simple: ','Фрагмент '.'"Это"'.' найден с позиции 0');
      $preg="/".'Findes'."/u";
      $Result=\prown\Findes($preg,$string,$point);
      $this->assertEqual($point,59);     // 59 позиция, а не 32, так как UTF8
      $this->assertNotEqual($point,32);  // если бы не UTF8
      MakeTestMessage('test_Findes_Simple: ','Фрагмент '.'"Findes"'.' найден с байта 59 (так как UTF8)');
  }
   // Здесь поиск неудачный
   function test_Findes_Nofind()
   {
      $string='Это строка для проверки функции Findes';
      $preg="/".'строк'."/u";
      $Result=\prown\Findes($preg,$string,$point);
      $this->assertEqual($point,7);
      $preg="/".'строки'."/u";
      $Result=\prown\Findes($preg,$string,$point);
      $this->assertEqual($point,-1);
      $this->assertEqual('',$Result);
      $this->assertEqual($Result,'');
      MakeTestMessage('test_Findes_Nofind: ','Фрагмент '.'"строки"'.' не найден');
  }
   // Здесь строка, как число. Ожидалось исключение, но 
   // поиск обработан. Пусть так и остается.
   function test_Findes_Except()
   {
      $string=12;
      $preg="/".'12'."/u";
      $Result=\prown\Findes($preg,$string,$point);
      $this->assertEqual($point,0);
      MakeTestMessage('test_Findes_Except: ','Поиск в строке, как число обработан!');
  }
}
// ******************************************************** Findes_test.php ***
