<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class AboutController extends Controller
{
    public function index()
    {
        $companyInfo = [
            'name' => 'Your Blog Company',
            'founded' => '2025',
            'mission' => 'To share knowledge and ideas through well-crafted content.',
        ];

        $teamMembers = [
            [
                'name' => 'Jane Smith',
                'role' => 'Founder & CEO',
                'bio' => 'Jane founded the company in 2025 with a vision to create a platform for sharing ideas and knowledge.',
            ],
            [
                'name' => 'John Doe',
                'role' => 'Chief Editor',
                'bio' => 'John oversees all content and ensures it meets our high standards of quality and accuracy.',
            ],
            [
                'name' => 'Alice Johnson',
                'role' => 'Lead Developer',
                'bio' => 'Alice built our platform from the ground up using Laravel and modern web technologies.',
            ],
        ];

        return view('about.index', [
            'title' => 'About Us',
            'companyInfo' => $companyInfo,
            'teamMembers' => $teamMembers,
        ]);
    }
}
