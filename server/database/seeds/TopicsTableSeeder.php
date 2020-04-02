<?php

use Domain\Topic\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new Topic();
        $subject->display_name = 'Marketing, Communicatie en Sales';
        $subject->slug = 'marketing-communicatie-sales';
        $subject->description = 'Cursussen over marketing, communicatie en ales.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Voeding';
        $subject->slug = 'voeding';
        $subject->description = 'Cursussen over Voeding';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Fotografie';
        $subject->slug = 'fotografie';
        $subject->description = 'Cursussen over fotografie';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Retail, Handel en Ondernemerschap';
        $subject->slug = 'retail-handel-ondernemerschap';
        $subject->description = 'Cursussen over retail, handel en ondernemerschap';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Informatica';
        $subject->slug = 'informatica';
        $subject->description = 'Cursussen over informatica.';
        $subject->status = 'publish';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Gezondheidszorg en Welzijn';
        $subject->slug = 'gezondheidszorg-en-welzijn';
        $subject->description = 'Cursussen over gezondheidszorg en welzijn';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Talen';
        $subject->slug = 'talen';
        $subject->description = 'Cursussen over talen.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Muziek';
        $subject->slug = 'muziek';
        $subject->description = 'Cursussen over de muziek.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Management en Leidinggeven';
        $subject->slug = 'management-en-leidinggeven';
        $subject->description = 'Cursussen over management en leidinggeven.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Onderwijs en Pedagogiek';
        $subject->slug = 'onderwijs-en-pedagogiek';
        $subject->description = 'Cursussen over onderwijs en pedagogiek.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Psychologie en Coaching';
        $subject->slug = 'psychologie-en-coaching';
        $subject->description = 'Cursussen over psychologie en coaching.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Recht en Bestuur';
        $subject->slug = 'recht-en-bestuur';
        $subject->description = 'Cursussen over recht en bestuur.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Toerisme en Recreatie';
        $subject->slug = 'toerisme-en-recreatie';
        $subject->description = 'Cursussen over toerisme en recreatie.';
        $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->display_name = 'Schrijven';
        $subject->slug = 'schrijven';
        $subject->description = 'Cursussen over schrijven.';
        $subject->status = 'publish';
        $subject->save();
    }
}
