<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use GuzzleHttp\Client;
use League\Csv\Writer;

use app\HelpSpot\CsvSeeder;

class GetOil extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:get-oil';

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
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDateRangeString()
    {
        date_default_timezone_set('America/Panama');

        $current = Carbon::now();

        $end_date = $current->toDateString();
        $start_date = $current->startOfYear()->toDateString();
        $start_end_date = '&start_date='.$start_date.'&end_date='.$end_date;
        return $start_end_date;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $getjson = new Client(['base_uri'  => 'https://www.quandl.com/api/v3/datasets/']);
        $response = $getjson->request('GET', 'COM/OIL_BRENT.json?api_key=UcX5xRwzEpUfqn7FQWbj'.$this->getDateRangeString(), [
            'verify'=> false
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['dataset']['data'])) {
            for ($dt=0; $dt<=max(array_keys($data['dataset']['data'])); $dt++){
                $Date[]   = $data['dataset']['data'][$dt][0];
                $Value[]  = $data['dataset']['data'][$dt][1];
            }
        }

        $set_arr = array_map(null,$Date,$Value);

        $writer = Writer::createFromFileObject(new \SplFileObject(storage_path('commodities\oil.csv'),'w'));
        $writer->insertOne(['Value','Date']);
        $writer->insertAll($set_arr);

        $seed = new CsvSeeder($setb = 'oil');
        if (isset($seed->config)){
            $this->info('Successfully!');
        }
    }
}
