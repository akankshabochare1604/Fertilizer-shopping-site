download all files on your device group them in one folder .
FOR SETUP INSTALL XAMPP ON YOUR DEVICE  ,THEN SETUP THE XAMPP 
MOVE THE ALL FILES IN HTDOCS FOLDER OF XAMPP
WHILE RUNNING THE PROJECT MAKE SURE TO START APACHE AND MYSQL 
CREATE THE NEW DATABASE NAMED `agrostore` IN MYSQL ADMIN . To create the new table in our database click on the database name .Then below the DB the `new+` will appear . click on new .
THEN CREATE NEW TABLE `categories`  IN THAT CREATE TWO COLUMNS NAMELY category_id and category_title . datatype of category id is `int` while type of category title is `varchar`.tick the autoincrement for category id.
Again create new table named `delivery` . In that create two columns delivery_id and delivery_title. Give autoincrement to delivery id.
Create new table admin_table. in that create 4 columns `admin_id`,`admin_name`,`admin_email`,and `admin_password` respectively. data types are int , varchar , varchar and varchar respectively. tick autoincrement for admin_id.
Create new table cart_details . in this , create  3 columns product_id , ip_address , quantity and datatypes are int , varchar and int respectively. Tick autoincrement for product_id
Create new table orders_pending . In this, create 6 columns order_id, user_id,invoice_number,product_id,quantity,order_status and datatypes are int, int , int, int , int and varchar respectively and tick the autoincrement for order_id
Create new table products . In this , create 12 columns product_id,product_title,product_description,product_keywords,category_id,product_image1,product_image2,product_image3, product_price,date,status and datatypes for these are int, varchar, varchar,varchar,int,int, varchar , varchar,varchar,varchar, timestamp and varchar respectively and give autoincrement to product_id
Create new table usertable .In this, create 8 columns user_id,username,user_email,user_password,user_image,user_ip,user_address,user_mobile and datatypes are int , varchar,varchar,varchar,varchar,varchar, varchar,varchar and tick autoincrement for user_id
create new table user_orders. in this create 7columns order_id,user_id,amount_due,invoice_number,total_products,order_date,order_status and datatypes are int,int,int,int,int,timestamp,varchar and tick auto increment for order_id and on update cureent stamp for timestamp
Create new table user_payments. In this create 6 columns payment_id, order_id,invoice_number,amount,paymenmode,date and datatypes are int,int,int,int,varchar,timestamp and tick autoincremengt for payment-id and on update current timestamp for date
this is all for the database creation for our site
