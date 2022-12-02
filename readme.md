# Address book

## Database configration

### Please set env.php file in config folder

```
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'addressbook');
```

### Please create new db and tables env.php

Create new db using this query
```
    CREATE DATABASE IF NOT EXISTS addressbook;
```
Migrate tables and seed data using sql file(addressbook.sql) in tables