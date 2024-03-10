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

- Склонуйте проект у директорію із сервером:
    ```bash
  https://github.com/Kowalski1304/test-task-panda-team.git
- Потім, відкривши з папки проекту консоль, введіть команду для встановлення пакетів Laravel
    ```bash
  composer update
- Створіть базу даних по прикладу .env.example

- Запустіть міграцію
    ```bash
  php artisan migrate
- Запустіть проект
    ```bash
  php artisan serve
- Запустіть schedule, для автоматично запуску команд
    ```bash
  php artisan schedule:work
- Відкрийте сайт у браузері по адресу http://localhost:8000

## Вимоги

- PHP версія 8.1 або вище
- Composer
- MySQL база даних
