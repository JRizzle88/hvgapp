<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Poll;
use App\Choice;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//disable foreign key check for this connection before running seeders
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// UserTableSeeder needs to be placed UNDER any other seeders that its related to for the columns to work properly
		$this->call('UserTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('PagesTableSeeder');
		// supposed to only apply to a single connection and reset it's self
    // but I like to explicitly undo what I've done for clarity
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	
	    $poll1 = Poll::create([
            'name' => "You shouldn't see me",
            'description' => "I'm a super secret already expired poll.",
            'starts_at' => Carbon::now()->subDays(2),
            'ends_at' => Carbon::now()->subDays(1),
        ]);
        $poll2 = Poll::create([
            'name' => "I'm expiring soon!",
            'description' => "I'm a super secret expiring soon poll.",
            'starts_at' => Carbon::now(),
            'ends_at' => Carbon::now()->addDays(1),
        ]);
        $poll3 = Poll::create([
            'name' => "I haven't started yet!",
            'description' => "I'm a super secret not ready yet poll.",
            'starts_at' => Carbon::now()->addDays(2),
            'ends_at' => Carbon::now()->subDays(4),
        ]);
        $choice4 = Choice::create([
            'poll_id' => $poll2->id,
            'description' => 'Choice 1'
        ]);
        $choice5 = Choice::create([
            'poll_id' => $poll2->id,
            'description' => 'Choice 2'
        ]);
        $choice6 = Choice::create([
            'poll_id' => $poll2->id,
            'description' => 'Choice 3'
        ]);

	}

}
