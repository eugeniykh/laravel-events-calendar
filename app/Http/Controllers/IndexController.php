<?php
/**
 * Created by PhpStorm.
 * User: Eugene Khokhlov
 * Date: 24.02.18
 * Time: 12:59
 */

namespace App\Http\Controllers;


use App\Repositories\Events;

class IndexController extends Controller
{

    public function index(Events $eventsRepository) {

        $events = $eventsRepository->get();

        return view('index.index')->with(compact(['events']));
    }
}