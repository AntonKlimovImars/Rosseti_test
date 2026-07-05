<?php

namespace App\Http\Controllers;

use App\Models\ReportPage;
use Illuminate\Http\Request;

class ReportPageController extends Controller
{
    public function show(ReportPage $page)
    {
        if (!$page->is_active) {
            abort(404);
        }

        $page->load('subsections');

        // Get all active pages for the top navigation bar
        $allPages = ReportPage::where('is_active', true)
            ->orderBy('order')
            ->get(['id', 'number', 'title', 'slug']);

        return view('report-page', [
            'page' => $page,
            'allPages' => $allPages,
        ]);
    }
}
