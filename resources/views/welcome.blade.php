<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Manager API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f8fafc;
                color: #1e293b;
                line-height: 1.6;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem;
            }
            .header {
                text-align: center;
                margin-bottom: 3rem;
            }
            .header h1 {
                font-size: 2.5rem;
                color: #0f172a;
                margin-bottom: 1rem;
            }
            .header p {
                font-size: 1.2rem;
                color: #475569;
            }
            .card {
                background-color: white;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                padding: 2rem;
                margin-bottom: 2rem;
            }
            .card h2 {
                color: #0f172a;
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }
            .endpoint {
                background-color: #f1f5f9;
                padding: 1rem;
                border-radius: 0.25rem;
                margin-bottom: 0.5rem;
                font-family: monospace;
            }
            .method {
                font-weight: bold;
                color: #2563eb;
            }
            .url {
                color: #0f172a;
            }
            .description {
                margin-top: 0.5rem;
                color: #475569;
            }
            .footer {
                text-align: center;
                margin-top: 3rem;
                color: #64748b;
                font-size: 0.875rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Task Manager API</h1>
                <p>A simple and efficient API for managing tasks</p>
            </div>

            <div class="card">
                <h2>About</h2>
                <p>Task Manager API is a RESTful API built with Laravel that allows you to create, read, update, and delete tasks. It provides a simple interface for managing your daily tasks and to-dos.</p>
            </div>

            <div class="card">
                <h2>API Endpoints</h2>
                
                <div class="endpoint">
                    <div><span class="method">GET</span> <span class="url">/api/tasks</span></div>
                    <div class="description">Retrieve all tasks</div>
                </div>

                <div class="endpoint">
                    <div><span class="method">POST</span> <span class="url">/api/tasks</span></div>
                    <div class="description">Create a new task</div>
                </div>

                <div class="endpoint">
                    <div><span class="method">GET</span> <span class="url">/api/tasks/{id}</span></div>
                    <div class="description">Get a specific task by ID</div>
                </div>

                <div class="endpoint">
                    <div><span class="method">PUT</span> <span class="url">/api/tasks/{id}</span></div>
                    <div class="description">Update a task</div>
                </div>

                <div class="endpoint">
                    <div><span class="method">DELETE</span> <span class="url">/api/tasks/{id}</span></div>
                    <div class="description">Delete a task</div>
                </div>
            </div>

            <div class="card">
                <h2>Example Request</h2>
                <pre style="background-color: #f1f5f9; padding: 1rem; border-radius: 0.25rem; overflow-x: auto;">
POST /api/tasks
Content-Type: application/json

{
    "title": "Complete project",
    "description": "Finish the task manager API project"
}</pre>
            </div>

            <div class="footer">
                <p>Built with Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                <p>Created by <a href="https://thaerhendawi.com" target="_blank">Thaer Hendawi</a></p>
            </div>
        </div>
    </body>
</html>
