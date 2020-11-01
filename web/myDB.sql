create table Users (fullName varchar(80),userName varchar(80),password varchar(80),email varchar(80),permissions int,userId serial primary key);


create table Products(productName varchar(80),productImage varchar(50),productDescription varchar(300),productPrice float(2),productId serial primary key);

create table Purchases (purchaseTime timestamptz DEFAULT Now(),userId int references users(userId),productId int references products(productId),quantity int,purchasePrice float(2),purchaseId serial primary key);
