-- ----Create Database ----
DROP DATABASE IF EXISTS db_smart_led_system;
CREATE DATABASE db_smart_led_system;

use db_smart_led_system;
-- ---- End Create Database ----

-- ---- Create Tables -----
drop table if exists app_user;
create table app_user(
	id int not null auto_increment,
    username varchar(50) not null unique,
    password varchar(50) not null,
    name varchar(200),
    sex char(1),
    primary key(id)
);

-- table order contains_product
drop table if exists led;
create table led(
	id int not null auto_increment,
    status char(1) not null,
    description varchar(1000),
    wattage int,
    mode varchar(20),
    user_id int not null,
    primary key(id)
);

drop table if exists used_energy;
create table used_energy(
    id int not null auto_increment,
    led_id int not null,
    enrgy decimal(12,2),
    time datetime,
    primary key(id, led_id)
);

drop table if exists history;
create table history(
    id int not null auto_increment,
    led_id int not null,
    action char(1),
    time datetime,
    primary key(id, led_id)
);

drop table if exists sensor;
create table sensor(
    id int not null auto_increment,
    type varchar(20),
    user_id int not null,
    primary key(id)
);

drop table if exists sensor_control_led;
create table sensor_control_led(
    sensor_id int not null,
    led_id int not null
);

ALTER TABLE led
ADD FOREIGN KEY (user_id) REFERENCES app_user(id);

ALTER TABLE used_energy
ADD FOREIGN KEY (led_id) REFERENCES led(id);

ALTER TABLE history
ADD FOREIGN KEY (led_id) REFERENCES led(id);

ALTER TABLE sensor_control_led
ADD FOREIGN KEY (led_id) REFERENCES led(id);

ALTER TABLE sensor_control_led
ADD FOREIGN KEY (sensor_id) REFERENCES sensor(id);

ALTER TABLE sensor
ADD FOREIGN KEY (user_id) REFERENCES app_user(id);