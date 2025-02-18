<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InterviewController extends Controller
{
    public function screen1(Request $request)
    {
        $data = collect(json_decode('[{"ID":1,"Title":"Title 1","Status":"Completed","Notes":"Notes for record 1"},{"ID":2,"Title":"Title 2","Status":"Pending","Notes":"Notes for record 2"},{"ID":3,"Title":"Title 3","Status":"Cancelled","Notes":"Notes for record 3"},{"ID":4,"Title":"Title 4","Status":"Completed","Notes":"Notes for record 4"},{"ID":5,"Title":"Title 5","Status":"Pending","Notes":"Notes for record 5"},{"ID":6,"Title":"Title 6","Status":"Pending","Notes":"Notes for record 6"},{"ID":7,"Title":"Title 7","Status":"Completed","Notes":"Notes for record 7"},{"ID":8,"Title":"Title 8","Status":"Active","Notes":"Notes for record 8"},{"ID":9,"Title":"Title 9","Status":"Pending","Notes":"Notes for record 9"},{"ID":10,"Title":"Title 10","Status":"Completed","Notes":"Notes for record 10"},{"ID":11,"Title":"Title 11","Status":"Cancelled","Notes":"Notes for record 11"},{"ID":12,"Title":"Title 12","Status":"Active","Notes":"Notes for record 12"},{"ID":13,"Title":"Title 13","Status":"Cancelled","Notes":"Notes for record 13"},{"ID":14,"Title":"Title 14","Status":"Pending","Notes":"Notes for record 14"},{"ID":15,"Title":"Title 15","Status":"Active","Notes":"Notes for record 15"},{"ID":16,"Title":"Title 16","Status":"Pending","Notes":"Notes for record 16"},{"ID":17,"Title":"Title 17","Status":"Pending","Notes":"Notes for record 17"},{"ID":18,"Title":"Title 18","Status":"Active","Notes":"Notes for record 18"},{"ID":19,"Title":"Title 19","Status":"Pending","Notes":"Notes for record 19"},{"ID":20,"Title":"Title 20","Status":"Active","Notes":"Notes for record 20"}]'));
        if ($request->has('search')) {
            $search = strtolower($request->search);
            $filteredData = $data->filter(function ($item) use ($search) {
                return str_contains(strtolower($item->ID), $search) || str_contains(strtolower($item->Title), $search) || str_contains(strtolower($item->Notes), $search);
            })->values();
        } else {
            $filteredData = $data;
        }

        return Inertia::render('Screen1', [
            'records' => fn() => $filteredData,
        ]);
    }

    public function screen2()
    {
        
        return Inertia::render('Screen2');
    }

    public function screen3()
    {
        return Inertia::render('Screen3');
    }
}
