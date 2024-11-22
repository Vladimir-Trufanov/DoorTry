<?php
// PHP7/HTML5, EDGE/CHROME                           *** ReplaceHrefPdf.php ***

// ****************************************************************************
// * Крошки опыта                        Выбрать и обеспечить показ PDF-файла *
// ****************************************************************************

// v1.24, 22.11.2024                                  Автор:      Труфанов В.Е.
// Copyright © 2024 tve                               Дата создания: 29.02.2024

function ReplaceHrefPdf($FileContent,$uDir,$hteg='h4')
{
   // Находим все заголовки 'h4' со ссылками на файлы *.pdf
   $regXml='/<'.$hteg.'\s(.*)\.pdf">(.*)<\/a><\/'.$hteg.'>/uU';
   
   $value=preg_match_all($regXml,$FileContent,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   { 
      $af=$matches[0];
      // Выделяем все заголовки 'h4' со ссылками на файлы *.pdf
      foreach ($af as $matches2)
      {
         $afNames[]=$matches2[0];
      }
      // Проходим по выбранным ссылкам на pdf-файлы  
      foreach ($afNames as $LinePDF)
      {
         // Определяем имя pdf-файла для показа
         $regNXml='/href="(.*\.pdf)/uU';
         $FilePDF=prown\Findes($regNXml,$LinePDF);
         $FilePDF=substr($FilePDF,6);  
         $SpecPDF=$uDir.$FilePDF;  
         // Выделяем заголовок
         $regNXml='/pdf">(.*)<\/a>/uU';
         $regNXml=prown\Findes($regNXml,$LinePDF);
         $TitlePdf=substr($regNXml,5);
         $TitlePdf=substr($TitlePdf,0,strlen($TitlePdf)-4);
         
         if (isDebug=="yes")
         {
            echo '$LinePDF: <br>['.$LinePDF. ']<br>';
            echo '$TitlePdf:<br>['.$TitlePdf.']<br>';
            echo '$FilePDF: <br>['.$FilePDF. ']<br>';
            echo '$SpecPDF: <br>['.$SpecPDF. ']<br>';
         }
         $regNXml='/'.$FilePDF.'/uU'; 
         $FileContent=preg_replace($regNXml,$SpecPDF,$FileContent);
      }
   }
   return $FileContent;
}
// ***************************************************** ReplaceHrefPdf.php ***

