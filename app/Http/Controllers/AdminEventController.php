<?php
namespace App\Http\Controllers;
use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class EventController extends Controller
{
        public function event(){
            $event = event::all();
            return view('admin.home.calendar',[
                'title' => 'Calendar',
                'content_header'=> 'Edit',
                'banks' => 'CPEBank',
                'name' => 'OK',
                'calendar' => $calendar,

            ]);
        }

       public function index(Request $request)
            {
                $events = [];
                $data = Event::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.' +1 day'),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000',
                             'url' => 'pass here url and any route',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('fullcalender', compact('calendar'));
            }
}