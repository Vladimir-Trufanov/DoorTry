<?php
// PHP7/HTML5, EDGE/CHROME                         *** kapriznyj-starik.php ***

// ****************************************************************************
// * doortry.ru          Вывести стихотворение со штрихкодом в правой колонке *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.09.2021
// Copyright © 2019 tve                              Посл.изменение: 16.09.2021

function StihVerh()
{
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Входя будить меня с утра,</p>';
   echo '<p class="stihstr">Кого ты видишь, медсестра? </p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Старик капризный, по привычке</p>';
   echo '<p class="stihstr">Ещё живущий кое-как,</p>';
   echo '<p class="stihstr">Полуслепой, полудурак,</p>';
   echo '<p class="stihstr">«Живущий» впору взять в кавычки.</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Не слышит — надрываться надо,</p>';
   echo '<p class="stihstr">Изводит попусту харчи.</p>';
   echo '<p class="stihstr">Бубнит всё время — нет с ним сладу. </p>';
   echo '<p class="stihstr">Ну сколько можно, замолчи!</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Тарелку на пол опрокинул.</p>';
   echo '<p class="stihstr">Где туфли? Где носок второй?</p>';
   echo '<p class="stihstr">Последний, мать твою, герой.</p>';
   echo '<p class="stihstr">Слезай с кровати! Чтоб ты сгинул...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Сестра! Взгляни в мои глаза! </p>';
   echo '<p class="stihstr">Сумей увидеть то, что за...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">На то мне голова дана</p>';
   echo '<p class="stihstr">Сажусь и программирую</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Пытаюсь сделать, чтоб другие</p>';
   echo '<p class="stihstr">Могли программу нашу брать,</p>';
   echo '<p class="stihstr">Но не могли бы запускать.</p>';
   echo '<p class="stihstr">... А думы в голове иные</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Горят, как факел, в голове</p>';
   echo '<p class="stihstr">Три милых буквы - "ич" и "е"...</p>';
   echo '</div>';
}
function StihNiz()
{
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Две недели пролетели</p>';
   echo '<p class="stihstr">Всё готово, как хотели</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Программу можно запускать,</p>';
   echo '<p class="stihstr">Но если буквы не зажечь</p>';
   echo '<p class="stihstr">Не избежать серьёзных встреч:</p>';
   echo '<p class="stihstr">"Нельзя программы воровать!"</p>';
   echo '</div>';
   echo '<div class="stihabz">';
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

function KapriznyjStarik($SubPage=NULL)
{
   echo '<h1>Капризный старик</h1>';
   echo '<br>';
   // Выводим первую (верхнюю) часть стихотворения с картинкой
   echo '<div id="Verh">';
      echo '<div id="StihVerh">';
      StihVerh();
      echo '</div>';
      echo '<div id="dImgVerh">';
      ?>
      <img id="ImgVerh" src="molody-dushoj_808x808.jpg" alt="Молоды душой">
      <p id="pVerh">Молоды душой</p>
      <?php
      echo '</div>';
   echo '</div>';
   // Выводим разделитель частей стихотворения
   ?>
   <div id="divSeparator">
      <img id="imgStrap" src="majskij-vecher-v-karelii_2416x503.jpg" alt="Майский вечер в Карелии">
      <p id="pStrap">Майский вечер в Карелии</p>
   </div>
   <?php 
   echo '<div id="Niz">';
      echo '<div id="StihNiz">';
      StihNiz();
      echo '</div>';
      echo '<div id="dImgNiz">';
      ?>
      <img id="ImgNiz" src="raznye-vmeste_1280x850.jpg" alt="Разные вместе">
      <p id="pNiz">Разные вместе</p>
      <?php
      echo '</div>';
   echo '</div>';
   $Result = true;
   return $Result;
}
// <!-- --> ****************************************** kapriznyj-starik.php ***
