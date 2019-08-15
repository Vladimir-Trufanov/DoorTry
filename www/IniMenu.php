<?php
// PHP7/HTML5, EDGE/CHROME                                  *** IniMenu.php ***

// ****************************************************************************
// * doortry.ru                                        Отработать пункты меню *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.08.2019

// ****************************************************************************
// *                      Отработать пункты верхнего меню                     *
// ****************************************************************************
function TopMenu()
{
   $Result = true;
   echo '<ul>';
      // Переключаем пункты меню главных материалов сайта
      if (isComRequest('ConnHandler'))
         echo '<li><a href="index.php?Com=SimPrincip">Простой принцип программирования</a></li>';
      else
         echo '<li><a href="index.php?Com=ConnHandler">Подключить обработчик ошибок/исключений</a></li>';
      // Устанавливаем остальные пункты
      echo '<li><a href="##">Штрихотворения</a></li>';
      echo '<li><a href="#">Новости</a></li>';
      
      /*
      echo '<ul>';
      echo '<li><a href="###">Яндекс-Новости</a></li>';
      echo '<li><a href="###">Лига-Новости</a></li>';
      echo '<li><a href="###">Столица на онего</a></li>';
      echo '</ul>';
      */
      //echo '<li><a href="#">SoftШутки</a></li>';
   echo '</ul>';
   
            
?> 


<!--
<div id="nav">
   <div class="menu-item">
      Меню 1
      <div class="submenu">
         Подменю1
      </div>
   </div>
   <div class="menu-item">
      Меню 2
      <div class="submenu">
         Подменю2
      </div>
   </div>
   <div class="menu-item">
      Меню 3
      <div class="submenu">
         Подменю
      </div>
   </div>
</div>
--> 

<script>
/*
   document.getElementById('nav').onmouseover= function(event) 
   {
      var target = event.target; // где был клик?
      if (target.className == 'menu-item') 
      {
         var s=target.getElementsByClassName('submenu');
         closeMenu();
         s[0].style.display='block';
      }
   }
   
   function closeMenu()
   {
      var menu=document.getElementById('nav');
      var subm=document.getElementsByClassName('submenu');
      for (var i=0; i<subm.length; i++) 
      {
         subm[i].style.display="none";
      }
   }
   
   document.onmousemove=function(event) 
   {
      var target = event.target; // где был клик?
      console.log(event.target);
      if (target.className!='menu-item' && target.className!='submenu') 
      {
         closeMenu();
      }
   }
*/
</script> 







<?php

   
   
   
   
   
   return $Result;
}
// ****************************************************************************
// *                     Отработать пункты новостного меню                    *
// ****************************************************************************
function NewsMenu()
{
   $Result = true;
   echo '<ul>';
   echo '<li>Яндекс-Новости</li>';
   echo '<li>Лига-Новости</li>';
   echo '<li>Столица на онего</li>';
   echo '</ul>';
   return $Result;
}
// ************************************************************ IniMenu.php ***
