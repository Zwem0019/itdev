<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Auditpage extends Component
{
    use WithPagination;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'auditdeadline';
    public $orderAsc = true;
    public $includeCompleted = false;
    public function sortBy($field)
    {
        if ($this->orderBy == $field) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $field;
    }
    public function render()
    {
        return view('livewire.Auditpage',
        [
            'audits' => \App\Models\Audit::search($this->search)
                    ->when(!$this->includeCompleted, function($query) {
                        return $query->where('auditstatus', '!=', 'Done');
                    })
                    ->where('AuditDeadline', '>=', date('Y-m-d'))
                    ->orwhere('AuditDeadline', '==', null)
                    ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                                    ->simplePaginate($this->perPage),

        ]);
    }
    public function changePinned($id){
        $audit = \App\Models\Audit::find($id);
        $audit->isPinned = !$audit->isPinned;
        $audit->save();
    }

}
