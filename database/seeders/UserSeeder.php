<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ali',
            'user_id' => '1859648',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Hashemite',
            'user_id' => '1256333333',
            'password' => Hash::make('password'),
            'role' => 'company',
        ]);
        User::create([
            'name' => 'Alaa',
            'user_id' => '1259874',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Hani',
            'user_id' => '156897',
            'password' => Hash::make('password'),
            'role' => 'supervisor',
        ]);

        User::create([
            'name' => 'mohamed',
            'user_id' => '1885963',
            'password' => Hash::make('1885963'),

            'GPA' => '3.14',
            'hours' => '55'

        ]);

        User::create([
            'name' => 'khaled',
            'user_id' => '1833359',
            'password' => Hash::make('1833359'),

            'GPA' => '3.14',
            'hours' => '97'

        ]);

        User::create([
            'name' => 'salem',
            'user_id' => '1785963',
            'password' => Hash::make('1785963'),

            'GPA' => '3.14',
            'hours' => '98'

        ]);

        User::create([
            'name' => 'farah',
            'user_id' => '1697455',
            'password' => Hash::make('1697455'),

            'GPA' => '3.14',
            'hours' => '95'

        ]);

        User::create([
            'name' => 'thaer',
            'user_id' => '1835885',
            'password' => Hash::make('1835885'),

            'GPA' => '3.14',
            'hours' => '90'

        ]);

        User::create([
            'name' => 'kamel',
            'user_id' => '1435896',
            'password' => Hash::make('1435896'),

            'GPA' => '3.14',
            'hours' => '100'

        ]);

        User::create([
            'name' => 'ahmad',
            'user_id' => '1963887',
            'password' => Hash::make('1963887'),

            'GPA' => '3.14',
            'hours' => '120'

        ]);

        User::create([
            'name' => 'tamara',
            'user_id' => '2015358',
            'password' => Hash::make('2015358'),

            'GPA' => '3.14',
            'hours' => '100'

        ]);

        User::create([
            'name' => 'yousef',
            'user_id' => '1532586',
            'password' => Hash::make('1532586'),

            'GPA' => '3.14',
            'hours' => '44'

        ]);

        User::create([
            'name' => 'ali',
            'user_id' => '1833347',
            'password' => Hash::make('1833347'),

            'GPA' => '3.14',
            'hours' => '55'

        ]);

        User::create([
            'name' => 'hamza',
            'user_id' => '18475320',
            'password' => Hash::make('18475320'),

            'GPA' => '3.14',
            'hours' => '22'

        ]);

        User::create([
            'name' => 'adam',
            'user_id' => '1456932',
            'password' => Hash::make('1456932'),

            'GPA' => '3.56',
            'hours' => '100'

        ]);

        User::create([
            'name' => 'tamer',
            'user_id' => '1546896',
            'password' => Hash::make('1546896'),

            'GPA' => '2.56',
            'hours' => '100'

        ]);

        User::create([
            'name' => 'hani',
            'user_id' => '17777852',
            'password' => Hash::make('17777852'),

            'GPA' => '3.23',
            'hours' => '36'

        ]);

        User::create([
            'name' => 'dana',
            'user_id' => '1235668',
            'password' => Hash::make('1235668'),

            'GPA' => '3.10',
            'hours' => '50'

        ]);

        User::create([
            'name' => 'sara',
            'user_id' => '1223588',
            'password' => Hash::make('1223588'),

            'GPA' => '3.14',
            'hours' => '86'

        ]);

        User::create([
            'name' => 'alaa',
            'user_id' => '1332974',
            'password' => Hash::make('1332974'),

            'GPA' => '3.20',
            'hours' => '105'

        ]);

        User::create([
            'name' => 'osama',
            'user_id' => '1738480',
            'password' => Hash::make('1738480'),

            'GPA' => '3.36',
            'hours' => '99'

        ]);

        User::create([
            'name' => 'abrarr',
            'user_id' => '12344451',
            'password' => Hash::make('12344451'),

            'GPA' => '3.63',
            'hours' => '100'

        ]);

        User::create([
            'name' => 'raghad',
            'user_id' => '1525370',
            'password' => Hash::make('1525370'),

            'GPA' => '3.36',
            'hours' => '86'

        ]);

        User::create([
            'name' => 'rana',
            'user_id' => '1123557',
            'password' => Hash::make('1123557'),

            'GPA' => '3.14',
            'hours' => '89'

        ]);

        User::create([
            'name' => 'issra',
            'user_id' => '3698501',
            'password' => Hash::make('3698501'),

            'GPA' => '3.14',
            'hours' => '99'

        ]);

        User::create([
            'name' => 'mahoued',
            'user_id' => '1203697',
            'password' => Hash::make('1203697'),

            'GPA' => '3.14',
            'hours' => '86'

        ]);

        User::create([
            'name' => 'eman',
            'user_id' => '1144556',
            'password' => Hash::make('1144556'),

            'GPA' => '3.14',
            'hours' => '86'

        ]);

        User::create([
            'name' => 'amazon',
            'user_id' => '1588966',
            'password' => Hash::make('1588966'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'google',
            'user_id' => '0326589',
            'password' => Hash::make('0326589'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'apple',
            'user_id' => '8899666',
            'password' => Hash::make('8899666'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'alibaba',
            'user_id' => '2356907',
            'password' => Hash::make('2356907'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'z_group',
            'user_id' => '2033698',
            'password' => Hash::make('2033698'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'damac',
            'user_id' => '7890356',
            'password' => Hash::make('7890356'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'lili',
            'user_id' => '1450303',
            'password' => Hash::make('1450303'),

            'role' => 'company'
        ]);

        User::create([
            'name' => 'djj_group',
            'user_id' => '5896333',
            'password' => Hash::make('5896333'),

            'role' => 'company'
        ]);
        User::create([
            'name' => 'abd-alrahman',
            'user_id' => '11223344',
            'password' => Hash::make('11223344'),
            'hours' => '86',
            'role' => 'supervisor'
        ]);

        User::create([
            'name' => 'bashar',
            'user_id' => '22336699',
            'password' => Hash::make('22336699'),
            'hours' => '86',
            'role' => 'supervisor'
        ]);

        User::create([
            'name' => 'mohamed',
            'user_id' => '1236504',
            'password' => Hash::make('1236504'),
            'hours' => '86',
            'role' => 'supervisor'
        ]);

        User::create([
            'name' => 'haneen',
            'user_id' => '77441122',
            'password' => Hash::make('77441122'),
            'hours' => '86',
            'role' => 'supervisor'
        ]);
    }
}
