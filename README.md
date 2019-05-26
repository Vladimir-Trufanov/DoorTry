# DoorTry
Простой принцип программирования и общая обработка ошибок/исключений

В DoorTryer заложены все типы ошибок: 
через установленный модуль от set_error_handler обрабатывается большинство ошибок, 
остальные ошибки вылавливаются после завершения работы сценария через register_shutdown_function, через try-catch-error обрабатываются исключения
***
## содержание
### [1. Общие переменные сайтового сценария](#obshchie-peremennye-sajtovogo-scenariya)
### [2. Необработанные ошибки и комментарии](#neobrabotannye-oshibki)
***
###### obshchie-peremennye-sajtovogo-scenariya
### 1. Общие переменные сайтового сценария

    $SiteRoot   =$_SERVER['DOCUMENT_ROOT'];        // Корневой каталог сайта
    $SiteAbove  =iGetAbove($SiteRoot);             // Надсайтовый каталог
    $SiteHost   =iGetAbove($SiteAbove);            // Каталог хостинга
    $SiteDevice =prown\getSiteDevice();            // 'Computer','Mobile','Tablet'
    $UserName   =$_COOKIE['PersName'] ?? "Гость";  // Логин авторизованного посетителя 
    $Uagent     =$_SERVER['HTTP_USER_AGENT'];      // HTTP_USER_AGEN
###### [к содержанию](#%D1%81%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5)
******
###### neobrabotannye-oshibki 
### 2. Необработанные ошибки и комментарии

**Array to string conversion**  
**Должна была быть строковая переменная, а оказался массив**  

    File: C:\TPhpPrown\ViewGlobal.php Line: 53  
    E_NOTICE [HND]
***
**syntax error, unexpected 'else'**
**Неожиданно встетился else**

    File: C:\TPhpPrown\ViewGlobal.php Line: 83  
    E_PARSE [SHT]
**Причины:**
а) может "else" не предшествовала фигурная скобка или двоеточие, закрывающие действие условия "if" или "eise if".
###### [к содержанию](#%D1%81%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5)
***
