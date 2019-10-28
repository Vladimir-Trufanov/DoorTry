<?php                                           
// PHP7/HTML5, EDGE/CHROME                               *** DebugTimer.php ***

// ****************************************************************************
// * doortry.ru                                                    DebugTimer *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2018
// Copyright © 2018 tve                              Посл.изменение: 27.10.2019
?>

  <script>  
        function timer()   
        {   
            $.ajax({   
                url: "timer.php",   
                cache: false,   
                success: function(html){   
                    $("#content").html(html);   
                }   
            });   
        }   
       
        $(document).ready(function(){   
            timer();   
            setInterval('timer()',1000);   
        });   
    </script>

<?php
// ********************************************************* DebugTimer.php *** 
