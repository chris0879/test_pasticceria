<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{


    protected $settings = [


        [
            'key'                       =>  'scadenza_giorni',
            'value'                     =>  '3',
        ],


        [
            'key'                       =>  'sconto_2',
            'value'                     =>  '20',
        ],

        
        [
            'key'                       =>  'sconto_3',
            'value'                     =>  '80',
        ],


    ];



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
