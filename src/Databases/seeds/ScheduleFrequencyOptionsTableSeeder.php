<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MeridienClube\Meridien\Option;
use MeridienClube\Meridien\ScheduleFrequencyOption;

class ScheduleFrequencyOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        $this->command->info('Fazendo um drop nas tabelas schedule frequency option, sai da frente... ;/');
        DB::table('option_schedule_frequency_option')->truncate();
        DB::table('schedule_frequency_options')->truncate();
        $this->command->info('Pronto, drops de  schedule frequency option feitos, acho que com sucesso :D');
        Schema::enableForeignKeyConstraints();

        $schedule_frequency_option = [
            /*[
                'frequency' => 'cron',
                'name' => 'Cron',
                'description' => 'Run the task on a custom Cron schedule',
                'options' => [
                    'minute',
                    'hour',
                    'day',
                    'month',
                    'day_week'
                ]
            ],*/
            [
                'frequency' => 'everyMinute',
                'name' => 'Every Minute',
                'description' => 'Run the task every minute'
            ],
            [
                'frequency' => 'everyFiveMinutes',
                'name' => 'Every Five Minutes',
                'description' => 'Run the task every five minutes'
            ],
            [
                'frequency' => 'everyTenMinutes',
                'name' => 'Every Ten Minutes',
                'description' => 'Run the task every ten minutes'
            ],
            [
                'frequency' => 'everyFifteenMinutes',
                'name' => 'Every Fifteen Minutes',
                'description' => 'Run the task every fifteen minutes'
            ],
            [
                'frequency' => 'everyThirtyMinutes',
                'name' => 'Every Thirty Minutes',
                'description' => 'Run the task every thirty minutes'
            ],
            [
                'frequency' => 'hourly',
                'name' => 'Hourly',
                'description' => 'Run the task every hour'
            ],
            /*[
                'frequency' => 'hourlyAt',
                'name' => 'Hourly At',
                'description' => 'Run the task every hour at 17 mins past the hour',
                'options' => [
                    'minute'
                ]
            ],*/
            [
                'frequency' => 'daily',
                'name' => 'Daily',
                'description' => 'Run the task every day at midnight'
            ],
            /*[
                'frequency' => 'dailyAt',
                'name' => 'Daily At',
                'description' => 'Run the task every day at 13:00',
                'options' => [
                    'hour'
                ]
            ],*/
            [
                'frequency' => 'twiceDaily',
                'name' => 'Twice Daily',
                'description' => 'Run the task daily at 1:00 & 13:00'
            ],
            [
                'frequency' => 'weekly',
                'name' => 'Weekly',
                'description' => 'Run the task every week'
            ],
            /*[
                'frequency' => 'weeklyOn',
                'name' => 'Weekly On',
                'description' => 'Run the task every week on Monday at 8:00',
                'options' => [
                    'day_week',
                    'hour'
                ]
            ],*/
            [
                'frequency' => 'monthly',
                'name' => 'Monthly',
                'description' => 'Run the task every month'
            ],
            /*[
                'frequency' => 'monthlyOn',
                'name' => 'Monthly On',
                'description' => 'Run the task every month on the 4th at 15:00',
                'options' => [
                    'day',
                    'hour'
                ]
            ],*/
            [
                'frequency' => 'quarterly',
                'name' => 'Quarterly',
                'description' => 'Run the task every quarter'
            ],
            [
                'frequency' => 'yearly',
                'name' => 'Yearly',
                'description' => 'Run the task every year'
            ]
        ];

        foreach ($schedule_frequency_option as $obj) {
            $options = isset($obj['options'])? $obj['options'] : [];
            unset($obj['options']);
            $ScheduleFrequencyOption = ScheduleFrequencyOption::create($obj);
            $optIds = [];
            foreach ($options as $opt) {
                $objOption = Option::where('name', $opt)->first();
                if($objOption) {
                    $optIds[] = $objOption->id;
                }
            }
            //$ScheduleFrequencyOption->options()->sync($optIds);
            $this->command->info('ScheduleFrequencyOption  ' . $obj['name'] . ' successfully created.');
        }

    }
}
