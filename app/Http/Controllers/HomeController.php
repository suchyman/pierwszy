<?php

use App\Post;
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function getFilter()
    {
        $filter = \DataFilter::source(Article::with('author','categories'));
        $filter->add('title','Title', 'text');
        $filter->add('categories.name','Categories','tags');
        $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = \DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('id','ID', true)->style("width:70px");
        $grid->add('title','Title', true);
        $grid->add('author.fullname','Author');
        $grid->add('{{ implode(", ", $categories->pluck("name")->all()) }}','Categories');
        $grid->add('publication_date|strtotime|date[m/d/Y]','Date', true);
        $grid->add('body|strip_tags|substr[0,20]','Body');
        $grid->edit('/rapyd-demo/edit', 'Edit','modify|delete');
        $grid->paginate(10);

        return  view('rapyd::demo.filtergrid', compact('filter', 'grid'));
    }
}
