<?php

namespace App\Console\Commands;

use App\Search\Search;
use Illuminate\Console\Command;

class CreateIndexCommand extends Command
{
    /** @var Search  */
    private $search;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Search $search)
    {
        $this->search = $search;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
