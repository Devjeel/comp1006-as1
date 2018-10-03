# comp1006-as1
The goal is to make basic website that works like Kijiji and eBay where user can post Ad for product and can see posted products. 
other goal is to make entry in WILD-CARD.   

Link to live server - <a href="http://aws.computerstudi.es/~gc200395854/as1/eBuyForm.php"> Click Here !!</a>

Sudent ID -<strong> 200395854</strong>

# MySQL Commands 
create table accounts
(
name varchar(60) not null,
address varchar(120) not null,
phone varchar(15) not null,
gender varchar(20) not null,
productName varchar(30) not null,
productPrice varchar(10) not null
);

create table gender_list
(
gender varchar(20)
);
