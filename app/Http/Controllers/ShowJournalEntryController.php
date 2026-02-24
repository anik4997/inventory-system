<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalEntry;

class ShowJournalEntryController extends Controller
{
    public function index()
    {
        $entries = JournalEntry::orderBy('date','desc')->get();

        return view('journal_entries', compact('entries'));
    }
}
