<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\BearExporter;
use Eastwest\Larabear\Note;

class BearExporterCommand extends Command
{
    protected $exporter;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bear:export 
                                {--tag= : Filter on a special tag } 
                                {--since= : Only post created on and after this date }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export posts from the Bear Writer database to a file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BearExporter $exporter)
    {
        parent::__construct();

        $this->exporter = $exporter;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tag = $this->option('tag');
        $since = $this->option('since');

        foreach (Note::allWith($tag, $since) as $note) {
            $fileName = $this->exporter->execute($note);
            $this->info('Exporting file: ' . $fileName);
        }
    }
}
