<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class FixLogins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:logins ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix user login: lower case';

    public function handle()
    {
        $user = User::whereNull('email_verified_at')
            ->orderBy('id')->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->save();
        }

        return Command::SUCCESS;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle2()
    {
        $id = $this->ask('Input user id:');

        $user = User::find($id);

        if ($user) {
            $user->login = Str::lower($user->login);
            $user->save();
            $this->info('Done!');
        } else {
            $this->error('User not found');
        }

        return Command::SUCCESS;
    }
}
