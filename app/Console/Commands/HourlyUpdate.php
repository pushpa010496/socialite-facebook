<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Mail;
use App\Console\Commands\HourlyUpdate;

class HourlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an hourly email to all the users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
       foreach ($user as $a)
       {
   Mail::raw("This is automatically generated Hourly Update", function($message) use ($a)
   {
       $message->from('chinna45459@gmail.com');
       $message->to($a->email)->subject('Hourly Update');
   });
   }
   $this->info('Hourly Update has been send successfully');
    }
}
