<?php
// PHP7/HTML5, EDGE/CHROME                              *** ConnHandler.php ***

// ****************************************************************************
// * doortry.ru                     Подключение обработчика ошибок/исключений *
// *                                                 - главный материал сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.08.2019

// Переадресация страницы:
// 'Podklyucheniye_obrabotchika_oshibok_isklyucheniy'='index.php?Com=ConnHandler'

function SeoTags()
{
    echo "<title>Нормативы потребления коммунальной услуги по отоплению</title>";
    echo "<meta name=\"description\" content=\"Для расчета льготы в оплате коммунальной услуги по отоплению учитывается норма потребления этой услуги, которая зависит от этажности дома, года постройки, категории дома и продолжительности отопительного периода\">";
    echo "<meta name=\"keywords\" content=\"льготы на оплату коммунальной услуги по отоплению ветеранам труда и другим пенсионерам, как рассчитать льготы по ЖКХ ветеранам труда\">";
}

function Н2()
{
    echo "<h2>Как влияют нормативы на расчет льгот?</h2>";
}

function PageContent()
{
   $Result = true;
   ?>
   <h2>Connection error / exception handler</h2>
   <p><img src="imgs/clouds.jpg" alt="Облака" class="half right">Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum.</p>
   <p>Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. </p>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
   <h3><img src="imgs/jellyfish.jpg" alt="Медуза" class="half left">Подзаголовок</h3>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
   <h2>Подключение обработчика ошибок/исключений</h2>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tor</p>
   <?php
   return $Result;
}
// <!-- --> *********************************************** ConnHandler.php ***
