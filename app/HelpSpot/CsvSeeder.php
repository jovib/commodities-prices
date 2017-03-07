<?php
namespace app\HelpSpot;

use Illuminate\Support\Facades\DB;
use League\Csv\Reader;


class CsvSeeder
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
        $csv = Reader::createFromPath(storage_path('commodities/'.$config.'.csv'));
        $csv->setOffset(1);

        DB::table($config)->truncate();
        $csv->fetchAll(function ($row)
        {
            DB::connection()->disableQueryLog();
            DB::table($this->config)->insert(
                array(
                    'Date'      => $row[0],
                    'Value'    => $row[1],
                )
            );
        });
    }
}