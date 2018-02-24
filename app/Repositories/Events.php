<?php
/**
 * Created by PhpStorm.
 * User: Eugene Khokhlov
 * Date: 24.02.18
 * Time: 13:49
 */

namespace App\Repositories;

use App\Event;

class Events {

    public function get() {
        return Event::get();
    }
}