<?php

namespace Database\Seeders;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Playlists
        $playlists = [
            [
                'title' => 'Late Night Vibes',
                'description' => 'A collection of lo-fi and ambient tracks for late night coding sessions or winding down.',
                'url' => 'https://open.spotify.com/playlist/37i9dQZF1DX8Uebsc0zi3v',
            ],
            [
                'title' => 'Retro Future',
                'description' => 'Synthwave and retrowave beats to transport you back to the neon-soaked 80s.',
                'url' => 'https://open.spotify.com/playlist/37i9dQZF1DXdLEN6aqF2p2',
            ],
            [
                'title' => 'Ethereal Dreams',
                'description' => 'Dreamy dream-pop and shoegaze tracks that feel like a warm hug for your ears.',
                'url' => 'https://open.spotify.com/playlist/37i9dQZF1DX6uhvH69C7Iy',
            ],
            [
                'title' => 'Pixelated Memories',
                'description' => 'Chiptune and game soundtracks that remind me of simpler times and 8-bit adventures.',
                'url' => 'https://open.spotify.com/playlist/37i9dQZF1DX84SclpZzX6f',
            ],
        ];

        foreach ($playlists as $playlist) {
            Playlist::create($playlist);
        }

        // Sample Music Reviews
        $musicReviews = [
            [
                'title' => 'Bury Me at Makeout Creek',
                'artist' => 'Mitski',
                'type' => 'album',
                'stars' => 5,
                'is_favorite' => true,
                'review_date' => now()->subDays(10),
                'description' => 'Raw, emotional, and devastatingly beautiful. Every track hits like a punch to the gut in the best way possible.',
            ],
            [
                'title' => 'I Glow Pink in the Night',
                'artist' => 'Mitski',
                'type' => 'song',
                'stars' => 5,
                'is_favorite' => true,
                'review_date' => now()->subDays(5),
                'description' => 'The atmosphere of this song is unmatched. It perfectly captures that feeling of longing and isolation.',
            ],
            [
                'title' => 'Pink Noise',
                'artist' => 'Laura Mvula',
                'type' => 'album',
                'stars' => 5,
                'is_favorite' => false,
                'review_date' => now()->subDays(30),
                'description' => 'An incredible 80s-inspired synth-pop journey. The production is lush and her vocals are powerful.',
            ],
            [
                'title' => 'Stay Soft',
                'artist' => 'Mitski',
                'type' => 'single',
                'stars' => 4,
                'is_favorite' => false,
                'review_date' => now()->subDays(2),
                'description' => 'A groovy but dark track that explores vulnerability and protection. The bassline is infectious.',
            ],
        ];

        foreach ($musicReviews as $review) {
            Music::create($review);
        }
    }
}
