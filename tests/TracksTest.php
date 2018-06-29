<?php

use App\Models\Track;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TracksTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_retrieve_all_tracks(): void
    {
        $tracks = Track::all()->toArray();

        $this->get('tracks')
            ->seeStatusCode(200)
            ->seeJsonEquals($tracks);
    }

    /** @test */
    public function can_store_a_new_track(): void
    {
        $payload = [
            'title' => 'Break',
            'description' => 'Crisp',
            'album' => 'Beat',
            'album_artwork_url' => 'http://sweetalbumart.url',
            'label' => 'Smack',
            'year' => '1999',
            'sample_url' => 'some/sample.mp3',
            'artwork_url' => 'http://radtrackartwork.url',
        ];

        $this->post('tracks', $payload)->seeStatusCode(201)
            ->seeJsonEquals($payload);
    }
}
