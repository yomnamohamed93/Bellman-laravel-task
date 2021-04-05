# Bellman-laravel-task

Laravel version "5.8".

### Installation and configuration steps

 <pre> git@github.com:yomnamohamed93/laravel-movie-seeder.git </pre>   
 <pre>  cd Bellman-laravel-task </pre>
 <pre>  composer install </pre>
 <pre>  cp .env.example .env </pre>
 <pre> php artisan key:generate </pre>
 In .env file change the value of **QUEUE_CONNECTION** to **database** . </br>

Run the migrations and seeding (**Please note to set database connection in .env file**)
 <pre> php artisan migrate </pre>  
Seed the genres (movies categories) from the external API
  <pre> php artisan db:seed </pre>

Start the local development server

   <pre> php artisan serve </pre>
  
