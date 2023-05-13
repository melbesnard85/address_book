# Address book app

## Database configration

### Please set env.php file in config folder

```
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'addressbook');
```

### Please migrate and seed db using .sql file

- Create db and migrate tables using addressbook_migration.sql
- Seed test data using addressbook_db_seed.sql
