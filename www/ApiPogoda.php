<?php
   // Инициируем данные по погоде
   $ip=$_SERVER['REMOTE_ADDR'];
   $temperature=NULL;
   $humidity=NULL;
   $pressure=NULL;
   $description=NULL;
   $idPoint=NULL;
   $namePoint=NULL;
   // Выбираем данные по ip-адресу
   echo '<br><br><br><br><br><br><br>$ip='.$ip.'<br>';
   $json=getGisMeteoOnIP($ip,$idPoint,$namePoint);
   echo '<br>'.$json.'<br>';
   echo '<br>'.$idPoint.'<br>';
   echo '<br>'.$namePoint.'<br>';
   // Выбираем json-данные о погоде
   $json=getGisMeteo();
   echo '<br>'.$json.'<br>';
   
   $json=getGisMeteoOnIdPoint($idPoint);
   echo '<br>'.$json.'<br>';
   
   // Парсим
   $json=getParmGisMeteo($json,$temperature,$humidity,$pressure,$description);
   \prown\ConsoleLog('$temperature: '.$temperature);
   \prown\ConsoleLog('$humidity: '.$humidity);
   \prown\ConsoleLog('$pressure: '.$pressure);
   \prown\ConsoleLog('$description: '.$description);
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
        <td class="tLeft">Температура</td>
        <?php
        echo '<td class="tRight">'.$temperature.'ºC</td>';
        ?>
      </tr>
      <tr>
        <td class="tLeft">Влажность</td>
        <?php
        echo '<td class="tRight">'.$humidity.'%</td>';
        ?>
      </tr>
      <tr>
        <td class="tLeft">Давление</td>
        <?php
        echo '<td class="tRight">'.$pressure.'мм рт.ст.</td>';
        ?>
      </tr>
      <tr>
        <?php
        echo '<td class="tWidth" colspan="2">'.$description.'</td>';
        ?>
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

// ****************************************************************************
// *                   Выбрать данные о погоде в GisMeteo                     *
// ****************************************************************************
function getGisMeteo()
// curl -H 'X-Gismeteo-Token: 56b30cb255.3443075' 
// 'https://api.gismeteo.net/v2/weather/current/?latitude=54.35&longitude=52.52'
{
   // Выбираем данные на сайте doortry.ru или kwinflatht.nichost.ru
   if (isNichost())
   {
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
      $Result = curl_exec($curl); // результат POST запроса
      if (curl_error($curl)) 
      {
         $Result=curl_error($curl);
         $messa='Ошибка запроса о погоде: '.$Result;
      }
      else 
      {
         $messa='Данные о погоде: '.$Result;
      }
   }  
   // Выбираем отладочный результат на локальном сервере 
   else
   {
      $Result=
      '{
      "meta":{"message":"","code":"200"},
      "response":
      {
      "precipitation":
         {"type_ext":null,"intensity":1,"correction":true,"amount":0.1,"duration":0,"type":2},
         "pressure":{"h_pa":974,"mm_hg_atm":731,"in_hg":38.3},
         "humidity":{"percent":93},
         "icon":"c3_s1","gm":2,
         "wind":{"direction":{"degree":110,"scale_8":3},"speed":{"km_h":25,"m_s":7,"mi_h":15}},
         "cloudiness":{"type":3,"percent":100},
         "date":
            {"UTC":"2022-04-07 15:00:00","local":"2022-04-07 18:00:00",
            "time_zone_offset":180,"hr_to_forecast":null,"unix":1649343600
            },
         "phenomenon":71,"radiation":{"uvb_index":null,"UVB":null},
         "city":200629,"kind":"Obs","storm":false,
         "temperature":
           {"comfort":{"C":-5.8,"F":21.6},"water":{"C":3,"F":37.4},"air":{"C":-0.7,"F":30.7}},
         "description":{"full":"Пасмурно, небольшой снег"}
       }
       }';
       $messa=$Result;
   }
   return $Result;
}

// ****************************************************************************
// *                   Выбрать данные о погоде в GisMeteo                     *
// ****************************************************************************
function getGisMeteoOnIdPoint($idPoint)

// curl -H 'X-Gismeteo-Token: 56b30cb255.3443075' 
// 'https://api.gismeteo.net/v2/weather/current/?latitude=54.35&longitude=52.52'

