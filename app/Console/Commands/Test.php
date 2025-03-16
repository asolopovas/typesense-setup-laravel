<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Post;
use function Laravel\Prompts\search;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        search(
            label: 'Search posts',
            options: fn(string $value) => strlen($value) > 0 ? Post::search($value)->get()->pluck('title', 'id')->all() : []
        );
    }
}
