<?php
// PHP7/HTML5, EDGE/CHROME                  *** sorevnovanie-s-hakerami.php ***

// ****************************************************************************
// *              Страница стихотворения "Соревнование с хакерами"            *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 24.09.2021

define ("StihVerh",'
   Бежал ноябрь, работа шла
   В душе кипели страсти
   Жил на работе - чуть дыша
   На улице - ненастье
   
   А тут пришла проблема вдруг:
   "Там Учпрофстрой пытался взять
   программу Дмитрича опять!"
   Сгрудились девушки вокруг:

   "Придумать нужно" - говорят
   "Защиту". И в глаза глядят

   Придумать надо. Боль ясна.
   Ну что ж, иду и думаю

   На то мне голова дана
   Сажусь и программирую

   Пытаюсь сделать, чтоб другие
   Могли программу нашу брать,
   Но не могли бы запускать.
   ... А думы в голове иные

   Горят, как факел, в голове
   Три милых буквы - "ич" и "е"...
');       

define ("StihNiz",'
   Две недели пролетели
   Всё готово, как хотели

   Программу можно запускать,
   Но если буквы не зажечь
   Не избежать серьёзных встреч:
   "Нельзя программы воровать!"

   Раскроют хакеры игру
   Опять защиту сделаю
   Всё те же буквы я возьму
   Идею вскрою свежую
   
');       

define ("StihPdp",'
   <div class="stihabzPdp">
   <p class="stihstr">январь, кабинет</p>
   <p class="stihstr">июнь, 115 километр</p>
   <p class="stihstr">кабинет, декабрь, 1998</p>
   </div>
'); 

define ('Stih'.'sorevnovanie-s-hakerami','
   <div class="stihabzPdp">
   <p class="stihstr">январь, кабинет</p>
   <p class="stihstr">июнь, 115 километр</p>
   <p class="stihstr">кабинет, декабрь, 1998</p>
   </div>
'); 

$stih='Привет Соревнование с хакерами<br>';

function Stih1()
{
   echo '<!--noindex-->';
   echo '<h2>Соревнование с хакерами</h2>';
   eche(StihVerh);
   eche(StihNiz);
   echo '<!--/noindex-->';
   echo '<div id="dImghStih">';
   echo '<img id="ImghStih" src="stihi/sorevnovanie-s-hakerami.png" alt="sorevnovanie-s-hakerami.png">';
   echo '</div>';
}      

function MakePage($StihoPage)
{
   echo '<h1>Соревнование с хакерами</h1>';

   echo '<div id="divTop">';
   modelTxtEImg('40%','60%',StihVerh,'molody-dushoj_808x808.jpg',"Молоды душой",$StihoPage);
   echo '</div>';

   echo '<div id="divStrip">';
   blockImg("majskij-vecher-v-karelii_2416x503.jpg","Майский вечер в Карелии",$StihoPage);
   echo '</div>';
   
   echo '<div id="divBottom">';
   modelImgTxtEO('60%','40%',"raznye-vmeste_1280x850.jpg","Разные вместе",StihNiz,StihPdp,$StihoPage);
   echo '</div>';
}

function SeoTag()
{
   echo '<title>Соревнование с хакерами</title>';
   echo '<meta name="description" content="
      Бежал ноябрь, работа шла
      В душе кипели страсти
      Жил на работе - чуть дыша
      На улице - ненастье
   ">';
   echo '<meta name="keywords" content="
      стихи,всякие,разные,страсти,хакеры,защита,программирование,
      девушки,встречи
   ">';
}

// <!-- --> *********************************** sorevnovanie-s-hakerami.php ***
