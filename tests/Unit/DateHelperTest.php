<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class DateHelperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_get_day_difference()
    {
        $response = $this->postJson('/api/getdaydiff', [
                'date1' => '2021-2-1',
                'date2' => '2021-12-1',
                'format' => 'Hours',
            ]);
        $response->assertStatus(200);
    }
    public function test_get_week_difference()
    {
        $response = $this->postJson('/api/getweeknumber', [
                'date1' => '2021-2-1',
                'date2' => '2021-12-1',
                'format' => 'minutes',
            ]);
        $response->assertStatus(200);
    }
    public function test_get_week_days()
    {
        $response = $this->postJson('/api/getweekdays', [
                'date1' => '2021-2-1',
                'date2' => '2021-12-1',
                'format' => 'seconds',
            ]);
        $response->assertStatus(200);
    }

    public function test_time_zone_comparasion()
    {
        $response = $this->postJson('/api/getconverteddate', [
            'timezone1' => 'Asia/Kathmandu',
            'timezone2' => 'Australia/Sydney',
            'time' => '2020-11-1',
            'format' => 'seconds',
        ]);
    $response->assertStatus(200);
    }
}
