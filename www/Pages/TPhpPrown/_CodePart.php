<?php
// PHP7                                                   *** _CodePart.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown            ---------Страница функции Findes - выбрать из строки *
// *                         ------подстроку, соответствующую регулярному выражению *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 04.02.2020

function CodePart($TPhpPrown,$FuncFile,$pattern,$replacement)
{
$FileSpec=$TPhpPrown.'/TPhpPrown/'.$FuncFile;
$FileContent=file_get_contents($FileSpec);
//echo '---<br>'.$FileContent.'<br>---<br>';
// Вырезаем комментарий, который уже представлен
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
};

// <!-- --> ************************************************* _CodePart.php ***
