# PHP Developer Test

Тестове завдання від Panda Team

## Функціональність

- Реєстрація / логін.
- Стеження за OLX оголошенням.
- Підписка на зміну ціни.
- Надсилання повідомлення на пошту.

### Ускладнення:
- Підтвердження email користувача.

## Установка

- Встановити залежності
    ```bash
  composer install
- Згенерувати ключ проекту
    ```bash
  php artisan key:generate
- Запустити міграцію
    ```bash
  php artisan migrate
- Запустити проект
    ```bash
  php artisan serve
- Запустити schedule, для автоматично запуску команд
    ```bash
  php artisan schedule:work
- Не забудьте створити .env файл

## Вимоги

- PHP версія 8.1 або вище
- Composer
- MySQL база даних
