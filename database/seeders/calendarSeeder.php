<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Seeder;

class calendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["title"=> "Palmesøndag","start"=> "2023-03-29","end"=> "2023-03-29", "color" => "#a61120"],
            ["title"=> "Skjærtorsdag","start"=> "2023-04-02","end"=> "2023-04-02", "color" => "#f94144"],
            ["title"=> "Langfredag","start"=> "2023-04-03","end"=> "2023-04-03", "color" => "#f97d5b"],
            ["title"=> "1. påskedag","start"=> "2023-04-05","end"=> "2023-04-05", "color" => "#f3722c"],
            ["title"=> "2. påskedag","start"=> "2023-04-06","end"=> "2023-04-06", "color" => "#f8961e"],
            ["title"=> "Kristi Himmelsprettsdag","start"=> "2023-05-14","end"=> "2023-05-14", "color" => "#f9c74f"],
            ["title"=> "1. pinsedag","start"=> "2023-05-24","end"=> "2023-05-24", "color" => "#90be6d"],
            ["title"=> "2. pinsedag","start"=> "2023-05-25","end"=> "2023-05-25", "color" => "#43aa8b"],
            ["title"=> "Nyttårsdag","start"=> "2023-01-01","end"=> "2023-01-01", "color" => "#800080"],
            ["title"=> "1. mai","start"=> "2023-05-01","end"=> "2023-05-01", "color" => "#f20089"],
            ["title"=> "17. mai","start"=> "2023-05-17","end"=> "2023-05-17", "color" => "#5c0099"],
            ["title"=> "1. juledag","start"=> "2023-12-25","end"=> "2023-12-25", "color" => "#0c326c"],
            ["title"=> "2. juledag","start"=> "2023-12-26","end"=> "2023-12-26", "color" => "#4169e1"],
            ["title"=> "Nyttårsaften","start"=> "2023-12-31","end"=> "2023-12-31", "color" => "#2196F3"],
            ["title"=> "Republic Day","start"=> "2023-01-26","end"=> "2023-01-26", "color" => "#00540e"],
            ["title"=> "Valentine's Day","start"=> "2023-02-14","end"=> "2023-02-14", "color" => "#03071e"],
            ["title"=> "March Equinox","start"=> "2023-03-20","end"=> "2023-03-20", "color" => "#800080"],
            ["title"=> "Bank Holiday","start"=> "2023-04-01","end"=> "2023-04-01", "color" => "#f20089"],
            ["title"=> "Doctor Ambedkar's Birthday","start"=> "2023-04-14","end"=> "2023-04-14", "color" => "#5c0099"],
            ["title"=> "Mother's Day","start"=> "2023-05-08","end"=> "2023-05-08", "color" => "#0c326c"],
            ["title"=> "Father's Day","start"=> "2023-06-19","end"=> "2023-06-19", "color" => "#4169e1"],
            ["title"=> "June Solstice","start"=> "2023-06-21","end"=> "2023-06-21", "color" => "#2196F3"],
            ["title"=> "Friend ship Day","start"=> "2023-08-07","end"=> "2023-08-07", "color" => "#00540e"],
            ["title"=> "Independ ence Day","start"=> "2023-08-15","end"=> "2023-08-15", "color" => "#03071e"],
            ["title"=> "September Equinox","start"=> "2023-09-23","end"=> "2023-09-23", "color" => "#a61120"],
            ["title"=> "Mahatma Gandhi's Birthday","start"=> "2023-10-02","end"=> "2023-10-02", "color" => "#f94144"],
            ["title"=> "December Solstice","start"=> "2023-12-21","end"=> "2023-12-21", "color" => "#f97d5b"]
        ];
        Calendar::insert($data);
    }
}