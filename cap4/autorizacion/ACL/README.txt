Versión con modificaciones  (febrero 2016)

sin warning, notice, etc. en configuracion desarrollo
substituidas etiquetas <?  ?>  por <?php  ?>
adaptada a PDO.
reorganizado código de perms.php
filtrada entradas externas en perms.php

@todo reorganizar el codigo de index.php, roles.php, y user.php
@todo comentar para PHPdoc
@todo suprimir vulnerabilidades

___________________________________________________________________

INSTALL STEPS:

1. Create a MySQL database.

2. Open assets/php/database.php with your IDE/text editor of choice.

3. Edit the variables on lines 5-8 with the correct values for your DB setup.

4. Save and upload all files from the archive to your webserver.

5. Using your browser, navigate to the install.php file wherever you uploaded it.

6. Select whether or not you want to install the sample records.

7. Once it finishes running the SQL commands to create the tables it will redirect you to the index page.

8. Delete install.php, install.sql, and sampleData.sql.

NOTE: If you change the ACL permissions so that user #1 no longer has the 'access_admin' 
permission, you won't be able to access the admin site because userID = 1 is hardcoded in /index.php.
Also, you must first go to /index.php before you go to any of the admin pages, as index.php 
sets the session variable assigning you userID #1.