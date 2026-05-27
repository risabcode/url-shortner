<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortUrlTest extends TestCase
{
use RefreshDatabase;

public function roles()
{
    Role::create(['name' => 'SuperAdmin']);
    Role::create(['name' => 'Admin']);
    Role::create(['name' => 'Member']);
    Role::create(['name' => 'Sales']);
}

public function test_superadmin_cannot_create_url()
{
    $this->roles();

$user = User::factory()->create([
    'role_id' => 1
]);

$response = $this->actingAs($user)->post('/short-urls', [
        'original_url' => 'https://google.com'
]);

$response->assertForbidden();
}

public function test_admin_cannot_create_url()
{
$this->roles();

    $user = User::factory()->create([
        'role_id' => 2
    ]);

$response = $this->actingAs($user)->post('/short-urls', [
    'original_url' => 'https://youtube.com'
]);

    $response->assertForbidden();
}

public function test_member_cannot_create_url()
{
    $this->roles();

$user = User::factory()->create([
        'role_id' => 3
]);

$response = $this->actingAs($user)->post('/short-urls', [
    'original_url' => 'https://facebook.com'
]);

$response->assertForbidden();
}

public function test_admin_can_only_see_other_company_urls()
{
$this->roles();

$c1 = Company::create([
    'name' => 'Google'
]);

$c2 = Company::create([
'name' => 'Amazon'
]);

$admin = User::factory()->create([
        'company_id' => $c1->id,
    'role_id' => 2
]);

$user1 = User::factory()->create([
    'company_id' => $c1->id,
        'role_id' => 4
]);

$user2 = User::factory()->create([
        'company_id' => $c2->id,
    'role_id' => 4
]);

ShortUrl::create([
    'user_id' => $user1->id,
        'original_url' => 'https://google.com',
    'short_code' => 'abc12'
]);

ShortUrl::create([
        'user_id' => $user2->id,
    'original_url' => 'https://amazon.com',
        'short_code' => 'xyz34'
]);

$response = $this->actingAs($admin)->get('/short-urls');

$response->assertSee('https://amazon.com');

    $response->assertDontSee('https://google.com');
}

public function test_member_can_only_see_other_user_urls()
{
$this->roles();

$member = User::factory()->create([
    'role_id' => 3
]);

$other = User::factory()->create([
        'role_id' => 4
]);

ShortUrl::create([
    'user_id' => $member->id,
'original_url' => 'https://mine.com',
    'short_code' => 'mine11'
]);

ShortUrl::create([
        'user_id' => $other->id,
    'original_url' => 'https://other.com',
'short_code' => 'other22'
]);

$response = $this->actingAs($member)->get('/short-urls');

    $response->assertSee('https://other.com');

$response->assertDontSee('https://mine.com');
}

public function test_short_url_is_not_public()
{
$response = $this->get('/abc123');

    $response->assertStatus(404);
}
}