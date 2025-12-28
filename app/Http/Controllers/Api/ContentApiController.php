<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ContentType;
use App\Models\Entry;
use App\Models\Field;

class ContentApiController extends Controller
{
    public function index(string $project, string $type, Request $request)
    {
        $project = Project::where('slug', $project)->firstOrFail();

        // API key check
        if ($request->header('X-API-KEY') !== $project->api_key) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        $contentType = $project->contentTypes()
            ->where('slug', $type)
            ->firstOrFail();

        $entries = $contentType->entries()
            ->where('status', 'published')
            ->get()
            ->map(fn ($entry) => $entry->data);

        return response()->json($entries);
    }
}
