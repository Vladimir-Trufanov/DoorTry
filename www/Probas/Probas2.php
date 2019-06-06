<?php
?>
<script>

window.onload = function() 
{
  console.log('say onload'); 
  console.log(window.performance.now());
  window.performance.mark('событие началось');
  window.performance.mark('событие закончилось');

  window.performance.measure('mark', 'событие началось', 'событие закончилось');
  var marks = window.performance.getEntriesByType('mark');
  console.log(marks);
  
  window.performance.measure('Mess1', 'domainLookupStart', 'событие закончилось');
  console.log(window.performance.getEntriesByName('Mess1')[0]);   
  //alert("Hello!");
  
  
};
console.log('say1'); 

</script>

<?php
// <!-- -->
// ********************************************************* iHtmlBegin.php ***
