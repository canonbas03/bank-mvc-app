<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Worker;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN
        User::create([
            'firstName' => 'Admin',
            'lastName'  => 'User',
            'email'     => 'admin@test.com',
            'password'  => Hash::make('12345678'),
            'role'      => 'admin'
        ]);

        // WORKER USER
        $workerUser = User::create([
            'firstName' => 'Worker',
            'lastName'  => 'User',
            'email'     => 'worker@test.com',
            'password'  => Hash::make('12345678'),
            'role'      => 'worker'
        ]);

        // WORKER PROFILE (salary in workers table)
        Worker::create([
            'user_id' => $workerUser->id,
            'salary'  => 1500
        ]);

        // CLIENT
        $clientUser = User::create([
            'firstName' => 'Client',
            'lastName'  => 'User',
            'email'     => 'client@test.com',
            'password'  => Hash::make('1234567812'),
            'role'      => 'client'
        ]);

        // CLIENT PROFILE (EGN and bank account)
        $client = Client::create([
            'user_id' => $clientUser->id,
            'clientEgn' => '0102030405',
        ]);

        // Client bank account
        BankAccount::create([
            'client_id' => $client->id,
            'bankAccountNumber' => "BG{$client->clientEgn}",
            'cardNumber' => '1111222233334444',
            'balance' => 500
        ]);
    }
}
