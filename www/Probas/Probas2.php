<?php
?>
<script>

function BeginNews()
{
   var vinBeginNews='Начало загрузки новостей';
   window.performance.mark(vinBeginNews);
}

function EndNews()
{
   var vinEndNews='Завершение загрузки новостей';
   window.performance.mark(vinEndNews);
}

window.onload = function() 
{
   var vinBeginNews='Начало загрузки новостей';
   var vinEndNews='Завершение загрузки новостей';
   console.log('say onload');
   // Фиксируем завершение загрузки новостей
   EndNews();
   
   console.log('Время загрузки страницы сайта: '+window.performance.now());
   
   // Фиксируем время загрузки новостей
   window.performance.measure('mark',vinBeginNews,vinEndNews);
   var TimeNews = window.performance.getEntriesByType('mark');
   console.log(TimeNews);
  
   //window.performance.measure('Mess1','navigationStart','domainLookupStart');
   window.performance.measure(vinEndNews,'navigationStart',vinEndNews);
   //var TimeNews = window.performance.getEntriesByType('Mess1');
   //console.log(TimeNews);
   console.log(window.performance.getEntriesByName(vinEndNews)[0]);
   
   console.log('Hello!'); 
};
console.log('say current'); 
</script>

<?php
// <!-- -->
// ********************************************************* iHtmlBegin.php ***
