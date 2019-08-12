<?php
// PHP7/HTML5, EDGE/CHROME                               *** SimPrincip.php ***

// ****************************************************************************
// * doortry.ru                              Простой принцип программирования * 
// *                                          - второй главный материал сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 02.08.2019

// Переадресация страницы:
//            'Prostoy-printsip-programmirovaniya' = 'index.php?Com=SimPrincip'

function SeoTags()
{
    echo "<title>Простой принцип программирования</title>";
    echo "<meta name=\"description\" content=\"Простой принцип программирования DO-or-TRY с автоматическим выводом и комментированием ошибок на сайте\">";
    echo "<meta name=\"keywords\" content=\"система обработки ошибок (и исключений) на PHP,автоматический вывод ошибок на сайт\">";
}

function MakeH1()
{
    echo "<h1>Простой принцип программирования - Simple programming principle</h1>";
}

function PageContent()
{
   $Result = true;
   ?>
   <br>
   <p>
   Простой принцип программирования – «Do or Try» - «Делай или пробуй». Суть его заключается в отделении процесса программирования от обработки ошибок. Общеизвестно и является аксиомой то, что "в каждой программе есть хотя бы одна ошибка!». Любому компьютерному разработчику с этим надо жить и продолжать программировать. Поэтому серьезному специалисту приходится, прежде чем начать писать некоторую программную систему, вначале создать систему обработки ошибок (и исключений). Сайт DoorTry предлагает себя как единожды созданную систему для многократного использования при написании и эксплуатации других сайтов.
   </p>
   <p>
   <img src="Images/DoorTry1.png" alt="Простой принцип">
   </p>
   <p>
   Простой принцип программирования позволяет просто писать полезный функционал продукта, блок за блоком, отвлечься от мыслей о возможных ошибках и вспоминать только, когда они возникают. После отработки ошибки продолжить полезную работу с продуктом.
   </p>
   <p>
   Сайт doortry.ru собирает работу над возникающими ошибками в различных проектах на PHP7-PHP5, а именно на его страницах реализована открытая дверь простого принципа программирования.
   </p>
   <p>
   <img src="Images/DoorTry2.png" alt="Обработать ошибки/исключения">
   </p>
   <p>
   Подключение обработчика ошибок через наш сайт представлено на следующей странице - "Подключить обработчик ошибок/исключений".
   </p>
   <?php
   return $Result;
}
// <!-- class="half center" --> ************************************************ SimPrincip.php ***
