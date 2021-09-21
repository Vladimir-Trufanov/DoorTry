<?php
// PHP7/HTML5, EDGE/CHROME                  *** proba.php ()***

// ****************************************************************************
// *                 Страница стихотворения ""                *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.09.2021
// Copyright © 2021 tve                              Посл.изменение: 16.09.2021

$KapriznyjStarik='
   <div class="stihabz">
   <p class="stihstr">Входя будить меня с утра,</p>
   <p class="stihstr">Кого ты видишь, медсестра? </p>
   <p class="stihstr">Старик капризный, по привычке</p>
   <p class="stihstr">Ещё живущий кое-как,</p>
   <p class="stihstr">Полуслепой, полудурак,</p>
   <p class="stihstr">«Живущий» впору взять в кавычки.</p>
   </div>
   <div class="stihabz">
   <p class="stihstr">Не слышит — надрываться надо,</p>
   <p class="stihstr">Изводит попусту харчи.</p>
   <p class="stihstr">Бубнит всё время — нет с ним сладу. </p>
   <p class="stihstr">Ну сколько можно, замолчи!</p>
   </div>
   <div class="stihabz">
   <p class="stihstr">Тарелку на пол опрокинул.</p>
   <p class="stihstr">Где туфли? Где носок второй?</p>
   <p class="stihstr">Последний, мать твою, герой.</p>
   <p class="stihstr">Слезай с кровати! Чтоб ты сгинул...</p>
   </div>
