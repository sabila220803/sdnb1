<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function index()
    {
        $schoolData = $this->school->getSchoolInfo();
        $achievements = $this->school->getAchievements();
        $programs = $this->school->getPrograms();
        $news = $this->school->getNews();

        return view('home.index', compact('schoolData', 'achievements', 'programs', 'news'));
    }
}
