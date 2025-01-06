This is the instructions on how to get the project running after cloning from GitHub

Pre-Requisites
Composer
NodeJS

Start-Up Instructions
1.Clone git repository
2.Run 'composer install' in terminal within cloned folder or in IDE
3.Copy .env.example and rename the copy to .env
4.Alter DB_CONNECTION to use MySQL or sqlLite
5.Run 'php artisan key:generate' in terminal within cloned folder or in IDE
6.Run 'php artisan storage:link' in terminal within cloned folder or in IDE
7.Run 'php artisan breeze:install' in terminal within cloned folder or in IDE
7.Run 'npm install' in terminal within cloned folder or in IDE
8.Run 'npm install flowbite' in terminal within cloned folder or in IDE
9.Run 'php artisan migrate' in terminal within cloned folder or in IDE
10. Run 'php artisan db:seed' in terminal within cloned folder or in IDE

The project is now set up to run.

Running instructions.
1. Ensure your localhost and if MySQL are running (if using MySQL)
2.Run 'php artisan serve' in terminal within cloned folder or in IDE
3. In a separate terminal run 'npm run watch'.
4.Use the link generated with php artisan serve to access the site
5. To login in select one of the generated users emails from the database and input 'password' as the password.
6. To see more stock in the branch either and it through the site or alter stocks 'branch_id' to 1 in the Stocks table (as all generated users are in branch 1).
7.To see the admin view change the 'admin' column to 1 for sepcified user in the Users table. (may not be required as some users are already admins)



