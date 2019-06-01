<?php                                           
// PHP7/HTML5, EDGE/CHROME                  *** Normativy_po_otopleniyu.php ***

// ****************************************************************************
// * KwinFlat.ru            Подключить вступление по соответствующей странице *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.02.2018
// Copyright © 2018 tve                              Посл.изменение: 31.05.2018

// "льготы по коммунальным услугам пенсионерам" 
//                       'Normativy_po_otopleniyu' = 'Main.php?Com=refNormotop'

function seot()
{
    echo "<title>Нормативы потребления коммунальной услуги по отоплению</title>";
    echo "<meta name=\"description\" content=\"Для расчета льготы в оплате коммунальной услуги по отоплению учитывается норма потребления этой услуги, которая зависит от этажности дома, года постройки, категории дома и продолжительности отопительного периода\">";
    echo "<meta name=\"keywords\" content=\"льготы на оплату коммунальной услуги по отоплению ветеранам труда и другим пенсионерам, как рассчитать льготы по ЖКХ ветеранам труда\">";
}

function макеh1()
{
    echo "<h1 id=\"notesh1\">Как влияют нормативы на расчет льгот?</h1>";
}

function intro()
{
?>
Нормативы отопления, как и других коммунальных услуг, играют существенную роль, когда возникают вопросы: как рассчитать льготы или как их проверить. В соответствии с Российским законодательством и региональными законодательными актами для большинства категорий величина денежной компенсации не может превосходить 50% норматива потребления коммунальной услуги.

<p class="lettrule">
Например, льгота для Ветерана труда или инвалида определяется от доли объема коммунальной услуги, но не может превосходить норматива потребления; для инвалида войны мера социальной поддержки также не может превосходить половины стоимости норматива, но распространяется на всех членов семьи (такой же порядок действует, если в семье ребенок-инвалид). 
</p>
<p>Говоря о нормативе потребления отопления, следует отметить, что он зависит от различных факторов и региона проживания (они различны в Краснодарском крае и в Республике Карелия). Так в Республике Карелия величина норматива определяется по продолжительности отопительного периода (8 и 9 месяцев), этажности дома, году его постройки и категории дома (материала из которого изготовлены стены дома).
</p>
<p>
Для примера возьмем квартиру с тремя проживающими, включая ребенка – инвалида. По обстоятельствам проживания семья девочки состоит из 2 человек: Сидоренко И.М. и Анастасии. По Федеральному закону от 12.01.1995 N 5-ФЗ "О ветеранах" правило расчета льготы на коммунальную услугу (в нашем случае - отопление) по категории <span class="lettkvin">"семьи с детьми-инвалидами"</span> сформулировано как <span class="lettrule">"на семью по доле объема не более норматива компенсация 50%"</span>. А для Фотеевой Н.П., как <span class="lettkvin">ветерана труда РФ</span>, правило расчета льготы звучит <span class="lettrule">"по доле объема не более норматива компенсация 50%"</span>.
</p>
<img class="figl" src="../Examples/Images/Otoplenie_kv.gif" width="40%" alt="kvartira_primera_po_otopleniyu"/>
<img class="figr" src="../Examples/Images/Otoplenie_nach.gif" width="40%" alt="Otoplenie_nach"/>
<p>
Норматив отопления в 6-этажном доме с годом постройки более 1999 года включительно со стенами из камня или кирпича и отопительным периодом 8 месяцев составляет  0.02699 Гкал на 1 кв.м общей площади. Так как площадь квартиры составляет 52.3 кв.м и в ней проживает три человека, то доля одного проживающего составляет 17.433 кв.м = 52.3 кв.м / 3. Отсюда определяем норму отопления на 1 человека в данной квартире 0.02699 Гкал * 17.433 = 0.471 Гкал. По факту потреблено на одного человека 0.412 Гкал (то есть меньше нормы). В этом случае льготная компенсация на ветерана труда РФ Фотееву Н.П. составит 418.25 руб. = 2030.36 руб. * 0.412 * 0.5, а на семью Анастасии составит 836.51 руб. = 2030.36 руб. * 0.412 * 2 (человека) * 0.5.
</p>
<img class="figr" src="../Examples/Images/Otoplenie_nach2.gif" width="40%" alt="Otoplenie_nach2"/>
<p>
 В данной квартире в более холодный период может возникнуть другая ситуация, когда фактический объем отопления превысит нормативный, например, составит 1.958 Гкал. Здесь фактическое потребление на одного человека составляет 0.653 Гкал, но льгота будет рассчитываться от нормативного значения и на ветерана труда РФ составит 478.15 руб. = 2030.36 руб. * 0.471 * 0.5, а для семьи с детьми-инвалидами 956.30 руб. = 2030.36 руб. * 0.471 * 2 (человека) * 0.5.
</p>
<div class="newp">
<h2>
Как определить отопительный период?
</h2>
<p>
Отопительный период определён в <a href="http://www.consultant.ru/document/cons_doc_LAW_114247/">"Правилах предоставления коммунальных услуг собственникам и пользователям помещений в многоквартирных домах и жилых домов" составляющих основу Постановления Правительства РФ от 06.05.2011 №354 (ред. от 27.03.2018)</a>.
</p>
В абзацах пункте 5 статьи «II. Условия предоставления коммунальных услуг» сказано:
<p>
«<span class="lettrule">Если тепловая энергия для нужд отопления помещений подается во внутридомовые инженерные системы по централизованным сетям инженерно-технического обеспечения, то исполнитель начинает и заканчивает отопительный период в сроки, установленные уполномоченным органом. Отопительный период должен начинаться не позднее и заканчиваться не ранее дня, следующего за днем окончания 5-дневного периода, в течение которого соответственно среднесуточная температура наружного воздуха ниже 8 градусов Цельсия или среднесуточная температура наружного воздуха выше 8 градусов Цельсия</span>.
</p>      
<p>
<span class="lettrule"> Если при отсутствии централизованного теплоснабжения производство и предоставление исполнителем коммунальной услуги по отоплению осуществляются с использованием оборудования, входящего в состав общего имущества собственников помещений в многоквартирном доме, то условия определения даты начала и (или) окончания отопительного периода и (или) дата начала и (или) окончания отопительного периода устанавливаются решением собственников помещений в многоквартирном доме или собственниками жилых домов. В случае непринятия такого решения собственниками помещений в многоквартирном доме или собственниками жилых домов отопительный период начинается и заканчивается в установленные уполномоченным органом сроки начала и окончания отопительного периода при подаче тепловой энергии для нужд отопления помещений во внутридомовые инженерные системы по централизованным сетям инженерно-технического обеспечения</span>.»
</p>
<p>
 Как правило, при использовании индивидуальных приборов учета теплоэнергии платежи за отопление осуществляются в течение отопительного периода. В остальных случаях решение как платить: в течение отопительного сезона или круглый год принимается уполномоченным органом региональной власти.
</p>
</div>

<div class="newp">
<h2>
Какие условия в жилых помещениях считаются комфортными для проживания?
</h2>
<p>
Допустимыми значениями температуры для жилых помещений считаются значения в диапазоне плюс 18-25 градусов Цельсия в зависимости от вида помещения.
</p>
<p>
 Полная библиография нормативных документов по условиям предоставления коммунальных услуг (в том числе и отопления) изложена в <a href="http://docs.cntd.ru/document/1200111495/">«ГОСТ Р 51617-2014 Услуги жилищно-коммунального хозяйства и управления многоквартирными домами КОММУНАЛЬНЫЕ УСЛУГИ Общие требования»</a>. 
</p>
<p>
Каковы должны быть условия проживания в жилых помещениях, прописано в <a href="http://docs.cntd.ru/document/gost-30494-2011/">«ГОСТ 30494-2011. Здания жилые и общественные. Параметры микроклимата в помещениях»</a>.
</p>
<p>
 В частности, в этом стандарте указано следующее:
</p>
<p>
4 Параметры микроклимата
</p>
<p>
4.1 В помещениях жилых и общественных зданий следует обеспечивать оптимальные или допустимые параметры микроклимата в обслуживаемой зоне.
</p>
<p>
4.2 Параметры, характеризующие микроклимат в жилых и общественных помещениях:
</p>
<p>
- температура воздуха;
</p>
<p>
- скорость движения воздуха;
</p>
<p>
- относительная влажность воздуха;
</p>
<p>
- результирующая температура помещения
<span class="lettkvin">(то есть сочетание температур внутренних поверхностей и воздуха помещения, в котором человек путем радиации и конвекции отдает столько же теплоты, что и в окружающей среде с одинаковой температурой воздуха и окружающих поверхностей, при одинаковой влажности и скорости движения воздуха)</span>;
</p>
</div>

<?php                                           
}

// ******************************************** Normativy_po_otopleniyu.php *** 
