Это просто упражнение по созданию API при помощи фреймворка Laravel2
При скачивании, не забудьте установить зависимости:

```bash
composer install
```

После этого следует скопировать .env.example в .env

```bash
cp .env.example .env
```

Сгенерируйте ключ

```bash
php artisan key:generate
```

Позже, сделайте ссылку на хранилище
```bash
php artisan storage:link
```


После этого можно сделать миграцию (желательно с сидером)

```bash
php artisan migrate --seed
```
или

```bash
php artisan migrate:fresh --seed
```

Для запуска используйте эти команды:

```bash
php artisan serve # Это запустит обычный отладочный сервер Laravel
```

Для работы с внешним сайтом (вебхук), используете вот этот сайт: https://github.com/Bakamashine/two_server_2module
После установки, запустите его такой командой:

```bash
php -S localhost:9000
```