';
   /*
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Сестра! Взгляни в мои глаза! </p>';
   echo '<p class="stihstr">Сумей увидеть то, что за...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">За этой немощью и болью,</p>';
   echo '<p class="stihstr">За жизнью прожитой, большой.</p>';
   echo '<p class="stihstr">За пиджаком, побитым молью,</p>';
   echo '<p class="stihstr">За кожей дряблой, «за душой».</p>';
   echo '<p class="stihstr">За гранью нынешнего дня</p>';
   echo '<p class="stihstr">Попробуй разглядеть МЕНЯ...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Я мальчик! Непоседа милый,</p>';
   echo '<p class="stihstr">Весёлый, озорной слегка.</p>';
   echo '<p class="stihstr">Мне страшно. Мне лет пять от силы,</p>';
   echo '<p class="stihstr">А карусель так высока!</p>';
   echo '<p class="stihstr">Но вот отец и мама рядом,</p>';
   echo '<p class="stihstr">Я в них впиваюсь цепким взглядом.</p>';
   echo '<p class="stihstr">И хоть мой страх неистребим,</p>';
   echo '<p class="stihstr">Я точно знаю, что любим...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Вот мне шестнадцать, я горю!</p>';
   echo '<p class="stihstr">Душою в облаках парю!</p>';
   echo '<p class="stihstr">Мечтаю, радуюсь, грущу,</p>';
   echo '<p class="stihstr">Я молод, я любовь ищу...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... И вот он, мой счастливый миг!</p>';
   echo '<p class="stihstr">Мне двадцать восемь. Я жених!</p>';
   echo '<p class="stihstr">Иду с любовью к алтарю,</p>';
   echo '<p class="stihstr">И вновь горю, горю, горю...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Мне тридцать пять, растёт семья,</p>';
   echo '<p class="stihstr">У нас уже есть сыновья,</p>';
   echo '<p class="stihstr">Свой дом, хозяйство. И жена</p>';
   echo '<p class="stihstr">Мне дочь вот-вот родить должна...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... А жизнь летит, летит вперёд!</p>';
   echo '<p class="stihstr">Мне сорок пять — круговорот!</p>';
   echo '<p class="stihstr">И дети не по дням растут.</p>';
   echo '<p class="stihstr">Игрушки, школа, институт...</p>';
   echo '<p class="stihstr">Всё! Упорхнули из гнезда</p>';
   echo '<p class="stihstr">И разлетелись кто куда!</p>';
   echo '<p class="stihstr">Замедлен бег небесных тел,</p>';
   echo '<p class="stihstr">Наш дом уютный опустел...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Но мы с любимою вдвоём!</p>';
   echo '<p class="stihstr">Ложимся вместе и встаём.</p>';
   echo '<p class="stihstr">Она грустить мне не даёт.</p>';
   echo '<p class="stihstr">И жизнь опять летит вперёд...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Теперь уже мне шестьдесят.</p>';
   echo '<p class="stihstr">Вновь дети в доме голосят!</p>';
   echo '<p class="stihstr">Внучат весёлый хоровод.</p>';
   echo '<p class="stihstr">О, как мы счастливы! Но вот...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Померк внезапно солнца свет.</p>';
   echo '<p class="stihstr">Моей любимой больше нет!</p>';
   echo '<p class="stihstr">У счастья тоже есть придел...</p>';
   echo '<p class="stihstr">Я за неделю поседел,</p>';
   echo '<p class="stihstr">Осунулся, душой поник</p>';
   echo '<p class="stihstr">И ощутил, что я старик...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Теперь живу я без затей,</p>';
   echo '<p class="stihstr">Живу для внуков и детей.</p>';
   echo '<p class="stihstr">Мой мир со мной, но с каждым днём</p>';
   echo '<p class="stihstr">Всё меньше, меньше света в нём...</p>';
   echo '<p class="stihstr">Крест старости взвалив на плечи,</p>';
   echo '<p class="stihstr">Бреду устало в никуда.</p>';
   echo '<p class="stihstr">Покрылось сердце коркой льда..</p>';
   echo '<p class="stihstr">И время боль мою не лечит.</p>';
   echo '<p class="stihstr">О Господи, как жизнь длинна,</p>';
   echo '<p class="stihstr">Когда не радует она...</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">... Но с этим следует смириться.</p>';
   echo '<p class="stihstr">Ничто не вечно под Луной.</p>';
   echo '<p class="stihstr">А ты, склонившись надо мной,</p>';
   echo '<p class="stihstr">Открой глаза свои, сестрица.</p>';
   echo '<p class="stihstr">Я не старик капризный, нет!</p>';
   echo '<p class="stihstr">Любимый муж, отец и дед.</p>';
   echo '<p class="stihstr">И мальчик маленький, доселе</p>';
   echo '<p class="stihstr">В сиянье солнечного дня</p>';
   echo '<p class="stihstr">Летящий в даль на карусели...</p>';
   echo '<p class="stihstr">Попробуй разглядеть МЕНЯ...</p>';
   echo '<p class="stihstr">И, может, обо мне скорбя, найдёшь СЕБЯ!</p>';
   echo '</div>';
   */

