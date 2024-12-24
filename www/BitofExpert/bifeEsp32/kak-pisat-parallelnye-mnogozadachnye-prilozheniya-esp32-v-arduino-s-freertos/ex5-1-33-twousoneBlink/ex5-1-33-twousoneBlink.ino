/** Arduino-Esp32-CAM                        *** ex5-1-33-twousoneBlink.ino ***
 * 
 *           Базовый пример параллельной работы двух задач в ESP32 board 5.1.33
 *                                        (на контроллере AI-Thinker ESP32-CAM)
 * 
 * v1.0, 13.10.2024                                   Автор:      Труфанов В.Е.
 * Copyright © 2024 tve                               Дата создания: 13.10.2024
 * 
 *    В примере запускаются две задачи, которые работают одновременно во 
 * внутренней операционной системе FreeRTOS для ESP32. Первая задача мигает 
 * контрольным светодиодом, а вторая выводит в последовательный порт традиционный 
 * текст "Всем привет!".
 * 
**/

#define LED_BUILTIN 33 // определили пин контрольного светодиода

// ****************************************************************************
// *          Выполнить настройки один раз при нажатии кнопки reset           *
// *                      или при включении питания платы                     *
// ****************************************************************************
void setup() 
{
   pinMode (LED_BUILTIN, OUTPUT);
   Serial.begin (115200);

   // Определяем дополнительную задачу
   xTaskCreatePinnedToCore (
      loop2,          // название функции, которая будет запускаться, как параллельная задача
      "Всем привет!", // название задачи
      1000,           // размер стека в байтах. Задача будет использовать этот объем памяти, когда 
                      // ей потребуется сохранить временные переменные и результаты. Для задач с 
                      // большим объемом памяти потребуется больший размер стека.
      NULL,           // указатель на параметр, который будет передан новой задаче. 
                      // NULL, если параметр не передаётся.
      0,              // приоритет задачи
      NULL,           // дескриптор или указатель на задачу. Его можно использовать для вызова задачи.
                      // Если это не требуется, то NULL.
      0               // идентификатор ядра процессора, на котором требуется запустить задачу. 
                      // У ESP32 есть два ядра, обозначенные как 0 и 1.
   );
}
// ****************************************************************************
// *           Циклически выполнять первую задачу мигания светодиодом         *
// ****************************************************************************
void loop() 
{
  digitalWrite (LED_BUILTIN, HIGH); 
  delay (1000);
  digitalWrite (LED_BUILTIN, LOW); 
  delay (1000);  
}
// ****************************************************************************
// *  Выполнять передачу текста в последовательный порт в бесконечном цикле   *
// *      (поочерёдный полусекундный вывод в com-порт слов "Всем привет!")    *
// *                                                                          *
// * !!! Если задача завершится (не будет циклится),контроллер перезагрузится *
// ****************************************************************************
void loop2 (void* pvParameters) 
{
  while (1) 
  {
    Serial.print ("Всем ");
    delay (500); 
    Serial.println ("привет!");
    delay (500); 
  }
}

// ********************************************* ex5-1-33-twousoneBlink.ino ***