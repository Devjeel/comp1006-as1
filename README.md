# comp1006-as1
The goal is to make basic website that works like Kijiji and eBay where user can post Ad for product and can see posted products. 
other goal is to make entry in WILD-CARD.   

Link to live server - <a href="http://aws.computerstudi.es/~gc200395854/as1/default.php"> Click Here !!</a>

Sudent ID -<strong> 200395854</strong>

# Functionality 
<ul>
    <li>Full CRUD (create, read, update, delete)</li>
    <li>Proper Error Handling with try-catch and email error notification</li>
    <li> Authentication</li>
    <li>Image Adding functionality</li>
    <li>Search bar</li>
    <li>sorttable</li>
</ul>

Future Features
<ul>
    <li>Authorization</li>
  
</ul>

# MySQL Commands 
create table accounts
( <br />
name varchar(60) not null,<br />
address varchar(120) not null,<br />
phone varchar(15) not null,<br />
gender varchar(20) not null,<br />
productName varchar(30) not null,<br />
productPrice varchar(10) not null,<br />
imageFile varchar(100) <br />
);<br />

create table gender_list<br />
(<br />
gender varchar(20)<br />
);<br />
