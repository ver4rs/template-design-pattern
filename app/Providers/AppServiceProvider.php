<?php

namespace App\Providers;

use App\FileMiner\CsvFileDataMiner;
use App\FileMiner\FileDataMiner;
use App\FileMiner\JsonFileDataMiner;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CsvFileDataMiner::class)
            ->needs('$file')
            ->give('../storage/app/mined-files/minedData.csv');

        $this->app->when(JsonFileDataMiner::class)
            ->needs('$file')
            ->give('../storage/app/mined-files/minedData.json');

//        $this->app->bind(FileDataMiner::class, CsvFileDataMiner::class);
        $this->app->bind(FileDataMiner::class, JsonFileDataMiner::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
