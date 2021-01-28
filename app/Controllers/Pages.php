<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home') // accepts one argument named $page
    {
        if( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // we don't have a page for that
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // capitalize the first letter
        
        // loading the views in the order they should be displayed
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
}