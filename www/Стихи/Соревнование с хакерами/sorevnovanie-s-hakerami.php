<?php
// PHP7/HTML5, EDGE/CHROME                  *** sorevnovanie-s-hakerami.php ***

// ****************************************************************************
// * doortry.ru          Вывести стихотворение со штрихкодом в правой колонке *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 03.09.2019

function StihVerh()
{
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">Бежал ноябрь, работа шла</p>';
   echo '<p class="stihstr">В душе кипели страсти</p>';
   echo '<p class="stihstr">Жил на работе - чуть дыша</p>';
   echo '<p class="stihstr">На улице - ненастье</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">А тут пришла проблема вдруг:</p>';
   echo '<p class="stihstr">"Там Учпрофстрой пытался взять</p>';
   echo '<p class="stihstr">программу Дмитрича опять!"</p>';
   echo '<p class="stihstr">Сгрудились девушки вокруг:</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">"Придумать нужно" - говорят</p>';
   echo '<p class="stihstr">"Защиту". И в глаза глядят</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">Придумать надо. Боль ясна.</p>';
   echo '<p class="stihstr">Ну что ж, иду и думаю</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">На то мне голова дана</p>';
   echo '<p class="stihstr">Сажусь и программирую</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">Пытаюсь сделать, чтоб другие</p>';
   echo '<p class="stihstr">Могли программу нашу брать,</p>';
   echo '<p class="stihstr">Но не могли бы запускать.</p>';
   echo '<p class="stihstr">... А думы в голове иные</p>';
   echo '</div>';
   echo '<div class="stihabzL">';
   echo '<p class="stihstr">Горят, как факел, в голове</p>';
   echo '<p class="stihstr">Три милых буквы - "ич" и "е"...</p>';
   echo '</div>';
}
function StihNiz()
{
   echo '<div class="stihabzR">';
   echo '<p class="stihstr">Две недели пролетели</p>';
   echo '<p class="stihstr">Всё готово, как хотели</p>';
   echo '</div>';
   echo '<div class="stihabzR">';
   echo '<p class="stihstr">Программу можно запускать,</p>';
   echo '<p class="stihstr">Но если буквы не зажечь</p>';
   echo '<p class="stihstr">Не избежать серьёзных встреч:</p>';
   echo '<p class="stihstr">"Нельзя программы воровать!"</p>';
   echo '</div>';
   echo '<div class="stihabzR">';
   echo '<p class="stihstr">Раскроют хакеры игру</p>';
   echo '<p class="stihstr">Опять защиту сделаю</p>';
   echo '<p class="stihstr">Всё те же буквы я возьму</p>';
   echo '<p class="stihstr">Идею вскрою свежую</p>';
   echo '</div>';
   echo '<div class="stihabzPdp">';
   echo '<p class="stihstr">январь, кабинет</p>';
   echo '<p class="stihstr">июнь, 115 километр</p>';
   echo '<p class="stihstr">кабинет, декабрь, 1998</p>';
   echo '</div>';
}

function SorevnovanieSHakerami($SubPage=NULL)
{
   echo '<h2>Соревнование с хакерами</h2>';
   echo '<br>';
   echo '<div id="verh">';
      echo '<div id="StihVerh">';
      StihVerh();
      echo '</div>';
      echo '<div id="ImgVerh">';
      echo 'ImgVerh';
      echo '</div>';
   echo '</div>';

   echo '<div id="ImgStrap">';
   ?>
   <img src="Images/majskij-vecher-v-karelii.jpg" alt="Майский вечер в Карелии">
   <img src="majskij-vecher-v-karelii.jpg" alt="Майский вечер в Карелии">
   <?php
   echo '</div>';

   echo '<div id="niz">';
      echo '<div id="StihNiz">';
      StihNiz();
      echo '</div>';
      echo '<div id="ImgNiz">';
      echo 'ImgNiz';
      echo '</div>';
   echo '</div>';
   $Result = true;
?>
<?php
return $Result;
}
// <!-- --> *********************************** sorevnovanie-s-hakerami.php ***
