*****---Welcome to Our Site ----********


*****Introductions to Connect Database and visit the Website********

1.)First go to phpmyadmin and click new 
2.) then type "medi_db" in the database name field and press create (make sure your spelings in the words and underscore symbol *****community_portal********)
3.)then select the database medi_db in side panel.
4.)then click import button and choose the file 'medi_db.sql.gz' and press Go button in bottom right corner.

----if you getting error saying 'got a packet bigger than max allowd packet bytes' you have to increase max packet bytes
in your server----

---To do that go to Xampp shell and log to localhost(#mysql -h localhost -u root -p) and copy & paste below query
in the shell and press enter

**Query - SET GLOBAL max_allowed_packet=16777216; 


5.)There are five tables in the database items,users,payments,cusers and messages. Make sure five tables and table data are imported successfully.

***now db import successful***

5)copy the folder called herb_project and paste it on the htdocs folder in the xampp server folder
6) now open a web browswer and type the url- localhost/herb_project


****done****



##********IMPORTANT************##

___Admin Account____

username-admin
password-admin12345
admin pin-12345


__test user accounts__

usernames - testuser1,testuser2,testuser3.....like that.
passwords - user1cp,user2cp,user3cp..........like that.


Contact me - 0765328774 (if needed)
