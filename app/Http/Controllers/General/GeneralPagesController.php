<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class GeneralPagesController extends Controller
{
    public function index()
    {
        return Inertia::render('General/Home');
    }

    public function about()
    {
        return inertia('General/About');
    }
    public function services()
    {
        return Inertia::render('General/Services');
    }
    public function advisors()
    {
        return Inertia::render('General/Advisors', [
            'advisors' => require app_path('Utilities/advisors.php')
        ]);
    }

    public function clientRelationship()
    {
        return inertia('General/ClientRelation');
    }

    public function accessibility()
    {
        return inertia('General/Accessibilty');
    }

    public function privacy()
    {
        return inertia('General/Privacy');
    }

    public function terms()
    {
        return inertia('General/Terms');
    }

    public function disclosure()
    {
        return inertia('General/Disclosure');
    }

    public function contact(Request $request)
    {
        $advisor = $request->query('advisor');
        return inertia('General/Contact', [
            'advisor' => $advisor,
        ]);
    }

    public function wealthManagement()
    {
        return inertia('General/WealthManagement');
    }

    public function familySolutions()
    {
        return inertia('General/FamilySolutions');
    }

    public function careers()
    {
        return inertia('General/Careers');
    }

    public function insights(Request $request)
    {
        // Validate the 'topic' query parameter
        $validated = $request->validate([
            'topic' => 'nullable|string|max:255', // Ensure it's a valid string if present
        ]);

        $slug = $validated['topic'] ?? null;

        // Parse the slug(s) into an array
        $slugs = $slug ? array_map('trim', explode(',', $slug)) : [];

        // Fetch articles based on the related topic's slug(s)
        $articlesQuery = Article::select('title', 'slug', 'published_at', 'image')
            ->when($slugs, function ($query, $slugs) {
                $query->whereHas('topicModel', function ($subQuery) use ($slugs) {
                    $subQuery->whereIn('slug', $slugs);
                });
            });

        $articles = $articlesQuery->get();


        // Fetch topics
        $topics = Topic::select('title', 'slug')->whereHas('articleModels')->get();


        return inertia('General/Insights', [
            'articles' => $articles,
            'sentTopics' => $topics,
        ]);
    }

    public function showInsight($slug)
    {
        $article = Article::where('slug', $slug)->with(['topicModel', 'contentBlocks'])->first();

        if (!$article) {
            return abort(404);
        }

        return inertia('General/ShowInsight', [
            'article' => $article,
            'isShowInsight' => true,
            'relatedArticles' => Article::select('title','slug','published_at','image')->where('topic_id', $article->topic_id)
                ->whereNotIn('id', [$article->id]) 
                ->limit(3)
                ->get()
        ]);
    }




    public function download(Request $request)
    {
        $query = $request->query('doc');
        if (!$query) {
            return;
        }
        $fileToNameMapping = [
            'IA' => [
                'filename' => 'formADV-IA.pdf',
                'download_name' => 'CORIENT-IA-LLC-Form-ADV.pdf'
            ],
            'sum' => [
                'filename' => 'summary.pdf',
                'download_name' => 'FORM-CLIENT-RELATIONSHIP-SUMMARY.pdf'
            ],
            'private' => [
                'filename' => 'formADV-private.pdf',
                'download_name' => 'Corient-Private-LLC-Form-ADV.pdf'
            ],
        ];


        $filename = $fileToNameMapping[$query]['filename'];
        $path = storage_path('app/public/company/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        $name = $fileToNameMapping[$query]['download_name'];

        return response()->download($path, $name, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $name . '"',
        ]);
    }
}
