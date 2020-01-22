<?php

namespace Tests\Feature;

use App\course;
use App\Http\Services\CourseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
//    use RefreshDatabase;

    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function setUp(): void
    {
        parent::setUp(); // performs set up
        Session::start();  // starts session, this is what handles csrf token part

        /*
                $this->faker = Faker\Factory::create('en_EN');

                $user = App\User::find(2);

                $this->be($user);*/

    }

    public function testIndex()
    {
        $response = $this->get('/course');

        $response->assertOk();

//        Assert that the response view was given a piece of courses:
        $response->assertViewHas('courses');

        $courses = $response->original->getData()['courses'];
//
        $this->assertInstanceOf(LengthAwarePaginator::class, $courses);
    }

    public function testStoreSuccess()
    {

        $this->instance(CourseService::class, \Mockery::mock(CourseService::class, function ($mock) {
            $mock->shouldReceive('store')->once();
        }));

        $file = UploadedFile::fake()->image('logo.png', 1, 1);

        $response = $this->call('POST', '/course', ["name" => "anana", "categorie_id" => "1", "slug" => "walo", '_token' => csrf_token()], [], ["image" => $file]);
        $response->assertRedirect('/course');
    }

    // format git not accepted

    public function testStoreFailsFormatImage()
    {
        // format git not accepted
        $file = UploadedFile::fake()->image('logo.gif', 1, 1);

        $response = $this->call('POST', '/course', ["name" => "anana", "categorie_id" => "1", "slug" => "walo", '_token' => csrf_token()], [], ["image" => $file]);
        $response->assertSessionHasErrors(["image"]);
    }

    public function testUpdateFails()
    {


        $response = $this->call('PUT', '/course/0', ["name" => "new name", "categorie_id" => "1", "slug" => "new slug", '_token' => csrf_token()]);

        $response->assertNotFound();
    }

    public function testDeleteFails()
    {

        $response = $this->call('DELETE', '/course/0', ['_token' => csrf_token()]);

        $response->assertNotFound();
    }

    public function testStoreFails()
    {
        $response = $this->POST('/course');
        $response->assertStatus(419);
    }


}
