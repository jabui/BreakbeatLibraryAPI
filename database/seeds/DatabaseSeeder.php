<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tracks = json_decode(file_get_contents(database_path('seeds/tracks.json')));

        $artists = [];
        foreach ($tracks as $track) {
            $artists[$track->artist] = $track->artistPic ?? null;
        }

        foreach ($artists as $artist => $imgUrl) {
            DB::table('artists')->insert([
                'name' => $artist,
                'image_url' => $imgUrl
            ]);
        }

        foreach ($tracks as $track) {
            DB::table('tracks')->insert([
                'title' => $track->trackTitle,
                'artist_id' => array_search($track->artist, array_keys($artists), false) + 1,
                'description' => $track->desc,
                'drummer' => $track->drummer ?? null,
                'album' => $track->album,
                'album_artwork_url' => $track->albumImg ?? null,
                'label' => $track->label,
                'year' => $track->year,
                'sample_url' => $track->sample, // TODO how to serve
                'artwork_url' => $track->img,
            ]);
        }
    }
}
