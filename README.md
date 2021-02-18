# OnlineTheatreDB
Theatre Managment System for CSE2004.

# Technologies Used:
* PHP
* HTML, CSS, Bootstrap, jQuery, SQL, MySQL and Apache HTTP Server

# Run the Web App Locally
Below there is an explanation of how to run the web app locally using WAMP or XAMPP (you can also separately install and configure Apache and a SGBD if you would prefer).

1. Clone the repository or download the zip file.
2. Place the project folder or extract the zip file into the **htdocs** folder (XAMPP) or **www** folder (WAMP).
3. Create a new database and import the .sql file.
4. Modify your database connection values (username, password and database name) in the file RaleighTheatre/includes/**database.php**.
5. Run XAMPP or WAMP and go to: http://localhost/AtlasCinema/index.php
	
# Troubleshooting:
If a OCISTMTGETNEXTRESULT is popping up, do this
1. Add oci.dll, oraociei12.dll, and oraons.dll to apache/bin folder from instantclient_12_1.
2. Restart the Apache.

# External References
1. https://docs.oracle.com/cd/E11882_01/appdev.112/e10811.pdf
2. https://github.com/diazmaria/RaleighTheatre
