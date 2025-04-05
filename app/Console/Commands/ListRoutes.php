<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class ListRoutes extends Command
{
    protected $signature = 'route:list';
    protected $description = 'List all registered routes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all routes
        $routes = Route::getRoutes();
        
        // Check if we have routes to display
        if (empty($routes)) {
            $this->info('No routes found.');
            return;
        }

        // Output headers for the list
        $this->line('Method\t\tURI\t\tAction');
        $this->line('-------------------------------------------');

        // Iterate through each route and print relevant details
        foreach ($routes as $route) {
            $methods = is_array($route['method'])?implode(', ', $route['method']):$route['method'];  // Get HTTP methods (GET, POST, etc.)
            $uri = $route['uri'];                        // URI path
            $action = $route['action']['uses'] ?? 'N/A'; // Controller method action

            $this->line("{$methods}\t{$uri}\t{$action}");
        }
    }
}
