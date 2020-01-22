<?php

namespace Tests\Feature;

use App\categorie;
use App\Http\Services\CategorieService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CategorieControllerTest extends TestCase
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
        $response = $this->get('/categories');

        $response->assertOk();

//        Assert that the response view was given a piece of categories:
        $response->assertViewHas('categories');

        $categories = $response->original->getData()['categories'];
//
        $this->assertInstanceOf(LengthAwarePaginator::class, $categories);
    }

    public function testStoreSuccess()
    {

        $this->instance(CategorieService::class, \Mockery::mock(CategorieService::class, function ($mock) {
            $mock->shouldReceive('store')->once();
        }));

        $file = UploadedFile::fake()->image('logo.png', 1, 1);

        $response = $this->call('POST', '/categories', ["name" => "anana", "slug" => "walo", '_token' => csrf_token()], [], ["image" => $file]);
        $response->assertRedirect('/categories');
    }

    // format git not accepted

    public function testStoreFailsFormatImage()
    {
        // format git not accepted
        $file = UploadedFile::fake()->image('logo.gif', 1, 1);

        $response = $this->call('POST', '/categories', ["name" => "anana", "slug" => "walo", '_token' => csrf_token()], [], ["image" => $file]);
        $response->assertSessionHasErrors(["image"]);
    }

    public function testUpdateSuccess()
    {

        $this->instance(CategorieService::class, \Mockery::mock(CategorieService::class, function ($mock) {
            $mock->shouldReceive('update')->once();
        }));

        $response = $this->call('PUT', '/categories/3', ["name" => "new name", "slug" => "new slug", '_token' => csrf_token()]);

        $response->assertRedirect('/categories');
    }

    public function testDeleteSuccess()
    {

        $this->instance(CategorieService::class, \Mockery::mock(CategorieService::class, function ($mock) {
            $mock->shouldReceive('destroy')->once();
        }));

        $response = $this->call('DELETE', '/categories/3', ['_token' => csrf_token()]);

        $response->assertRedirect('/categories');
    }

    public function testStoreFails()
    {
        $response = $this->POST('/categories');
        $response->assertStatus(419);
    }


}
