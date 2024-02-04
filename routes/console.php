<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('tables', function () {
    $tables = [];
    $tableNames =  DB::select('SHOW TABLES');
    foreach ($tableNames as $key => $tableName) {
        // $columns =  DB::getSchemaBuilder()->getColumnListing($tableName->Tables_in_laravel_docs);
        //or
        $columns = Schema::getColumnListing($tableName->Tables_in_laravel_docs);
        $tables[] = [
            'Table' => $tableName->Tables_in_laravel_docs,
            'Columns' => implode(', ', $columns),
        ];
    }
    $this->table(['Table', 'Columns'], $tables);
})->describe('Show all tables with their columns.');
