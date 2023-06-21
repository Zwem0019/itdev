<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

class ActionsTable extends Component
{
    use WithPagination;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public function render()
    {
        return view('livewire.dashboard.actions-table');
    }
}
