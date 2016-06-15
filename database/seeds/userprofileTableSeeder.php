<?php

use Illuminate\Database\Seeder;

class UserprofileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();

        $limit = 30;
        $sid=30;
                $sname=5;
//        $ii=0;
//  for ($i = 0; $i < $limit; $i++) {
//      $ii=$i+5;
//            DB::table('users')->insert([ //,
//                'name' => 'user'.$ii,
//                'email' => $faker->unique()->email,
//                'phone' => $faker->phoneNumber,
//                'firstname' => $faker->firstName,
//                'lastname' => $faker->lastName,
//            ]);
//        }
//        
        for ($j = 0; $j < $limit; $j++) {
        $ij=$j+$sid;
        $ik=$j+$sname;
            DB::table('ushers')->insert([ //,
                'user_id'=>$ij,
                 'username' => 'user'.$ik,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'ethnicity' => $faker->randomElement($array = array ('black','asian','caucasian','hispanic')),
                'zip' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => 'USA',
                'phone1' => $faker->phoneNumber,
                'phone2' => $faker->phoneNumber,
                'cvname' => $faker->word().'doc',
                'height' => $faker->randomFloat($nbMaxDecimals=2,$min=1, $max=2),
                'blousesize' => $faker->randomFloat($nbMaxDecimals=0,$min=5, $max=15),
                'shirtsize' => $faker->randomFloat($nbMaxDecimals=0,$min=25, $max=45),
                'pantsize' => $faker->randomFloat($nbMaxDecimals=0,$min=25, $max=45),
                'skirtsize' => $faker->randomFloat($nbMaxDecimals=0,$min=25, $max=45),
                'haircolor' => $faker->colorName ,
                'eyecolor' => $faker->colorName ,
                'gender' => $faker->randomElement($array = array ('male','female')),
                'seeking' => $faker->randomElement($array = array ('christian events','open')),
                'religion' => $faker->randomElement($array = array ('christian','muslim','jew','hindu','other','non religious')),
                'profession' => $faker->word(),
                'education' => $faker->randomElement($array = array ('High School','College','Graduate degree')),
                'languages' => $faker->randomElement($array = array ('yoruba','hausa','ibo')),
                'school' => 'University of '.$faker->word(),
               // 'main_image' =>'',
               // 'main_image_id' => '',
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
                
                            ]);
        }
        
//             
//    
    
    //client
     for ($j = 0; $j < $limit; $j++) {
         $ij=$j+$sid;
        $ik=$j+$sname;
            DB::table('clients')->insert([ //,
                'user_id'=>$ij,
                'username' => 'user'.$ik,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'ethnicity' => $faker->randomElement($array = array ('black','asian','caucasian','hispanic')),
                'zip' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => 'USA',
                'phone1' => $faker->phoneNumber,
                'phone2' => $faker->phoneNumber,
                'cvname' => $faker->word().'doc',
                'bank' => $faker->randomElement($array = array ('fidelity','GTB','UBA','First bank','zenith')),
                'accountnum' => $faker->randomFloat($nbMaxDecimals=0,$min=12345678, $max=999999999),
                'creditcard' => $faker->creditCardType,  //randomElement($array = array ('visa','master card','amex')),
                'ccnumber' => $faker->creditCardNumber,//randomFloat($nbMaxDecimals=0,$min=5, $max=15),
                  // 'languages' => $faker->randomElement($array = array ('yoruba','hausa','ibo')),
               // 'school' => 'University of '.$faker->word(),
                //'main_image' =>'',
                //'main_image_id' => '',
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
                
                            ]);
        }
        
             for ($j = 0; $j < $limit; $j++) {
        $ij=$j+$sid;
        $ik=$j+$sname;
            DB::table('events')->insert([ //,
                'user_id'=>$ij,
               // 'username' => 'user'.$ik,
                'zip' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => 'USA',
                'phone1' => $faker->phoneNumber,
                'phone2' => $faker->phoneNumber,
                'event_date' => $faker->dateTime($min='now'),
                'time_from' => $faker->randomFloat($nbMaxDecimals=0,$min=1, $max=4).' PM',
                'time_to' => $faker->randomFloat($nbMaxDecimals=0,$min=5, $max=11).' PM',
                'duration' => $faker->randomFloat($nbMaxDecimals=0,$min=5, $max=15).' hours',
                'event_rate' => $faker->randomElement($array = array ('5000','10000')),
                  // 'languages' => $faker->randomElement($array = array ('yoruba','hausa','ibo')),
                //'school' => 'University of '.$faker->word(),
                //'main_image' =>'',
               // 'main_image_id' => '',
                'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
                
                            ]);
        }
             
    }
}
