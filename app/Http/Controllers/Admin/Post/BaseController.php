<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Service\PostServices;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostServices $service)
    {
        $this->service=$service;
    }
}
