<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = [
            ['icon' => '<i class="fa-solid fa-globe"></i>',          'title' => 'Web Development',    'desc' => 'We build fast, scalable, and modern web applications tailored to your business needs using the latest technologies.'],
            ['icon' => '<i class="fa-solid fa-mobile-screen"></i>',    'title' => 'Mobile Development', 'desc' => 'Cross-platform and native mobile apps for iOS and Android that deliver seamless user experiences.'],
            ['icon' => '<i class="fa-solid fa-pen-ruler"></i>',         'title' => 'UI/UX Design',       'desc' => 'User-centered design solutions that are visually stunning, intuitive, and conversion-focused.'],
            ['icon' => '<i class="fa-solid fa-cloud"></i>',             'title' => 'Cloud Solutions',    'desc' => 'Scalable cloud infrastructure, migration, and management services to keep your business agile.'],
            ['icon' => '<i class="fa-solid fa-shield-halved"></i>',     'title' => 'Cybersecurity',      'desc' => 'Comprehensive security audits, threat detection, and protection strategies to safeguard your digital assets.'],
            ['icon' => '<i class="fa-solid fa-lightbulb"></i>',         'title' => 'IT Consulting',      'desc' => 'Strategic technology consulting to align your IT investments with your business goals and growth plans.'],
        ];

        return view('pages.services', compact('services'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
