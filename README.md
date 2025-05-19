<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Task Manager API Setup

### My Local environment

- PHP version 8.1.29
- Composer version 2.8.9
- Laravel Framework 10.48.29
- MySQL version 8.0.33 for Win64 on x86_64 (MySQL Community Server - GPL)

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL
- Git

### Installation Steps

1. Clone the repository

   ```bash
   git clone https://github.com/ThaerHindawi/Task-Manager-API.git
   cd Task-Manager-API
   ```

2. Install dependencies

   ```bash
   composer install
   ```

3. Create and configure environment file

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in the `.env` file

   ```text
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager_api
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Run migrations

   ```bash
   php artisan migrate
   ```

6. Run Seeder (Optional)

    ```bash
    php artisan db:seed
    ```

7. Start the development server

   ```bash
   php artisan serve
   ```

### API Endpoints

- `GET /api/tasks` - List all tasks
- `POST /api/tasks` - Create a new task
- `GET /api/tasks/{id}` - Get a specific task
- `PUT /api/tasks/{id}` - Update a task
- `DELETE /api/tasks/{id}` - Delete a task

### Development Approach

This Task Manager API was built following RESTful principles and Laravel best practices:

1. **Setup the work environment**
    - I already had PHP 8.1.29 and MySQL 8.0.33 on my laptop
    - I had to download composer from ``https://getcomposer.org/download/``
    - I had to activate some necessary extensions in php.ini example extension=mysqli, extension=pdo_mysql, and extension=fileinfo

2. **Create Laravel Project**
   - I used the command ```bash composer create-project laravel/laravel Task-Manager-API``` to create the Laravel project

3. **Create the Task Model, Migration, and Controller**
   - I used the command ```bash php artisan make:model Task -mcr``` to create the task model, Migration, Controller.
   - The command created Task.php in app/Models
   - Migration 2025_05_17_174827_create_tasks_table.php in database/migrations
   - TaskController in the app/Http/Controllers

4. **Coding**
   - I define Task Table Schema in the 2025_05_17_174827_create_tasks_table.php
   - Then I added the following code:
   ```php
   public function up(): void
   {
       Schema::create('tasks', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->text('description')->nullable();
           $table->boolean('is_completed')->default(false);
           $table->timestamps();
       });
   }
   ```
   - I added the code in the TaskController file:
   ```php
   public function index()
   {
       $tasks = Task::all();
       return response()->json($tasks, 200);
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'nullable|string',
           'is_completed' => 'boolean',
       ]);

       $task = Task::create($validated);

       // Reload the model to get all attributes including default values
       $task = $task->fresh();

       return response()->json($task, 201);
   }

   public function show(Task $task)
   {
       return response()->json($task, 200);
   }

   public function update(Request $request, Task $task)
   {
       $validated = $request->validate([
           'title' => 'sometimes|required|string|max:255',
           'description' => 'nullable|string',
           'is_completed' => 'nullable|boolean',
       ]);

       $task->update($validated);
       // Reload the model to get all attributes including default values
       $task = $task->fresh();

       return response()->json($task, 200);
   }

   public function destroy(Task $task)
   {
       $task->delete();
       return response()->noContent();
   }
   ```
   - I added the following to the Task.php model:
   ```php
   protected $fillable = ['title', 'description', 'is_completed'];
   ```
   - I define the route in the api.php file:
   ```php
   Route::apiResource('tasks', TaskController::class);
   ```
   - I run the command:
   ```bash
   php artisan migrate
   ```
   - Lastly, I run the command:
   ```bash
   php artisan serve
   ```

5. **Seeding**
   - I created seeding factory to populate some data in the Tasks table
   - I used the command ```bash php artisan make:factory TaskFactory --model=Task``` to create TaskFactory.php and add the code to fake some data ```php return ['title' => $this->faker->sentence, 'description' => $this->faker->paragraph, 'is_completed' => $this->faker->boolean];```
   - I used the command ```bash php artisan make:seeder TaskSeeder``` to create TaskSeeder.php and added the code ```php Task::factory()->count(10)->create();``` to create 10 fake tasks
   - I added the code ```php $this->call([TaskSeeder::class]);``` to call the TaskSeeder
   - Then I run the command ```bash php artisan db:seed```

6. **Testing**
   - I test this app using Postman
   - Postman collection file is included in the repository: [Task Manager API.postman_collection](Task%20Manager%20API.postman_collection)
   - To use this collection:
     1. Download [Postman](https://www.postman.com/downloads/)
     2. Import the collection file: File > Import > Upload Files > select `Task Manager API.postman_collection`
     3. The collection contains pre-configured requests for all API endpoints

7. **Deployment**
   - Deployed on Ubuntu server with Nginx web server
   - Secured with Let's Encrypt SSL certificates
   - Live URLs:
     - API: [api.thaerhendawi.com](https://api.thaerhendawi.com) - Laravel API backend
     - Frontend: [tasks.thaerhendawi.com](https://tasks.thaerhendawi.com) - React frontend

### Example Request (Create Task)

```json
POST /api/tasks
{
    "title": "Complete project",
    "description": "Finish the task manager API project"
}
```
