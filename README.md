SQL TO CREATE TABLES FOR THE DATABASE

{

CREATE TABLE dados (
    id SERIAL PRIMARY KEY,
    data DATE NOT NULL,
    valor NUMERIC(10, 2) NOT NULL
);

}

to see logs in real time

tail -f C:/xampp-new/php/logs/php_error_log