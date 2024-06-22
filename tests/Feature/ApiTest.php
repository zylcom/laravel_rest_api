<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiTest extends TestCase
{
  /**
   * Setup the test environment.
   *
   * @return string
   */
  public function testBearer()
  {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');

    Artisan::call('passport:client --password');
    Artisan::call('passport:client --personal');

    $client_id = 1;
    $client_secret = DB::table('oauth_clients')->where('id', $client_id)->value('secret');

    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/oauth/token', [
      'grant_type' => 'password',
      'client_id' => $client_id,
      'client_secret' => $client_secret,
      'username' => 'no@name.com',
      'password' => 'SangatAmatRahasia',
      'scope' => '',
    ]);

    $response->assertStatus(200);

    $data = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
      'grant_type' => 'password',
      'client_id' => $client_id,
      'client_secret' => $client_secret,
      'username' => 'no@name.com',
      'password' => 'SangatAmatRahasia',
      'scope' => '',
    ]);

    $accessToken = $data->json()['access_token'];
    return $accessToken;
  }

  /**
   * Test get post page 1.
   *
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_post_from_1_to_5(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts?page=1');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          ['id' => 1, 'title' => 'Ini Title 1', 'excerpt' => 'Ini adalah content dari post 1', 'image' => 'ini-image-1.jpg'],
          ['id' => 2, 'title' => 'Ini Title 2', 'excerpt' => 'Ini adalah content dari post 2', 'image' => 'ini-image-2.jpg'],
          ['id' => 3, 'title' => 'Ini Title 3', 'excerpt' => 'Ini adalah content dari post 3', 'image' => 'ini-image-3.jpg'],
          ['id' => 4, 'title' => 'Ini Title 4', 'excerpt' => 'Ini adalah content dari post 4', 'image' => 'ini-image-4.jpg'],
          ['id' => 5, 'title' => 'Ini Title 5', 'excerpt' => 'Ini adalah content dari post 5', 'image' => 'ini-image-5.jpg'],
        ],
        'message' => 'Posts retrieved successfully.'
      ]
    );
  }

  /**
   * Test get post page 2.
   *
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_post_from_6_to_10(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts?page=2');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          ['id' => 6, 'title' => 'Ini Title 6', 'excerpt' => 'Ini adalah content dari post 6', 'image' => 'ini-image-6.jpg'],
          ['id' => 7, 'title' => 'Ini Title 7', 'excerpt' => 'Ini adalah content dari post 7', 'image' => 'ini-image-7.jpg'],
          ['id' => 8, 'title' => 'Ini Title 8', 'excerpt' => 'Ini adalah content dari post 8', 'image' => 'ini-image-8.jpg'],
          ['id' => 9, 'title' => 'Ini Title 9', 'excerpt' => 'Ini adalah content dari post 9', 'image' => 'ini-image-9.jpg'],
          ['id' => 10, 'title' => 'Ini Title 10', 'excerpt' => 'Ini adalah content dari post 10', 'image' => 'ini-image-10.jpg'],
        ],
        'message' => 'Posts retrieved successfully.'
      ]
    );
  }

  /**
   * Test get post page 3.
   *
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_post_from_11_to_15(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts?page=3');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          ['id' => 11, 'title' => 'Ini Title 11', 'excerpt' => 'Ini adalah content dari post 11', 'image' => 'ini-image-11.jpg'],
          ['id' => 12, 'title' => 'Ini Title 12', 'excerpt' => 'Ini adalah content dari post 12', 'image' => 'ini-image-12.jpg'],
          ['id' => 13, 'title' => 'Ini Title 13', 'excerpt' => 'Ini adalah content dari post 13', 'image' => 'ini-image-13.jpg'],
          ['id' => 14, 'title' => 'Ini Title 14', 'excerpt' => 'Ini adalah content dari post 14', 'image' => 'ini-image-14.jpg'],
          ['id' => 15, 'title' => 'Ini Title 15', 'excerpt' => 'Ini adalah content dari post 15', 'image' => 'ini-image-15.jpg'],
        ],
        'message' => 'Posts retrieved successfully.'
      ]
    );
  }

  /**
   * Test get post page 4.
   *
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_post_from_16_to_20(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts?page=4');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          ['id' => 16, 'title' => 'Ini Title 16', 'excerpt' => 'Ini adalah content dari post 16', 'image' => 'ini-image-16.jpg'],
          ['id' => 17, 'title' => 'Ini Title 17', 'excerpt' => 'Ini adalah content dari post 17', 'image' => 'ini-image-17.jpg'],
          ['id' => 18, 'title' => 'Ini Title 18', 'excerpt' => 'Ini adalah content dari post 18', 'image' => 'ini-image-18.jpg'],
          ['id' => 19, 'title' => 'Ini Title 19', 'excerpt' => 'Ini adalah content dari post 19', 'image' => 'ini-image-19.jpg'],
          ['id' => 20, 'title' => 'Ini Title 20', 'excerpt' => 'Ini adalah content dari post 20', 'image' => 'ini-image-20.jpg'],
        ],
        'message' => 'Posts retrieved successfully.'
      ]
    );
  }

  /**
   * Test detail post id 5.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_detail_post_with_id_5(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/5');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 5,
          'user_id' => 1,
          'category_id' => 2,
          'title' => 'Ini Title 5',
          'content' => 'Ini adalah content dari post 5',
          'image' => 'ini-image-5.jpg',
        ],
        'message' => 'Post retrieved successfully.'
      ]
    );
  }

  /**
   * Test detail post id 10.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_detail_post_with_id_10(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/10');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 10,
          'user_id' => 1,
          'category_id' => 1,
          'title' => 'Ini Title 10',
          'content' => 'Ini adalah content dari post 10',
          'image' => 'ini-image-10.jpg',
        ],
        'message' => 'Post retrieved successfully.'
      ]
    );
  }

  /**
   * Test detail post id 15.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_detail_post_with_id_15(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/15');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 15,
          'user_id' => 1,
          'category_id' => 3,
          'title' => 'Ini Title 15',
          'content' => 'Ini adalah content dari post 15',
          'image' => 'ini-image-15.jpg',
        ],
        'message' => 'Post retrieved successfully.'
      ]
    );
  }

  /**
   * Test detail post id 20.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_return_json_response_detail_post_with_id_20(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/20');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 20,
          'user_id' => 1,
          'category_id' => 2,
          'title' => 'Ini Title 20',
          'content' => 'Ini adalah content dari post 20',
          'image' => 'ini-image-20.jpg',
        ],
        'message' => 'Post retrieved successfully.'
      ]
    );
  }

  /**
   * Test invalid token.
   * 
   * @return void
   */
  public function test_api_return_json_response_unauthenticated_when_invalid_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . 'invalid-token'
    ])->get('/api/v1/posts');

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );
  }

  /**
   * Test unauthtenicated user.
   * 
   * @return void
   */
  public function test_api_return_json_response_unauthenticated_when_no_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->get('/api/v1/posts');

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );
  }

  /**
   * Test get detail with invalid token.
   * 
   * @return void
   */
  public function test_api_get_detail_return_json_response_unauthenticated_when_invalid_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . 'invalid-token'
    ])->get('/api/v1/posts/1');

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );
  }

  /**
   * Test get detail with no token.
   * 
   * @return void
   */
  public function test_api_get_detail_return_json_response_unauthenticated_when_no_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->get('/api/v1/posts/1');

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );
  }

  /**
   * Test get detail with invalid id.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_get_detail_return_json_response_not_found_when_invalid_id(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/0');

    $response->assertStatus(404)->assertJson(
      [
        'success' => false,
        'message' => 'Post not found.'
      ]
    );
  }

  /**
   * Test create post.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_create_post_return_json_response_success(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->post('/api/v1/posts', [
      'category_id' => 1,
      'title' => 'Ini Title Baru',
      'content' => 'Ini adalah content dari post baru',
      'image' => 'ini-image-baru.jpg'
    ]);

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 21,
          'user_id' => Auth::user()->id,
          'category_id' => 1,
          'title' => 'Ini Title Baru',
          'content' => 'Ini adalah content dari post baru',
          'image' => 'ini-image-baru.jpg',
        ],
        'message' => 'Post created successfully.'
      ]
    );

    $this->assertDatabaseHas('posts', [
      'id' => 21,
      'user_id' => Auth::user()->id,
      'category_id' => 1,
      'title' => 'Ini Title Baru',
      'content' => 'Ini adalah content dari post baru',
      'image' => 'ini-image-baru.jpg'
    ]);
  }

  /**
   * Test create post with invalid token.
   * 
   * @return void
   */
  public function test_api_create_post_return_json_response_unauthenticated_when_invalid_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . 'invalid-token'
    ])->post('/api/v1/posts', [
      'category_id' => 1,
      'title' => 'Ini Title Baru Invalid',
      'content' => 'Ini adalah content dari post baru invalid',
      'image' => 'ini-image-baru-invalid.jpg'
    ]);

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );

    $this->assertDatabaseMissing('posts', [
      'id' => 22,
      'category_id' => 1,
      'title' => 'Ini Title Baru Invalid',
      'content' => 'Ini adalah content dari post baru invalid',
      'image' => 'ini-image-baru-invalid.jpg'
    ]);
  }

  /**
   * Test create post with no token.
   * 
   * @return void
   */
  public function test_api_create_post_return_json_response_unauthenticated_when_no_token()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/v1/posts', [
      'category_id' => 1,
      'title' => 'Ini Title Baru No Token',
      'content' => 'Ini adalah content dari post baru no token',
      'image' => 'ini-image-baru-no-token.jpg'
    ]);

    $response->assertStatus(401)->assertJson(
      [
        'message' => 'Unauthenticated.'
      ]
    );

    $this->assertDatabaseMissing('posts', [
      'id' => 23,
      'category_id' => 1,
      'title' => 'Ini Title Baru No Token',
      'content' => 'Ini adalah content dari post baru no token',
      'image' => 'ini-image-baru-no-token.jpg'
    ]);
  }

  /**
   * Test create post with invalid input.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_create_post_return_json_response_validation_error_when_invalid_input(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->post('/api/v1/posts', [
      'title' => 'Ini Title Invalid',
      'content' => 'Ini adalah content dari post baru invalid',
      'image' => 'ini-image-baru-invalid.jpg'
    ]);

    $response->assertStatus(404)->assertJson(
      [
        'success' => false,
        'message' => 'Validation Error.',
        'data' => [
          'category_id' => [
            'The category id field is required.'
          ]
        ]
      ]
    );

    $this->assertDatabaseMissing('posts', [
      'id' => 24,
      'title' => 'Ini Title Invalid',
      'content' => 'Ini adalah content dari post baru invalid',
      'image' => 'ini-image-baru-invalid.jpg'
    ]);
  }

  /**
   * Test get new post.
   * 
   * @depends testBearer
   * @return void
   */
  public function test_api_get_new_post(string $accessToken)
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $accessToken
    ])->get('/api/v1/posts/21');

    $response->assertStatus(200)->assertJson(
      [
        'success' => true,
        'data' => [
          'id' => 21,
          'user_id' => 1,
          'category_id' => 1,
          'title' => 'Ini Title Baru',
          'content' => 'Ini adalah content dari post baru',
          'image' => 'ini-image-baru.jpg',
        ],
        'message' => 'Post retrieved successfully.'
      ]
    );
  }

  /**
   * Test login.
   * 
   * @return void
   */
  public function test_api_login()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/login', [
      'email' => 'no@name.com',
      'password' => 'SangatAmatRahasia'
    ]);

    $response->assertJson([
      'success' => true,
      'data' => [
        'name' => 'No Name'
      ],
      'message' => 'User login successfully.'
    ]);
  }

  /**
   * Test login with invalid email.
   * 
   * @return void
   */
  public function test_api_login_with_invalid_email()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/login', [
      'email' => 'invalid-email',
      'password' => 'SangatAmatRahasia'
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Unauthorized.',
      'data' => [
        'error' => 'Unauthorized'
      ]
    ]);
  }

  /**
   * Test login with invalid password.
   * 
   * @return void
   */
  public function test_api_login_with_invalid_password()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/login', [
      'email' => 'no@name.com',
      'password' => 'invalid-password'
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Unauthorized.',
      'data' => [
        'error' => 'Unauthorized'
      ]
    ]);
  }

  /**
   * Test login with invalid email and password.
   * 
   * @return void
   */
  public function test_api_login_with_invalid_email_and_password()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/login', [
      'email' => 'invalid-email',
      'password' => 'invalid-password'
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Unauthorized.',
      'data' => [
        'error' => 'Unauthorized'
      ]
    ]);
  }

  /**
   * Test registration.
   * 
   * @return void
   */
  public function test_api_registration()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Registration',
      'email' => 'test@regis.com',
      'password' => '12345678',
      'c_password' => '12345678',
    ]);

    $response->assertStatus(200)->assertJson([
      'success' => true,
      'data' => [
        'name' => 'Test Registration'
      ],
      'message' => 'User register successfully.'
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test registration with duplicated email.
   * 
   * @return void
   */
  public function test_api_registration_with_duplicated_email()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Registration',
      'email' => 'test@regis.com',
      'password' => '12345678',
      'c_password' => '12345678',
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Validation Error.',
      'data' => [
        'email' => [
          'The email has already been taken.'
        ]
      ]
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test registration with invalid email.
   * 
   * @return void
   */
  public function test_api_registration_with_invalid_email()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Invalid Registration',
      'email' => 'invalid-email',
      'password' => '12345678',
      'c_password' => '12345678',
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Validation Error.',
      'data' => [
        'email' => ['The email must be a valid email address.']
      ]
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test registration with invalid password.
   * 
   * @return void
   */
  public function test_api_registration_with_invalid_password()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Invalid Registration',
      'email' => 'test@password.com',
      'password' => '12345678',
      'c_password' => 'invalid-password',
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Validation Error.',
      'data' => [
        'c_password' => ['The c password and password must match.']
      ]
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test registration with too short password.
   * 
   * @return void
   */
  public function test_api_registration_with_too_short_password()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Invalid Registration',
      'email' => 'test@password.com',
      'password' => '69',
      'c_password' => '69',
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Validation Error.',
      'data' => [
        'password' => ['The password must be at least 8 characters.']
      ]
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test registration with invalid email and password.
   * 
   * @return void
   */
  public function test_api_registration_with_invalid_email_and_password()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/register', [
      'name' => 'Test Invalid Registration',
      'email' => 'invalid-email',
      'password' => 'invalid-password',
      'c_password' => 'invilad-password',
    ]);

    $response->assertStatus(404)->assertJson([
      'success' => false,
      'message' => 'Validation Error.',
      'data' => [
        'email' => ['The email must be a valid email address.'],
        'c_password' => ['The c password and password must match.']
      ]
    ]);

    $this->assertDatabaseCount('users', 2);
  }

  /**
   * Test login use new account.
   * 
   * @return void
   */
  public function test_api_login_use_new_account()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json'
    ])->post('/api/login', [
      'email' => 'test@regis.com',
      'password' => '12345678'
    ]);

    $response->assertJson([
      'success' => true,
      'data' => [
        'name' => 'Test Registration'
      ],
      'message' => 'User login successfully.'
    ]);
  }
}
