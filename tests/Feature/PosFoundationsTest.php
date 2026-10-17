<?php

namespace Tests\Feature;

use Tests\TestCase;

class PosFoundationsTest extends TestCase
{
    /**
     * Test the landing/home page loads with HTTP 200 and key elements.
     */
    public function test_home_page_returns_ok_and_displays_elements(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Point of Sale');
        $response->assertSee('Customer and staff records, kept in one clear place.');
        $response->assertSee('nav-capsule');
        $response->assertSee('glass-lens');
    }

    /**
     * Test the about page loads with HTTP 200 and description.
     */
    public function test_about_page_returns_ok_and_displays_elements(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('About');
        $response->assertSee('A simple place to view customer contact details and staff roles.');
        $response->assertSee('nav-capsule');
    }

    /**
     * Test the customers directory renders with static records.
     */
    public function test_customers_page_returns_ok_and_renders_records(): void
    {
        $response = $this->get('/customers');

        $response->assertStatus(200);
        $response->assertSee('Customer Accounts');
        $response->assertSee('Eleanor Vance');
        $response->assertSee('eleanor.vance@example.com');
        $response->assertSee('+1 (555) 234-5678');
        $response->assertSee('Marcus Thorne');
        $response->assertSee('Sophia Sterling');
        $response->assertSee('Lucas Gallagher');
        $response->assertSee('Clara Delgado');
        $response->assertSee('Julian Hayes');
    }

    /**
     * Test the users directory renders with static records.
     */
    public function test_users_page_returns_ok_and_renders_staff_records(): void
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
        $response->assertSee('User Accounts');
        $response->assertSee('clara.delgado');
        $response->assertSee('Clara Delgado');
        $response->assertSee('System Administrator');
        $response->assertSee('marcus.thorne');
        $response->assertSee('Store Manager');
        $response->assertSee('eleanor.vance');
        $response->assertSee('Head Cashier');
        $response->assertSee('lucas.gallagher');
        $response->assertSee('sophia.sterling');
        $response->assertSee('julian.hayes');
    }

    /**
     * Test that an invalid route properly yields 404 Not Found.
     */
    public function test_undefined_route_returns_404(): void
    {
        $response = $this->get('/non-existent-page-url');

        $response->assertStatus(404);
    }
}
