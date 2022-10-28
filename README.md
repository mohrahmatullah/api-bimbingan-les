# Requirements
```
	PHP 7.4
	Laravel 8
	Mysql 5.7.36
```


# Installation

1. Clone this repo

```
git clone https://github.com/mohrahmatullah/api-bimbingan-les.git
```


2. Setup

```
$ cd ukur-test-backend-rest-api
$ composer install
$ php artisan key:generate
$ copy .env.example .env

put database credentials in .env file
```

3. Migrate and insert records

```
$ php artisan migrate --seed
```

atau bisa import database dari folder
```
	sql/api-bimbingan-les.sql
```

4. Insomnia

```
	- Silahkan Import file json insomnia ke aplikasi insomnia untuk melihat formatnya insomnia collection
	- filenya ada di folder
	
	insomnia/insomnia..

```