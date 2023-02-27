<?php

namespace App\Console\Commands;

use App\Jobs\AddProfessors;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallSchoolControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'controlescolar:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instala el sistema de control escolar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        AddProfessors::dispatch();

        return Command::SUCCESS;
    }
}
