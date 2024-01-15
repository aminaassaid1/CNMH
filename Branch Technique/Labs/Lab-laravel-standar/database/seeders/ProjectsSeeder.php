<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasks;


class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Design Product Pages',
            'description' => 'Create user-friendly product pages with images and descriptions',
            'project_id' => '1',
        ]);

        Task::create([
            'name' => 'Implement Shopping Cart',
            'description' => 'Develop a functional shopping cart for users to add and manage items',
            'project_id' => '1',
        ]);

        Task::create([
            'name' => 'Integrate Payment Gateway',
            'description' => 'Connect the website to a secure payment gateway for online transactions',
            'project_id' => '1',
        ]);


        Task::create([
            'name' => 'User Authentication',
            'description' => 'Implement a secure user authentication system for bloggers',
            'project_id' => '1',
        ]);

        Task::create([
            'name' => 'Create Blog Post Editor',
            'description' => 'Build a WYSIWYG editor for users to write and format blog posts',
            'project_id' => '2',
        ]);

        Task::create([
            'name' => 'Implement Comments Section',
            'description' => 'Develop a comment system for users to interact with blog posts',
            'project_id' => '2',
        ]);

        Task::create([
            'name' => 'Task CRUD Operations',
            'description' => 'Enable users to perform CRUD operations on tasks (Create, Read, Update, Delete)',
            'project_id' => '2',
        ]);

        Task::create([
            'name' => 'User Roles and Permissions',
            'description' => 'Implement roles and permissions for different user levels (Admin, Member)',
            'project_id' => '3',
        ]);

        Task::create([
            'name' => 'Task Filtering and Sorting',
            'description' => 'Add functionality to filter and sort tasks based on different criteria',
            'project_id' => '3',
        ]);

    }
}
