$(document).ready(function () {
 
  function readImage ( input ) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      // Трассируем загружаемы файл
      // console.log(input.files[0]);
 
      reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
    }
  }
 
  function printMessage(destination, msg) 
  {
    //
    $(destination).removeClass();
    if (msg == 'Успешно!') {
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
 
  // Выполняем чтение файла изображения во временной файл по $FILES
  $('#InputImage').change(function(){
    readImage(this);
  });
  
  
  $('#upload-image').on('submit',(function(e) {
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
  
});
