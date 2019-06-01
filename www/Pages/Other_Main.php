<?php                                           
// PHP7/HTML5, EDGE/CHROME                               *** Other_Main.php ***

// ****************************************************************************
// * KwinFlat.ru                    Подключить основные seo-теги и вступление *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.02.2018
// Copyright © 2018 tve                              Посл.изменение: 13.05.2018

function seot()
{
    echo "<title>Начислить льготы по жилищно-коммунальным услугам</title>";
    echo "<meta name=\"description\" content=\"Показать правильный расчет ежемесячной денежной компенсации по жилищно-коммунальным услугам и проверить начисление льготы ветеранам, инвалидам и другим гражданам\">";
    echo "<meta name=\"keywords\" content=\"рассчитать льготу, определить меру социальной поддержки, проверить льготу по ЖКУ, начислить ежемесячную денежную компенсацию \">";
}

function макеh1()
{
    echo "<h1 id=\"notesh1\">Как проверить расчет льгот по ЖКУ?</h1>";
}

function intro()
{
?>
Ответ на вопрос - в этой программе. Наш сайт показывает, как рассчитываются денежные компенсации по жилищно-коммунальным услугам для всех категорий граждан, имеющих право на них. Также программа помогает проверить расчет, который представлен в извещениях-квитанциях.  
<p>
На сайте <span class="lettkvin">"Kwinflat - близкий всем!"</span> можно выбрать реальные услуги ЖКХ, которые оказываются по вашему дому и видны в платежных документах. Можно повторить расчет начислений, набрать состав проживающих в квартире и получить соответствующий расчет льгот. Эти данные сохраняются до следующего обращения к программе - набирать их повторно не придется. При изменении тарифов или объемов услуг нужно внести только другие значения и получить новый расчет. 
</p>
<p>
В начальном запуске приводится пример расчета льготы по четырем типовым услугам: содержанию общего имущества, холодному водоснабжению, общедомовым нуждам на холодное водоснабжение и взносу на капитальный ремонт. Расчет выполняется по двум категориям проживающих получателей льгот: ветерана труда Российской Федерации и жителя блокадного Ленинграда, проживающих вместе с внучкой втроем в квартире площадью 52.3 кв.м.   
</p>
<img class="figl" src="../Examples/Images/201-118_kv.gif" alt="kvartira_veterana_i_blokadnika" width="448" height="215"/>
<p>
<span class="lettkvin">В зависимости от фактического набора оказанных жилищно-коммунальных услуг (ЖКУ), количества проживающих в конкретной квартире и характеристик квартиры можно настроить программу сайта и пересчитать величину компенсации.</span>
</p>
<p>
Как в данном случае рассчитывается ежемесячная денежная компенсация.
</p>
<p>
<span class="lettkvin">1.</span> Для жилищной услуги <span class="lettrule">"содержание общего имущества"</span> правило расчета у <span class="lettkvin">ветерана труда РФ</span> звучит следующим образом: <span class="lettrule">"по доле площади не более норматива компенсация 50%"</span>. Делаем расчет. В квартире проживает три человека, площадь квартиры равняется 52.3 кв.м. Доля составляет 17.433 кв.м = 52.3 кв.м / 3. Тариф на услугу по договору составляет 22.92 руб. Отсюда определяем начисление по услуге 1198.72 = 22.92 * 52.3. Но, так как было произведено доначисление в сумме 214.17 рублей за прошлые периоды, то льгота также должна быть увеличена, и в ней должно быть это учтено. Для этого считаем окончательное начисление и переопределяем тариф для расчета льготы. Начисление: 1412.89 = 1198.72 + 214.17. Тариф для льготы: 27.02 руб. = 1412.89 руб. / 52.3 кв.м. В квартире проживает 3 человека, поэтому  норма площади на 1 человека составляет 21 кв.м. Так как доля площади меньше норматива, то величина льготы (меры социальной поддержки) определяется по нормативу и составляет 235.52 руб. = 27.02 руб. * 17.433 * 0.5.     
</p>
<p>
 Для <span class="lettkvin">жителя блокадного Ленинграда</span> правило расчета льготы по жилищной услуге звучит <span class="lettrule">"на семью по доле площади компенсация 50%"</span>. На вкладке "Дом и квартира" указано, что семья состоит из двух человек, поэтому расчет по <span class="lettrule">содержанию общего имущества</span>  выполняется так: общая доля площади равняется  34.866 (кв.м) = 17.433 * 2; соответственно денежная компенсация будет 471.04 руб. = 27.02 руб. * 34.866 * 0.5.
</p>  
<img class="figr" src="../Examples/Images/201-118_nach.gif" alt="lgoty_veterana_i_blokadnika" width="495" height="313"/>
<p>
<span class="lettkvin">2.</span> <span class="lettrule">"Холодное водоснабжение"</span> - коммунальная услуга. В этом случае для льготной категории граждан <span class="lettrule">ветеран труда </span> используется правило <span class="lettrule">"по доле объема не более норматива компенсация 50%"</span>. Для благоустроенной квартиры с душем и ванной норма расхода составляет 6.933 кубических метра на человека.  
</p>
<?php                                           
}
// ********************************************************* Other_Main.php *** 
