<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use MongoDB\Client as MongoClient;
use App\Models\WebPage; // Import the WebPage model

class CrawlerController extends Controller {
    public function crawl(Request $request) {
        // Validate the input
        $request->validate([
            'url' => 'required|url',
            'depth' => 'required|integer|min:1',
        ]);

        $url = $request->input('url');
        $depth = $request->input('depth');

        $client = new Client();

        // Check if the URL has been visited already.
        if (!$this->isUrlVisited($url)) {
            // Send a GET request to the URL.
            try {
                $response = $client->get($url);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return 'Error: ' . $e->getMessage();
            }

            // Check if the response is successful (status code 200).
            if ($response->getStatusCode() === 200) {
                // Save the URL to the MongoDB collection.
                WebPage::create([
                    'url' => $url,
                    'content' => $response->getBody()->getContents(),
                ]);
                $url->save();
                $response->save();
                return 'Crawling completed for ' . $url;
            }
        }

        return 'URL already crawled or invalid.';
    }

    // public function insert(Request $request)
    // {
    //     $webPage = new WebPage();
    //     $webPage->url = $request->get('url');
    //     $webPage->content = $request->get('content');
    //     $webPage->save();
    //     return ('WebPage has been successfully added');
    // }


    private function isUrlVisited($url) {
        return WebPage::where('url', $url)->exists();
    }

    public function getCrawlerResults() {
        // Logic to fetch crawler results from the database
        $crawlerResults = WebPage::all();

        return response()->json($crawlerResults);
    }
}
