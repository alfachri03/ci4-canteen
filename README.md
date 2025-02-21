# CodeIgniter 4 Application Starter

## PROJECT APLIKASI WARUNG SEDERHANA

project kuliah sederhana dengan tema warung sederhana menggunakan Codeigniter 4

|       #       | name           | version  |
|---------------|----------------|----------|
| Framework     | Codeigniter-4  |    4     |
| Language      | php            |  8.2.4   |
| Database      | Mysql          |  11.4.0  |

## Feature
+ CRUD
+ Cart system
+ Simple login Auth
+ Mysql

## Installation & updates
- Masuk ke menu mysql
~~~~{.bash}
mysql -u root -p
~~~~
- buat database dengan nama dbresto
~~~~{.bash}
mysql> CREATE DATABASE dbresto;
~~~~
- import file sql project
~~~~{.bash}
mysql> use db_name;
mysql> source (project)/app/sql/dbresto.sql;
~~~~
---------------
- jika gagal langsung migrate database
~~~~{.bash}
php spark migrate all
php db:seed SeedAccount
~~~~
## Setup

Jika database selesai running server
~~~~{.bash}
php spark serve
~~~~

