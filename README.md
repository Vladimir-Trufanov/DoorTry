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
**Неожиданно встретился else**

    File: C:\TPhpPrown\ViewGlobal.php Line: 83  
    E_PARSE [SHT]
**Причины:**
а) может "else" не предшествовала фигурная скобка или двоеточие, закрывающие действие условия "if" или "eise if".
###### [к содержанию](#%D1%81%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5)
***
**setcookie() expects parameter 3 to be integer, string given**  
  

    File: /home/kwinflatht/TPhpPrown/MakeCookie.php  
    Line: 16  
      
    E_WARNING [HND]  
    #0 /home/kwinflatht/kwinflatht.nichost.ru/docs/Inimem.php(28): prown\MakeCookie('BrowEntry', 1, 'integer')
    #1 /home/kwinflatht/kwinflatht.nichost.ru/docs/Main.php(25): require_once('/home/kwinflath...')
    #2 /home/kwinflatht/kwinflatht.nichost.ru/docs/index.php(22): require_once('/home/kwinflath...')
    #3 {main}
MakeCookie на сайте

    <?php namespace prown; 
                                             
    // PHP7/HTML5, EDGE/CHROME                               *** MakeCookie.php ***
    
    // ****************************************************************************
    // *                Установить новое значение COOKIE в браузере               *
    // *             и заменить значение во внутреннем массиве $_COOKIE           *
    // ****************************************************************************
    
    //                                                   Автор:       Труфанов В.Е.
    //                                                   Дата создания:  03.02.2018
    // Copyright © 2018 TVE                              Посл.изменение: 10.02.2018
    
    function MakeCookie($Name,$Value,$Duration=0x6FFFFFFF)
    {
        setcookie($Name,$Value,$Duration);
        //echo "<br>"."MakeCookie_1: ".$Name."=".$Value." [".$Duration."]<br>";
        if (IsSet($_COOKIE[$Name])) 
        {
            $_COOKIE[$Name]=$Value;
            //echo "<br>"."MakeCookie_2: ".$Name."=".$_COOKIE[$Name]." [".$Duration."]<br>";
        }
    }
    
    // ********************************************************* MakeCookie.php ***

Вызов из сценария:

    <?php 
    // PHP7/HTML5, EDGE/CHROME                                   *** Inimem.php ***
    
    // Инициализируем переменные-кукисы
    $c_BrowEntry=prown\MakeCookie('BrowEntry',1,tInt); // Число запросов сайта из браузера
###### [к содержанию](#%D1%81%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5)

***
**Undefined variable: Result**

    File: C:\TPhpPrown\MakeCookie.php  
    Line: 63  
    E_NOTICE [HND]  
    #0 C:\DoorTry\www\Main.php(26): require_once('C:\\DoorTry\\www\\...')
    #1 C:\DoorTry\www\index.php(22): require_once('C:\\DoorTry\\www\\...')
    #2 {main}
В сценарии:

    function MakeCookie($Name,$Value,$Type=tStr,$Init=false,$Duration=0x6FFFFFFF)
    {
       function _MakeCookie($Name,$Value,$Type,$Duration)
       {
          $Result=MakeType($Value,$Type);
          setcookie($Name,$Value,$Duration);
          if (IsSet($_COOKIE[$Name])) $_COOKIE[$Name]=$Value;
          return $Result;
       }
       // Устанавливаем значение, если инициализация
       if ($Init=true) 
       {
          if (!(IsSet($_COOKIE[$Name]))) 
          {
             $Result=_MakeCookie($Name,$Value,$Type,$Duration);
          }
       }
       // Устанавливаем значение в обычном режиме
       else $Result=_MakeCookie($Name,$Value,$Type,$Duration); 
       return $Result;
    }
***
**Cannot redeclare prown\_MakeCookie() (previously declared**   

      
    File: C:\TPhpPrown\MakeCookie.php  
    Line: 56  
      
    E_ERROR [SHT]

В коде:

    function MakeCookie($Name,$Value,$Type=tStr,$Init=false,$Duration=0x6FFFFFFF)
    {
       56) function _MakeCookie($Name,$Value,$Type,$Duration)
       {
          $Result=MakeType($Value,$Type);
          setcookie($Name,$Value,$Duration);
          if (IsSet($_COOKIE[$Name])) $_COOKIE[$Name]=$Value;
          return $Result;
       }
       // Устанавливаем значение, если инициализация
       if ($Init=true) 
       {
          if (!(IsSet($_COOKIE[$Name]))) 
          {
             $Result=_MakeCookie($Name,$Value,$Type,$Duration);
          }
          else $Result=$_COOKIE[$Name];
       }
       // Устанавливаем значение в обычном режиме
       else $Result=_MakeCookie($Name,$Value,$Type,$Duration); 
       return $Result;
    }

###### [к содержанию](#%D1%81%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5)

***






