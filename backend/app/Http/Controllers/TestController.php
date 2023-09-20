<?php
// app/Http/Controllers/TestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller {
    public function testMongoDBConnection(Request $request) {
        try {
            DB::connection('mongodb')->getDatabaseName();
            return 'MongoDB connection is successful!';
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
