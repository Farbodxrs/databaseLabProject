create table addresses_log
(
    id int auto_increment
        primary key,
    op_type varchar(30) null,
    op_time timestamp default current_timestamp() not null on update current_timestamp(),
    address_id int null
);

create table bikes
(
    id int auto_increment
        primary key,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    national_code varchar(255) not null,
    phone varchar(255) null
);

create table customers_log
(
    id int auto_increment
        primary key,
    op_type varchar(30) null,
    op_time timestamp default current_timestamp() not null on update current_timestamp(),
    customer_id int null
);

create table foods
(
    id int auto_increment
        primary key,
    name varchar(255) not null,
    price int not null,
    is_active tinyint(1) default 1 not null
);

create table purchased
(
    id int auto_increment
        primary key,
    product_name varchar(255) not null,
    shop_name varchar(255) null,
    price int not null,
    created_at timestamp default current_timestamp() not null on update current_timestamp(),
    updated_at timestamp null
);

create table shops
(
    id int auto_increment
        primary key,
    name varchar(255) not null,
    is_active tinyint(1) default 1 not null
);

create table shop_products
(
    id int auto_increment
        primary key,
    name varchar(255) not null,
    price int not null,
    shop_id int null,
    constraint shop_products_ibfk_1
        foreign key (shop_id) references shops (id)
);

create index shop_id
    on shop_products (shop_id);

create table users
(
    id int auto_increment
        primary key,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    national_code varchar(255) not null,
    mobile_phone varchar(255) not null,
    date_of_birth date not null,
    created_at date null,
    updated_at date null
);

create table addresses
(
    id int auto_increment
        primary key,
    user_id int not null,
    name varchar(255) null,
    address text not null,
    phone varchar(255) null,
    constraint addresses_ibfk_1
        foreign key (user_id) references users (id)
);

create index user_id
    on addresses (user_id);

create definer = root@`%` trigger ad_addresses
    after delete
    on addresses
    for each row
    BEGIN
      INSERT INTO addresses_log (op_type,op_time,address_id)
      VALUES('deleted address',NOW(),OLD.id);
    END;

create definer = root@`%` trigger ai_addresses
    after insert
    on addresses
    for each row
    BEGIN
      INSERT INTO addresses_log (op_type,op_time,address_id)
      VALUES('added address',NOW(),NEW.id);
    END;

create definer = root@`%` trigger au_addresses
    after update
    on addresses
    for each row
    BEGIN
      INSERT INTO addresses_log (op_type,op_time,address_id)
      VALUES('updated address',NOW(),NEW.id);
    END;

create table factors
(
    id int auto_increment
        primary key,
    user_id int null,
    address text null,
    bike_id int null,
    created_at timestamp default current_timestamp() not null on update current_timestamp(),
    updated_at timestamp default '0000-00-00 00:00:00' not null,
    constraint factors_ibfk_1
        foreign key (user_id) references users (id),
    constraint factors_ibfk_2
        foreign key (bike_id) references bikes (id)
);

create table factor_receipt
(
    id int auto_increment
        primary key,
    factor_id int not null,
    price int not null,
    food_name varchar(255) not null,
    constraint factor_receipt_ibfk_1
        foreign key (factor_id) references factors (id)
);

create index factor_id
    on factor_receipt (factor_id);

create index bike_id
    on factors (bike_id);

create index user_id
    on factors (user_id);

create definer = root@`%` trigger ad_customers
    after delete
    on users
    for each row
    BEGIN
      INSERT INTO customers_log (op_type,op_time,customer_id)
      VALUES('deleted user',NOW(),OLD.id);
    END;

create definer = root@`%` trigger ai_customers
    after insert
    on users
    for each row
    BEGIN
      INSERT INTO customers_log (op_type,op_time,customer_id)
      VALUES('added new user',NOW(),NEW.id);
    END;

create definer = root@`%` trigger au_customers
    after update
    on users
    for each row
    BEGIN
    INSERT INTO customers_log (op_type, op_time, customer_id)
    VALUES ('updated user', NOW(), NEW.id);
END;

