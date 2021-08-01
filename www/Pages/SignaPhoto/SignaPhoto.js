// JavaScript/PHP7/HTML5, EDGE/CHROME                     *** SignaPhoto.js ***

/**
 * Библиотека прикладных функций страницы "Подписать фотографию"                             
 * 
 * v1.0, 13.06.2021        Автор: Труфанов В.Е. 
 * Copyright © 2019 tve    Дата создания: 03.06.2021
 * 
**/ 

// ****************************************************************************
// *             Проверить, есть ли метка в переданном сообщении              *
// ****************************************************************************
function isLabel($mess,$subs,$Before='~~~',$After='~~~')
{
   $Result=false;
   $Label=makeLabel($subs,$Before,$After);
   regex=new RegExp($Label,"u");
   match=regex.exec($mess);
   //alert('$subs='+$subs+'  $mess='+$mess);
   alert('match[0]='+match[0]+'  $Label='+$Label);
   if (match[0]==$Label) $Result=true;
   return $Result;
}
// ****************************************************************************
// *                  Выделить метку для отправляемого сообщения              *
// ****************************************************************************
function makeLabel($subs,$Before='~~~',$After='~~~')
{
   $Result=$Before+$subs+$After;
   return $Result;
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
   '****'+
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
         url: 'ajaLoadPic.php', // скрипт обработчика
         async: false,
         data: formData,         // данные которые мы передаем
         cache: false,           // по POST отключено, но явно уточняем
         contentType: false,     // отключаем, так как тип кодирования задан в форме
         processData: false,     // отключаем, так как передаем файл
         // Отмечаем результат выполнения скрипта по аякс-запросу (успешный или нет)
         success:function(data)
         {
            
            if (isLabel(data,ajSuccessfully)) printMessage('#result',ajSuccessfully)
            else printMessage('#result','Ошибка 1991');
            /*
            $preg = new RegExp("шаблон","u");
            alert('1: '+data);
            alert('2: '+makeLabel(ajSuccessfully));  // 'Успешно!'
            
            text = data;
            $Label=makeLabel(ajSuccessfully);
            regex = new RegExp($Label);
            match = regex.exec(text);
            alert('3: '+match[0]);       
            isLabel(text,ajSuccessfully)
            */
            
            alert('Успешно!');
         },
         // Отмечаем  неуспешное выполнение аякс-запроса по причине:
         // 1) утерян файл скрипта.
         error:function(data){
            // console.log(data);
            printMessage('#result', 'Утерян файл скрипта!');
         }
      });
      // alert('После');
   }));
}


// 
  function printMessage(destination, msg) 
  {
    //
    $(destination).removeClass();
    if (msg == ajSuccessfully) {
      $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
    }
    else if (msg == 'Большой файл!') {
      $(destination).addClass('alert alert-danger').text('Ошибка при загрузке, большой размер файла.');
    }
    else if (msg == 'Не изображение!') {
      $(destination).addClass('alert alert-danger').text('Неверный тип файла изображения.');
    }
    else if (msg == 'Ошибка переброса!') {
      $(destination).addClass('alert alert-danger').text('Ошибка при перемещении файла на сервер.');
    }
    // Выводим сообщение при всех прочих ошибках
    else {
      $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
    }
 
  }


// ****************************************************************************
// *          Обработать разметку страницы, подключить аякс-сценарии          *
// *                    по завершению загрузки страницы                       *
// ****************************************************************************
/*
$(document).ready(function () 
{
  // Изменяем заголовок 'input file'
  //$('#ipfLoadPic').inputFileText({text: 'Выбрать изображение'});
  // Выполняем чтение файла изображения во временной файл по $FILES (по клику)
  $('#ipfLoadPic').change(function(){
    readImage(this,'parameter');
  });
  
  //
  $('#frmLoadPic').on('submit',(function(e) {
    e.preventDefault();
 
    var formData = new FormData(this);
 
    $.ajax({
      type:'POST', // Тип запроса
      url: 'Handler.php', // Скрипт обработчика
      data: formData, // Данные которые мы передаем
      cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
      contentType: false, // Тип кодирования данных мы задали в форме, это отключим
      processData: false, // Отключаем, так как передаем файл
      // Отмечаем результат выполнения скрипта по аякс-запросу (успешный или нет)
      success:function(data){
        printMessage('#result', data);
      },
      // Отмечаем  неуспешное выполнение аякс-запроса по причине:
      //   1) утерян файл скрипта.
      error:function(data){
        console.log(data);
        printMessage('#result', 'Утерян файл скрипта!');
      }
    });
  }));
  
  
  //
  
});
*/

function readImage(input,actstr) 
{
  // Если выбран и загружен во временное хранилище хотя бы один файл
  if (input.files && input.files[0]) 
  {
    // Трассируем параметры загружаемого файла
    /*
    console.log(input.files[0]);
    console.log(input.files[0].name);
    console.log(input.files[0].lastModified);
    console.log(input.files[0].type);
    console.log(input.files[0].size+' байт');
    */
    // Создаем объект чтения содержимого файла, 
    // хранящиеся на компьютере пользователя
    // (асинхронно, чтобы не тормозить браузер)
    var reader = new FileReader();
    // Прицепляем замену существующего изображения на загруженное
    // при успешном завершении загрузки страницы
    reader.onload = function (e) 
    {
      $('#pic').attr('src', e.target.result);
    }
    // Прицепляем сообщение об ошибке при ошибке загрузки
    reader.onerror = function(event) 
    {
      printMessage('#result', 'Ошибка "ONERROR" в readImage!');
      // reader.abort(); 
    };
    // Запускаем процесс чтения изображения 
    reader.readAsDataURL(input.files[0]);
  }
  else
  {
    printMessage('#result', 'Ошибка "NOT INPUT" readImage!');
  }
}

// ********************************************************** SignaPhoto.js ***
