<?php ## AJAX-обработчик состояния флажка
  // Инициируем сессию
  session_start();
?>
     <script>
     alert('ajaks3');
     console.log('ajaks3');
     </script>
<?php
  // Изменяем состояние
  if($_POST['status'] == "true") {
    $_SESSION[$_POST['id']] = 1;
  } else {
    $_SESSION[$_POST['id']] = 0;
  }
