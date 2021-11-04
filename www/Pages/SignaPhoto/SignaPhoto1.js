// JavaScript/PHP7/HTML5, EDGE/CHROME                     *** SignaPhoto1.js ***

/**
 * Библиотека прикладных функций страницы "Подписать фотографию"                             
 * 
 * v1.1, 04.08.2021        Автор: Труфанов В.Е. 
 * Copyright © 2019 tve    Дата создания: 03.06.2021
 * 
**/ 
function thisClick() 
{
   //alert("1thisClick");
   console.log("1thisClick");
   document.getElementById('ipfLoadPic').click();
   
   // Подключаем вызов загрузки нового изображения 
   $('#ipfLoadPic').change(function()
   {
      readImage(this,'parameter');
      document.getElementById('sbfLoadPic').click();
   });
   // Подключаем обработку и перемещение изображения на сервер
   $('#frmLoadPic').on('submit',(function(e) 
   {
      e.preventDefault();
      formData = new FormData(this);
      console.log("2frmLoadPic");
      
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
            //alert('LoadPic.success: '+data);
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
            //alert('LoadPic.error: '+data);
            printMessage('#result',ajLostScriptFile);
         }
      });

      console.log("3ajax");
      
      
   }));

}

// ********************************************************** SignaPhoto.js ***
