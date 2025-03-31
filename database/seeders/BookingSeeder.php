<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run(): void
    {
        $csv=Reader::createFromPath(Storage::path('public/bookings.csv'));
        $csv->setHeaderOffset(0);

        $records=$csv->getRecords();
        foreach($records as $record){
            
            Booking::create([
                "id"=>$record['id'],
                "startDate"=>$record['startDate'],
                "endDate"=>$record['endDate'],
                "car_id"=>$record['carId'],
                "totalPrice"=>$record['totalPrice'],                
                "userUID"=>$record['userUID'],
            ]);
        } 
    }       
}