$KapriznyjStarikInfo='
   В Рунете в последнее время весьма популярно одно стихотворение. Его 
   пересылают друзьям, копируют себе в блоги, дают свои варианты перевода. А 
   стихотворению предшествует небольшое предисловие. В "каноническом" варианте 
   все это выглядит так.<br>
   
   Cтарик находился в доме престарелых последние дни своей жизни. После смерти 
   все считали, что он ушел из жизни, не оставив в ней ценного следа. Но когда
   медсестры начали разбирать его скудные пожитки, они наткнулись на интересное 
   стихотворение, которое поразило работников своим содержанием и смыслом.<br>
   
   Одна из сотрудниц взяла копию в Мельбурн. C тех пор его стихотворение 
   появилось в рождественских журналах по всей стране, а также в журналах для 
   психологов. И этот старик, который нищим ушел из жизни в Богом забытом 
   городке в Австралии, теперь взрывает Интернет глубиной своей души. В 
   английском оригинале стих звучит очень поэтично и поражает глубиной мысли 
   и красотой рифмы.<br>

   <a href="https://rg.ru/2013/02/28/starik.html">Мы попытались узнать об 
   авторе</a> этого стихотворения немного больше. И выяснились неожиданные вещи.
   Как это часто бывает в Сети, анонимный контент оказался красивой сказкой, 
   хотя реальная история стихотворения тоже весьма любопытна. Впервые оно было 
   напечатано в небольшом шотландском журнале в 1966 году под названием 
   "Ворчливая старуха". Текст был почти такой же, как в современном варианте, 
   только от женского лица.<br>
   
   Стихотворение запомнилось и стало гулять по другим британским литературным 
   сборникам, меняя название. От журнала к журналу легенда об авторе обрастала
   новыми подробностями. Общим местом в них было лишь то, что рукопись нашли 
   в вещах некой Кэйт, которая умерла в шотландском доме престарелых. Хотя уже 
   тогда некоторые исследователи приписывали авторство стиха шотландской 
   медсестре Филлис МакКормак, в 1960-х работавшей в Sunnyside Hospital в 
   г.Монтроз.<br>
   
   Правда вскрылась в 1998 году. Сын Филлис в интервью Daily Mail подтвердил 
   давние слухи о том, что настоящим автором стихотворения, оригинальное 
   название которого "Смотри внимательнее, сестра", была его мать. Однако она 
   не решилась признаться в авторстве, а потому напечатала его в журнале 
   анонимно. Кроме того, подложила рукопись в вещи одной из обитательниц дома 
   престарелых, в котором работала. Когда та преставилась, написанная ее рукой 
   копия стихотворения была передана газете Sunday Post. А потом родилась и 
   красивая сопроводительная история.
';

$CrankyOldMan='
   Cranky Old Man
   What do you see nurses? What do you see?
   What are you thinking when you’re looking at me?
   A cranky old man, not very wise,
   Uncertain of habit with faraway eyes?
   Who dribbles his food and makes no reply.
   When you say in a loud voice ’I do wish you’d try!’
   Who seems not to notice the things that you do.
   And forever is losing. A sock or shoe?
   Who, resisting or not lets you do as you will,
   With bathing and feeding. The long day to fill?
   Is that what you’re thinking? Is that what you see?
   Then open your eyes, nurse you’re not looking at me.
   I’ll tell you who I am. As I sit here so still,
   As I do at your bidding, as I eat at your will.
   I’m a small child of Ten with a father and mother,
   Brothers and sisters who love one another
   A young boy of Sixteen with wings on his feet
   Dreaming that soon ... now a lover he’ll meet.
   A groom soon at Twenty, my heart gives a leap.
   Remembering, the vows that I promised to keep.
   At Twenty-Five, now. I have young of my own.
   Who need me to guide. And a secure happy home.
   A man of Thirty. My young now grown fast,
   Bound to each other. With ties that should last.
   At Forty, my young sons have grown and are gone,
   But my woman is beside me to see I don’t mourn.
   At Fifty, once more, Babies play ‘round my knee,
   Again, we know children. My loved one and me.
   Dark days are upon me. My wife is now dead.
   I look at the future. I shudder with dread.  
   For my young are all rearing young of their own.
   And I think of the years. And the love that I’ve known.
   I’m now an old man and nature is cruel.
   It’s jest to make old age look like a fool.
   The body, it crumbles grace and vigour, depart.
   There is now a stone where I once had a heart.
   But inside this old carcass. A young man still dwells,
   And now and again my battered heart swells
   I remember the joys. I remember the pain.
   And I’m loving and living life over again. 
   I think of the years, all too few gone too fast.
   And accept the stark fact that nothing can last.
   So open your eyes, people open and see.
   Not a cranky old man. Look closer see ME!
';

$btSsylki='
   <div class="stihabzPdp">
   <p class="stihstr">https://rg.ru/2013/02/28/starik.html</p>
   <p class="stihstr">https://vk.com/@geniuspub-sumei-uvidet-to-chto-za</p>
   <p class="stihstr">https://stihi.ru/2014/01/26/2454</p>
   </div>
';
 
// <!-- --> ****************************** proba.php ().php ***
