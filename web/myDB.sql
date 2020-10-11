create table Users (fullName varchar(80),userName varchar(80) primary key,password varchar(80),email varchar(80),permissions int,userId int UNIQUE
);
create table Products(productName varchar(80) primary key,productImage varchar(50),productDescription varchar(300),productId int UNIQUE,productPrice float(2)
);

create table Purchases (purchaseTime timestamptz,purchaseId int primary key,userId int references users(userId),productId int references products(productId),quantity int,purchasePrice float(2)
);