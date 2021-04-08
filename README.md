# Bellman-laravel-task

Laravel version "8.35.1".

### Installation and configuration steps

 <pre> git@github.com:yomnamohamed93/Bellman-laravel-task.git </pre>   
 <pre>  cd Bellman-laravel-task </pre>
 <pre>  composer install </pre>
 <pre>  cp .env.example .env </pre>
 <pre> php artisan key:generate </pre>
 <pre> php artisan storage:link </pre>
Run the migrations and seeding (**Please note to set database connection in .env file**)
 <pre> php artisan migrate </pre>  
Seed the super admin account
<pre> php artisan db:seed </pre>

Start the local development server

   <pre> php artisan serve </pre>
  
You can access admin portal at:
<pre> http://localhost:8000/admin </pre>
**Login credentials:** </br>
email: admin@admin.com </br> password: password
