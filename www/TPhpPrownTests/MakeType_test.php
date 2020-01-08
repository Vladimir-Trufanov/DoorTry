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
      SimpleMessage();
      $string='1958';
      $Result=\prown\MakeType($string,tInt);
      $this->assertEqual($Result,1958);
      $this->assertNotEqual($Result,'1959');  
      MakeTestMessage(
         '$string="1958"; $Result=\prown\MakeType($string,tInt); ',
         'Преобразование строчного "1958" к целому 1958',70);
  }
   // Преобразование целого числа к логической переменной
   function test_MakeType_Boolean()
   {
      $value=0; $Result=\prown\MakeType($value,tBool);
      $this->assertFalse($Result);
      MakeTestMessage(
         '$value=0; $Result=\prown\MakeType($value,tBool); ',
         'Преобразования целого = 0 к логическому типу: False',70);
      $value=1; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      MakeTestMessage(
         '$value=1; $Result=\prown\MakeType($value,tBool); ',
         'Преобразования целого = 1 к логическому типу: True',70);
      $value=-1; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      MakeTestMessage(
         '$value=-1; $Result=\prown\MakeType($value,tBool); ',
         'Преобразования целого = -1 к логическому типу: True',70);
      $value=-10; $Result=\prown\MakeType($value,tBool);
      $this->assertTrue($Result);
      $Result=\prown\MakeType(100,tBool);
      $this->assertTrue($Result);
      MakeTestMessage(
         '$Result=\prown\MakeType(100,tBool); ',
         'Преобразования целого = 100 к логическому типу: True',70);
  }
}
// ****************************************************** MakeType_test.php ***
