                    Ahmed Note(updates done in website) 

    1 : I have removed the review page code which is comming from the backend , now we have given static reviews 
                files -- view/reviews.php   ,  controller/Reviews.php  , model/Review_model.php
                    
                    
                    
                    
                    
                    
                    
                    Admin panel set up, please follow the below instructions.

Step 1: Upload the source folder via ftp or file manager.

Step 2:Create a database yourdbname.

Step 3:Using the link http://yoursitename.com/Installer/installer run the installer

Step 4:Fill out your database details in the installer and save your changes.

Step 5: A form for filling out your site details, smtp details will appear, enter your details and save your changes.

Step 6:Now you will get your site url, admin url, admin password and username.

In case the above steps didnt work properly,Please try manual installation using the below steps.

1. Go to application\config\database.php and give your database details there also.

2. After this, rename the installer file ie INSTALLER_TRUE.php.

3. Then go to your database and import the SQL file to your database.

4. After the above steps are completed, please run your site.