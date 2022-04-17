<?php

   // Указываем координаты дачи в Лососинном
   $dacha='latitude=61.701941&longitude=34.154539'; // 61.701941,34.154539
   // Назначаем URL о погоде по координатам
   $url = 'https://api.gismeteo.net/v2/weather/current/?'.$dacha;
   // Указываем заголовок с моим токеном
   $headers = ['X-Gismeteo-Token: 61f2622da85fe2.06084651']; 
   // Назначаем поля нашего запроса и переводим их в формат JSON
   $post_data = ['field1'=>'val_1','field2'=>'val_2',];
   //$post_data = [];
   $data_json = json_encode($post_data);
   // Инициируем новый сеанс cURL и возвращаем дескриптор
   $curl = curl_init();
   // Загружаем URL
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_VERBOSE, 1);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
   $result = curl_exec($curl); // результат POST запроса
   if (curl_error($curl)) 
      \prown\ConsoleLog('Ошибка запроса о погоде: '.curl_error($curl));
      //echo 'Ошибка запроса о погоде: '.curl_error($curl).'<br>';
   else 
      \prown\ConsoleLog('Данные о погоде: '.$result);
      //echo 'Данные о погоде: '.$result.'<br>';



   ?>
   <div id="tipo">
   
      <div class="TitleCalc">
      DoorTry - коллекционер ошибок
      in1 v1.9
      </div>

      
      <div id="Badge">
         <img src="c3_r3.png" alt="">
      </div>
      <div class="Pogoda">
      <table>
      <tr>
        <td class="iLeft">Третья</td>
        <td>Четвертая</td>
      </tr>
      <tr>
        <td class="iLeft">Восьмая</td>
        <td>Девятая</td>
      </tr>
      <tr>
        <td class="iLeft">Десятая</td>
        <td>Одиннадцатая</td>
      </tr>
      <tr>
        <td colspan="2">Двенадцатая</td>
      </tr>
      </table>
      </div>
   </div>
   
   <?php
   /*
   
      <div class="TitleCalc">
      DoorTry - коллекционер ошибок
      in1 v1.9
      </div>


      <tr>
        <td rowspan="4"><img src="c3_r3.png" alt=""></td>
        <td class="ppoint">ВВосьмая</td>
        <td>ДДевятая</td>
      </tr>
        <td rowspan="4">Значoк</td>
        <td rowspan="4"><img id="ImghVerh" src="doortry.png" alt="doortry.ru"></td>
         <tr>
        <td rowspan="4" class="first">Первая</td>
        <td class="second">Вторая</td>
        <td>Третья</td>
        <td>Четвертая</td>
      </tr>
      <tr>
        <td rowspan="3" class="third">Пятая</td>
        <td>Шестая</td>
        <td>Седьмая</td>
      </tr>

      <tr class="separator">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
   */


