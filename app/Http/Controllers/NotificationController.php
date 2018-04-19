<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Public\Js\Notification;

class NotificationController extends Controller
{
    public function home()
    {
        Notification::add('articles', 'articles');
        Notification::add('title', 'title');
        Notification::add('desc', 'desc');
        Notification::add('articles', 'articles');
        Notification::add('url', 'url');
    }
}
