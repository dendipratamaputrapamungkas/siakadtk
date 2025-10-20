<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
        
    // }

    public function run(): void
{
    // Parent: Master Data
    $masterDataId = \App\Models\Menu::create([
        'title' => 'Master Data',
        'icon' => 'fas fa-database',
        'order' => 1,
    ])->id;

    // Child under Master Data
    \App\Models\Menu::create([
        'parent_id' => $masterDataId,
        'title' => 'Siswa',
        'route' => 'siswa.index',
        'icon' => 'fas fa-user-graduate',
        'order' => 1,
    ]);

    \App\Models\Menu::create([
        'parent_id' => $masterDataId,
        'title' => 'Guru',
        'route' => 'guru.index',
        'icon' => 'fas fa-chalkboard-teacher',
        'order' => 2,
    ]);

    // Menu lain yang bukan child
    \App\Models\Menu::create([
        'title' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'fas fa-home',
        'order' => 0,
    ]);
}

}
