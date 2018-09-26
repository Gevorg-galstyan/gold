<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteGuest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteGuest:deleteGuest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove guests in 5 days';

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
     * @return mixed
     */
    public function handle()
    {

    }
}
