<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'user_id' => '1',
            'welcome' => 'أهلا بكم',
            'job' => 'مصمم',
            'cv' => 'kff',
            'cv' => 'kff',
            'description' => 'اسمي عمر عبد الله ، 24 سنة. أنا من مدينة الخرج بالمملكة العربية السعودية. على الرغم من مرضي (Quadriplegia) ، تخصصت في اللغة الإنجليزية وآدابها وتخرجت هذا العام من جامعة سطام بن عبد العزيز. أنا قادر على القيام بترجمة كتابية احترافية من / إلى العربية والإنجليزية دون عناء. لدي معرفة دقيقة لترجمة مقاطع الفيديو بشكل احترافي. لديّ أيضًا أمر جيد في برامج Microsoft Office.',
            'image' => 'laptop.jpeg',
            'first_image' => 'first.png',
            'second.png'=> 'second.png'
            
            
        ]);
    }
}
