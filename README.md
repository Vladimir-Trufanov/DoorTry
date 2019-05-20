# DoorTry
Простой принцип программирования и общая обработка ошибок/исключений

В DoorTryer заложены все типы ошибок: 
через установленный модуль от set_error_handler обрабатывается большинство ошибок, 
остальные ошибки вылавливаются после завершения работы сценария через register_shutdown_function, через try-catch-error обрабатываются исключения

<!--stackedit_data:
eyJoaXN0b3J5IjpbLTI4MDEyNTc5NSwxMDA1MjQwODU2LDEyMD
Y0MjAyNzAsLTMzODE3MDUyOF19
-->