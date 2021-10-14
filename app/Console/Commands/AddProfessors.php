<?php

namespace App\Console\Commands;

use App\Jobs\AddAppliants;
use App\Jobs\AddProfessors as JobsAddProfessors;
use Illuminate\Console\Command;

class AddProfessors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'professors:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Agrega a los profesores del NB';

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
        AddAppliants::dispatch();
        //JobsAddProfessors::dispatch();
        return 0;
    }
}
