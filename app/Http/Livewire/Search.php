<?php

namespace App\Http\Livewire;

use App\Models\department;
use App\Models\doctor;
use App\Models\employee;
use App\Models\hod;
use App\Models\rooms;
use Livewire\Component;

class Search extends Component
{
    public $item;

    // public function search()
    // {
    //    dd( $this->item);
    // }
    public function search()
    {
        $results = rooms::where('name', 'like', '%' . $this->item . '%')->get();
        $results = array_merge($results->all(), doctor::where('id', 'like', '%' . $this->item . '%')->get()->all());
        $results = array_merge($results, department::where('name', 'like', '%' . $this->item . '%')->get()->all());
        $results = array_merge($results, employee::where('name', 'like', '%' . $this->item . '%')->get()->all());
        // return the results or render a view with the results
        return view('search-results', ['results' => $results]);
    }
    public function render()
    {
        return view('livewire.search');
    }
}
