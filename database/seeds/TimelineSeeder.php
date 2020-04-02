<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timeline')
            ->insert([
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2020, 4),
                    'locale' => 'it',
                    'title' => 'Nasce EXECUTABLE',
                    'description' => 'Inizia la mia avventura come Programmatore Freelance, con forti prospettive
                                      di crescita e con l\'obiettivo di rendere questa mia attività un\'azienda strutturata e prospera.',
                    'icon' => '<img alt="x" style="display: block; height:auto; width: 100%;" src="/img/logo-symbol-white.svg">'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2019, 9),
                    'locale' => 'it',
                    'title' => 'Laurea Triennale in Ingegneria Informatica',
                    'description' => '',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2018, 3),
                    'locale' => 'it',
                    'title' => 'Assunzione presso TCommunication Srl',
                    'description' => 'Parallelamente alla carriera accademica vengo assunto come sviluppatore IT, iniziando ad applicare le
                                    conoscenze acquisite negli anni per la realizzazione di prodotti digitali.',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2016, 7),
                    'locale' => 'it',
                    'title' => 'Diploma in Informatica e Telecomunicazioni',
                    'description' => '',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],


                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2020, 4),
                    'locale' => 'en',
                    'title' => 'EXECUTABLE is founded',
                    'description' => 'My adventure as a freelance developer starts now, with great growth potential and with
                                       the goal of turning Executable into a fully fledged company.',
                    'icon' => '<img alt="x" style="display: block; height:auto; width: 100%;" src="/img/logo-symbol-white.svg">'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2019, 9),
                    'locale' => 'en',
                    'title' => 'Bachelor\'s degree in Computer Science',
                    'description' => '',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2018, 3),
                    'locale' => 'en',
                    'title' => 'Employed at TCommunication Srl',
                    'description' => 'During my academic studies I find a job as IT developer. Here I start applying my knowledge
                                    to build digital products.',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],
                [
                    'created_at' =>Carbon::create(2020, 4, 1),
                    'date' => Carbon::create(2016, 7),
                    'locale' => 'en',
                    'title' => 'Diploma in Information and Communication Technologies',
                    'description' => '',
                    'icon' => '<i class="fas fa-graduation-cap"></i>'
                ],

            ]);
    }
}