// curl -H 'X-Gismeteo-Token: 56b30cb255.3443075' 
// 'https://api.gismeteo.net/v2/weather/current/4368/'
{
   // Выбираем данные на сайте doortry.ru или kwinflatht.nichost.ru
   if (isNichost())
   {
      // Назначаем URL о погоде по координатам
      $url = 'https://api.gismeteo.net/v2/weather/current/'.$idPoint.'/';
      // Указываем заголовок с моим токеном
      $headers = ['X-Gismeteo-Token: 61f2622da85fe2.06084651']; 
      // Назначаем поля нашего запроса и переводим их в формат JSON
      //$post_data = ['field1'=>'val1','field2'=>'val2',];
      $post_data = [];
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
      $Result = curl_exec($curl); // результат POST запроса
      if (curl_error($curl)) 
      {
         $Result=curl_error($curl);
         $messa='Ошибка запроса о погоде: '.$Result;
      }
      else 
      {
         $messa='Данные о погоде: '.$Result;
      }
   }  
   // Выбираем отладочный результат на локальном сервере 
   else
   {
      $Result=
      '{
      "meta":{"message":"","code":"200"},
      "response":
      {
      "precipitation":
         {"type_ext":null,"intensity":1,"correction":true,"amount":0.1,"duration":0,"type":2},
         "pressure":{"h_pa":974,"mm_hg_atm":731,"in_hg":38.3},
         "humidity":{"percent":93},
         "icon":"c3_s1","gm":2,
         "wind":{"direction":{"degree":110,"scale_8":3},"speed":{"km_h":25,"m_s":7,"mi_h":15}},
         "cloudiness":{"type":3,"percent":100},
         "date":
            {"UTC":"2022-04-07 15:00:00","local":"2022-04-07 18:00:00",
            "time_zone_offset":180,"hr_to_forecast":null,"unix":1649343600
            },
         "phenomenon":71,"radiation":{"uvb_index":null,"UVB":null},
         "city":200629,"kind":"Obs","storm":false,
         "temperature":
           {"comfort":{"C":-5.8,"F":21.6},"water":{"C":3,"F":37.4},"air":{"C":-0.7,"F":30.7}},
         "description":{"full":"Пасмурно, небольшой снег"}
       }
       }';
       $messa=$Result;
   }
   return $Result;
}
// ****************************************************************************
// *    Выполнить поиск в GisMeteo данных места расположения по ip-адресу     *
// ****************************************************************************
function getGisMeteoOnIP($ip,&$idPoint,&$namePoint)
// curl -H 'X-Gismeteo-Token: 56b30cb255.3443075' 
// 'https://api.gismeteo.net/v2/search/cities/?ip=185.90.102.110'
{
   // Выбираем данные на сайте doortry.ru
   if (isNichost()) 
   {
      // Назначаем URL о погоде по координатам
      $url = 'https://api.gismeteo.net/v2/search/cities/?ip='.$ip;
      // Указываем заголовок с моим токеном
      $headers = ['X-Gismeteo-Token: 61f2622da85fe2.06084651']; 
      // Назначаем поля нашего запроса и переводим их в формат JSON
      //$post_data = ['field1'=>'val_1','field2'=>'val_2',];
      $post_data = [];
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
      $Result = curl_exec($curl); // результат POST запроса
      if (curl_error($curl)) 
      {
         $Result=curl_error($curl);
         $messa='Ошибка запроса по ip-адресу: '.$Result;
      }
      else 
      {
         $messa='Данные по ip-адресу: '.$Result;
      }
   }  
   // Выбираем отладочный результат на локальном сервере 
   else
   {
      $Result=
      '{
      "meta":{"message":"","code":"200"},
      "response":
         {
         "district":{"name":"Республика Карелия","nameP":"в Республике Карелии"},
         "id":3934,
         "sub_district":{"name":"Петрозаводский городской округ","nameP":"в Петрозаводском городском округе"},
         "url":"\/weather-petrozavodsk-3934\/",
         "nameP":"в Петрозаводске",
         "name":"Петрозаводск",
         "kind":"M",
         "country":{"name":"Россия","code":"RU","nameP":"в России"}
         }
      }';
      $messa=$Result;
   }
   $obj = json_decode($Result);
   $idPoint=$obj->{'response'}->{'id'};
   $namePoint=$obj->{'response'}->{'name'};
   return $Result;
}


// ****************************************************************************
// *           Разобрать общие данные из json от GisMeteo                     *
// ****************************************************************************
function getParmGisMeteo($json,&$temperature,&$humidity,&$pressure,&$description)
{
   $obj = json_decode($json);
   $temperature=$obj->{'response'}->{'temperature'}->{'comfort'}->{'C'};
   $humidity=$obj->{'response'}->{'humidity'}->{'percent'};
   $pressure=$obj->{'response'}->{'pressure'}->{'mm_hg_atm'};
   $description=$obj->{'response'}->{'description'}->{'full'};
}

/*
{
"meta":{"message":"","code":"200"},
"response":
   {
   "precipitation":
      {"type_ext":null,"intensity":1,"correction":true,"amount":0.1,"duration":0,"type":2},
   "pressure":{"h_pa":974,"mm_hg_atm":731,"in_hg":38.3},
   "humidity":{"percent":93},
   "icon":"c3_s1","gm":2,
   "wind":{"direction":{"degree":110,"scale_8":3},"speed":{"km_h":25,"m_s":7,"mi_h":15}},
   "cloudiness":{"type":3,"percent":100},
   "date":
       {"UTC":"2022-04-07 15:00:00","local":"2022-04-07 18:00:00",
          "time_zone_offset":180,"hr_to_forecast":null,"unix":1649343600
       },
   "phenomenon":71,"radiation":{"uvb_index":null,"UVB":null},
   "city":200629,"kind":"Obs","storm":false,
   "temperature":
      {"comfort":{"C":-5.8,"F":21.6},"water":{"C":3,"F":37.4},"air":{"C":-0.7,"F":30.7}},
   "description":{"full":"Пасмурно, небольшой снег"}
   }
}
*/
