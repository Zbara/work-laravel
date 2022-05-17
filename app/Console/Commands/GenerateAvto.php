<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateAvto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:avto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private $brand = [
        1 => 'BMW',
        2 => 'AUDI',
        3 => 'LADA',
        4 => 'Mercedes'
    ];

    private $model = [
        'BMW' => ['X3', 'X4', 'X5', 'X6', '320', '750'],
        'AUDI' => ['RS6', 'A6', 'A5'],
        'LADA' => ['2101', '21099', 'Priora'],
        'Mercedes' => ['C199', 'S212', 'C207', 'C217', 'W213']
    ];


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('brand_cars')->insert([
            ['name' => 'BMW'],
            ['name' => 'AUDI'],
            ['name' => 'LADA'],
            ['name' => 'Mercedes']
        ]);

        $items = DB::table('brand_cars')->get();

        foreach ($items as $item) {
            foreach ($this->model[$item->name] as $value) {
                DB::table('model_cars')->insert([
                    ['name' => $value, 'brand_id' => $item->id]
                ]);
            }
        }
        return 0;
    }
}
