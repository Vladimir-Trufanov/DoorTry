<?php

// PHP7/HTML5, EDGE/CHROME                            *** MakeType_test.php ***

// ****************************************************************************
// * TPhpPrown                        Преобразовать значение к заданному типу *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  20.04.2019
// Copyright © 2019 tve                              Посл.изменение: 24.05.2019

require_once $SiteRoot."/TPhpPrown/iniConstMem.php";

class test_MakeType extends UnitTestCase 
{
   // Преобразование строки к целому числу
   function test_MakeType_Simple()
   {
      MakeTitle("MakeType");
      $string='1958';
      $Result=\prown\MakeType($string,tInt);
      $this->assertEqual($Result,1958);
      $this->assertNotEqual($Result,'1959');  
      MakeTestMessage('test_MakeType_Simple: ','Преобразование "1958"-->1958 выполнено');
  }
   // Преобразование целого числа к логической переменной
   function test_MakeType_Boolean()
   {
      $value=0; $Result=\prown\MakeType($value,tBool);
      $this->assertFalse($Result);
      $value=1; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      $value=-1; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      $value=-10; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      $value=100; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      MakeTestMessage('test_MakeType_Boolean: ','Преобразования целого к логическому типу');
      MakeTitle("Тесты завершены!");
  }
}
// ****************************************************** MakeType_test.php ***
