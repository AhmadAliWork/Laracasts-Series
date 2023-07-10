<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GameService
{
    private int $before;
    private int $after;
    private int $afterFourMonths;
    private int $current;

    public function __construct()
    {
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
        $this->afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $this->current = Carbon::now()->timestamp;
    }

    public function popularGames()
    {
        try {
            return Cache::remember('popular-games', now()->addMinutes(10), function () {
                return Http::withHeaders([
                    "Client-ID" => env("TWITCH_CLIENT_ID"),
                    "Authorization" => "Bearer " . $this->getAccessToken(),
                ])->withBody($this->fieldsGamesQuery(
                    before: $this->before,
                    after: $this->after,
                    rating: 5,
                    limit: 12
                ), "text/plain")
                    ->post("https://api.igdb.com/v4/games")
                    ->json();
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function recentlyReviewedGames()
    {
        try {
            return Cache::remember('recent-games', now()->addMinutes(10), function () {
                return Http::withHeaders([
                    "Client-ID" => env("TWITCH_CLIENT_ID"),
                    "Authorization" => "Bearer " . $this->getAccessToken(),
                ])->withBody($this->fieldsGamesQuery(
                    before: $this->before,
                    after: $this->current,
                    rating: 5,
                    limit: 3,
                ), "text/plain")
                    ->post("https://api.igdb.com/v4/games")
                    ->json();
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostAnticipatedGames()
    {
        try {
            return Cache::remember('anticipated-games', now()->addMinutes(10), function () {
                return Http::withHeaders([
                    "Client-ID" => env("TWITCH_CLIENT_ID"),
                    "Authorization" => "Bearer " . $this->getAccessToken(),
                ])->withBody($this->fieldsGamesQuery(
                    before: $this->before,
                    after: $this->afterFourMonths,
                    rating: 5,
                    limit: 4,
                ), "text/plain")
                    ->post("https://api.igdb.com/v4/games")
                    ->json();
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // same as Most Anticipated games and Coming Soon Will Work on future
    public function showGame($slug)
    {
        $query = "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, involved_companies.company.name,
                genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url,
                similar_games.name, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;
                where slug = \"$slug\";
                ";
        try {
          $cacheKey = 'show-game-' . $slug;
          // Clear cache for previous slug
          if (Cache::has('show-game')) {
            $previousSlug = Cache::get('show-game');
            Cache::forget('show-game-' . $previousSlug);
          }
          // Set current slug in cache
          Cache::put('show-game', $slug);
            return Cache::remember($cacheKey,15, function () use ($query) {
                return Http::withHeaders([
                    "Client-ID" => env("TWITCH_CLIENT_ID"),
                    "Authorization" => "Bearer " . $this->getAccessToken(),
                ])->withBody(
                    "$query", "text/plain")
                    ->post("https://api.igdb.com/v4/games")
                    ->json();
            });
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }

    private function getAccessToken()
    {
        return Cache::remember('twitch_access_token', Carbon::now()->addHours(1), function () {
            try {
                $response = Http::post("https://id.twitch.tv/oauth2/token?", [
                    "client_id" => env("TWITCH_CLIENT_ID"),
                    "client_secret" => env("TWITCH_CLIENT_SECRET"),
                    "grant_type" => "client_credentials"
                ])->json();
                return $response['access_token'];
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        });
    }


    private function fieldsGamesQuery($before, $after, $rating, $limit): string
    {
        $query = "
        fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
        where platforms = (48,49,130,6)
        & (first_release_date >= {$before}
        & first_release_date < {$after}
        & total_rating_count > $rating);
        sort total_rating_count desc;
        limit $limit;
    ";
        return $query;
    }

}



