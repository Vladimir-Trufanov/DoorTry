<?php
// PHP7/HTML5, EDGE/CHROME                               *** SimPrincip.php ***

// ****************************************************************************
// * doortry.ru                            Простой принцип программирования - * 
// *                                            второй главный материал сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 03.06.2019

function SimPrincip()
{
   $Result = true;
   ?>
   <h3>Простой принцип программирования</h3>
   <h3>Simple programming principle</h3>
   <p><img src="Images/DoorTry1.png" alt="Простой принцип" class="half right">
   «В программе есть ошибки!». С этим надо жить и программировать. И приходится, прежде чем начать писать некоторую программную систему, вначале следует создать систему обработки ошибок (и исключений). Построить ее так, чтобы можно было отвлечься от мыслей о возможных ошибках в написании кода продукта и сосредоточится на реализации его полезного назначения, его функционала. Работу над возникающими ошибками в различных разработках собрать в одном месте и отрабатывать отдельно. В этом заключается простой принцип программирования – «Do or Try» - «Делай или пробуй».
   </p>
   <p><img src="Images/DoorTry2.png" alt="Обработать ошибки/исключения" class="half left">
   На сайте doortry.ru реализована открытая дверь для проверок в реализации этого простого принципа программирования для отладки сайтов на PHP7-PHP5.
   </p>
   <?php
   return $Result;
}
// <!-- --> ************************************************ SimPrincip.php ***
