// JavaScript/PHP7/HTML5, EDGE/CHROME                     *** SignaPhoto.js ***

/**
 * Библиотека прикладных функций страницы "Подписать фотографию"                             
 * 
 * v1.1, 04.08.2021        Автор: Труфанов В.Е. 
 * Copyright © 2019 tve    Дата создания: 03.06.2021
 * 
**/ 

// ****************************************************************************
// *                          Выделить сообщение из метки                     *
// ****************************************************************************
function freeLabel($subs,$Before='~~~',$After='~~~')
{
   let regex=new RegExp($Before);
   let p = $subs; p=p.replace(regex,'')
   regex=new RegExp($After);
   p=p.replace(regex,'');
   return p;
}
// ****************************************************************************
// *             Проверить, есть ли метка в переданном сообщении              *
// ****************************************************************************
function isLabel($mess,$subs,$Before='~~~',$After='~~~')
{
   // Формируем метку
   let Label=makeLabel($subs,$Before,$After);
   // Вычисляем результат регулярного выражения
   regex=new RegExp(Label,"u");
   let match=regex.exec($mess);
   // Разбираем результат
   if (match==null) 
   {
      Result=false;
   }
   else if (match[0]==Label)
   {
      Result=true;
   }
   else 
   {
      Result=false;
   }
   return Result;
}
// ****************************************************************************
// *               Сформировать метку из отправляемого сообщения              *
// ****************************************************************************
function makeLabel($subs,$Before='~~~',$After='~~~')
{
   let Result=$Before+$subs+$After;
   return Result;
}
// ****************************************************************************
// *     Обработать клик "Загрузить фотографию для наложения подписи"         *
// ****************************************************************************
function clickLoadPic()
{
   // Обрабатываем клик
   /*
   var elem=document.getElementById('InfoLead');
   elem.innerHTML=
      '1234567890 First_ic <br>'+
      '1234567890 Secondic <br>'+
      '1234567890 Third_ic <br>';
   alert('ProbaLi');
   */
   // Настраиваем #InfoLead на загрузку изображения
   elem=document.getElementById('InfoLead');
   elem.innerHTML=
   '<form id="frmLoadPic" enctype="multipart/form-data">'+
   '<div>'+ 
   '<input id="ipfLoadPic" type="file" name="image">'+
   '</div>'+ 
   '<div>'+ 
   '<input type="submit" value="Загрузить">'+
   '</div>'+ 
   '<div id="result">'+
   'Выберите изображение для нанесения подписи!'+
   '</div>'+
   '</form>';
   // Изменяем заголовок 'input file'
   $('#ipfLoadPic').inputFileText({text: 'Выбрать изображение'});
   // Сворачиваем меню
   $('.js-nav-menu').removeClass('navigation-menu--open');
   // Подключаем вызов загрузки нового изображения 
   $('#ipfLoadPic').change(function(){
    readImage(this,'parameter');
   });
   // Подключаем обработку и перемещение изображения на сервер
   $('#frmLoadPic').on('submit',(function(e) {
      e.preventDefault();
      formData = new FormData(this);
      //alert('Перед вызовом аякс');
      $.ajax({
         type:'POST',            // тип запроса
         url: 'ajaLoadPic.php',  // скрипт обработчика
         async: false,
         data: formData,         // данные которые мы передаем
         cache: false,           // по POST отключено, но явно уточняем
         contentType: false,     // отключаем, так как тип кодирования задан в форме
         processData: false,     // отключаем, так как передаем файл
         // Отмечаем результат выполнения скрипта по аякс-запросу (успешный или нет)
         success:function(data)
         {
            //console.log(data);
            //alert(data);
            // "Файл превышает максимальный размер"
            if (isLabel(data,ajErrBigFile)) 
            {
               let Label=makeLabel(ajErrBigFile);
               regex=new RegExp(Label,"u");
               let p = data; p=p.replace(regex,'')
               p=freeLabel(p);
               printMessage('#result',ajErrBigFile,p);
            }
            // "Ошибка при перемещении файла на сервер"
            else if (isLabel(data,ajErrMoveServer)) 
            {
               printMessage('#result',ajErrMoveServer);
            }
            // "Неверный тип файла изображения"
            else if (isLabel(data,ajInvalidType)) 
            {
               printMessage('#result',ajInvalidType);
            }
            // "Не установлен массив файлов и не загружены данные"
            else if (isLabel(data,ajNoSetFile)) 
            {
               printMessage('#result',ajNoSetFile);
            }
            // "Файл успешно загружен"
            else if (isLabel(data,ajSuccessfully)) 
            {
               printMessage('#result',ajSuccessfully);
            }
            else 
            {
               printMessage('#result',ajErrorisLabel,data);
            }
            // Перегружаем страницу с очисткой кэша для того, 
            // чтобы обновить изображения и перекинуть кукисы
            // window.location.reload(true);
         },
         // Отмечаем  неуспешное выполнение аякс-запроса по причине:
         // 1) утерян файл скрипта.
         error:function(data){
            printMessage('#result',ajLostScriptFile);
         }
      });
      //alert('После');
   }));
}
// ****************************************************************************
// *             Обработать клик "Наложить подпись на изображение"            *
// ****************************************************************************
function clickMakeStamp()
{
   // Обрабатываем клик
   
   var elem=document.getElementById('InfoLead');
   elem.innerHTML=
      '1234567890 clickMakeStamp <br>'+
      '1234567890 clickMakeStamp <br>'+
      '<div id="result">'+
      '-----------'+
      '</div>';
   
   // Настраиваем #InfoLead на загрузку изображения
   /*
   elem=document.getElementById('InfoLead');
   elem.innerHTML=
   '<form id="frmLoadPic" enctype="multipart/form-data">'+
   '<div>'+ 
   '<input id="ipfLoadPic" type="file" name="image">'+
   '</div>'+ 
   '<div>'+ 
   '<input type="submit" value="Загрузить">'+
   '</div>'+ 
   '</form>';
   */
   // Сворачиваем меню
   $('.js-nav-menu').removeClass('navigation-menu--open');
   
   // Через аякс-запрос делаем подпись на фотографии
   // alert('Перед вызовом аякс');
   $.ajax({
      type:'POST',             // тип запроса
      url: 'ajaMakeStamp.php', // скрипт обработчика
      async: false,
      data: 'formData',        // данные которые мы передаем
      cache: false,            // по POST отключено, но явно уточняем
      contentType: false,      // отключаем, так как тип кодирования задан в форме
      processData: false,      // отключаем, так как передаем файл
      // Отмечаем результат выполнения скрипта по аякс-запросу (успешный или нет)
      success:function(data)
      {
         console.log(data);
         //alert('i '+data);
         // "---Файл превышает максимальный размер"
         if (isLabel(data,ajErrBigFile)) 
         {
            let Label=makeLabel(ajErrBigFile);
            regex=new RegExp(Label,"u");
            let p = data; p=p.replace(regex,'')
            //console.log(p);
            p=freeLabel(p);
            printMessage('#result',ajErrBigFile,p);
         }
         // "На изображение наложена свежая подпись"
         else if (isLabel(data,ajIsFreshStamp)) 
         {
            printMessage('#result',ajIsFreshStamp);
            // Перегружаем страницу с очисткой кэша для того, 
            // чтобы обновить изображения и перекинуть кукисы
            // window.location.reload(true);
            // А здесь - в будущем для каждого пользователя свой сохраняемый 
            // файл в браузере использовать
            // let elemi=document.getElementById('Proba');
            // elemi.innerHTML=
            //   '<img id="proba" src="images/proba.png" alt="Подписанная фотография">';     
         }
         // "Ошибка при наложении подписи на изображение"
         else 
         {
            printMessage('#result',ajErrFreshStamp,data);
         }
      },
      // Отмечаем  неуспешное выполнение аякс-запроса из-за утери файла скрипта
      error:function(data)
      {
         printMessage('#result',ajLostScriptFile);
      }
   });
   //alert('После');
}
// ****************************************************************************
// *                  Заменить указанный div разметки сообщением              *
// ****************************************************************************
function printMessage(destination,msg,mess1='',mess2='') 
{
   // Удаляем фрагмент разметки по указанному классу или идентификатору
   $(destination).removeClass();
   // Файл превышает максимальный размер
   if (msg == ajErrBigFile) {
      $(destination).addClass('alert-danger').text(msg+': '+mess1+' байт!');
   }
   // Ошибка при наложении подписи на изображение
   else if (msg == ajErrFreshStamp) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Ошибка при перемещении файла на сервер
   else if (msg == ajErrMoveServer) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Не найдена метка в переданном сообщении
   else if (msg == ajErrorisLabel) {
      $(destination).addClass('alert-danger').text(msg+': '+mess1+' ['+mess2+']');
   }
   // Ошибка при загрузке файла во временное хранилище
   else if (msg == ajErrTempoFile) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Загрузите изображение для нанесения подписи
   else if (msg == ajInfoLoadImg) {
      $(destination).addClass('alert-info').text(msg+'!');
   }
   // Неверный тип файла изображения
   else if (msg == ajInvalidType) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // На изображение наложена свежая подпись
   else if (msg == ajIsFreshStamp) {
      $(destination).addClass('alert-success').text(msg+'!');
   }
   // Неверный тип файла изображения
   else if (msg == ajLostScriptFile) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Не установлен массив файлов и не загружены данные
   else if (msg == ajNoSetFile) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Не загружен файл во временное хранилище
   else if (msg == ajNoTempoFile) {
      $(destination).addClass('alert-danger').text(msg+'!');
   }
   // Файл успешно загружен
   else if (msg == ajSuccessfully) {
      $(destination).addClass('alert-success').text(msg+'!');
   }
   // Выводим сообщение при всех прочих ошибках
   else {
      $(destination).addClass('alert alert-danger').text('Неучтенная ошибка при выполнении операции.');
   }
}
// ****************************************************************************
// *       Выбрать и скопировать изображение во временное хранилище           *
// ****************************************************************************
function readImage(input,actstr) 
{
   // Если выбран и загружен во временное хранилище хотя бы один файл
   if (input.files && input.files[0]) 
   {
      /*
      // Трассируем параметры загружаемого файла
      console.log(input.files[0]);
      console.log(input.files[0].name);
      console.log(input.files[0].type);
      console.log(input.files[0].lastModified);
      console.log(input.files[0].size+' байт');
      */
      // Определяем расширение файла
      let $imageType=input.files[0].type;
      // Если неверное расширение файла, то выдаем сообщение
      if (!($imageType=='image/jpeg'||$imageType=='image/png'||$imageType=='image/gif')) 
      {
         printMessage('#result',ajInvalidType);
      }
      // Выполняем считывание файла во временное хранилище
      else 
      {
         // Создаем объект чтения содержимого файла, 
         // хранящиеся на компьютере пользователя
         // (асинхронно, чтобы не тормозить браузер)
         var reader = new FileReader();
         // Прицепляем замену существующего изображения на загруженное
         // при успешном завершении загрузки страницы
         reader.onload = function (event) 
         {
            $('#pic').attr('src', event.target.result);
            // Напоминаем о дальнейшем шаге "Загрузите изображение для нанесения подписи"
            printMessage('#result',ajInfoLoadImg);
         }
         // Прицепляем сообщение об ошибке загрузки во временное хранилище
         reader.onerror = function(event) 
         {
            printMessage('#result',ajErrTempoFile);
            reader.abort(); 
         };
         // Запускаем процесс чтения изображения 
         reader.readAsDataURL(input.files[0]);
      }
   }
   // Отмечаем, что не загружен файл во временное хранилище
   else
   {
      printMessage('#result',ajNoTempoFile);
   }
}

// ********************************************************** SignaPhoto.js ***
