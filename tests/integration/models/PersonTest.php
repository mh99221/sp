<?php

use App\Models\Person;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonTest extends TestCase
{
    /** @test */
    public function it_fetches_all_people()
    {
        factory(Person::class, 3)->create();
        
        $people = Person::all();
        
        $this->assertEquals(3, $people->count());
    }
}