<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Attributes\On; 

class UserAccount extends Component
{
    public $user;
    public $acRoi = '';
    public $acBal = '';
    public $perMonRoi = '';
    public $plusRoi = '';
    public $plans = [];
    
    protected $listeners = [
        'savedEditPerPlan' => '$refresh',
    ];

    public function mount(User $sentUser)
    {
        $this->user = $sentUser;
        $this->acRoi = $sentUser->acRoi;
        $this->acBal = $sentUser->acBal;
        $this->perMonRoi = $sentUser->perMonRoi;
    }

    protected function rules()
    {
        return [

            'acBal' => ['required', 'integer', 'numeric'],
            'acRoi' => ['required', 'numeric'],
            'perMonRoi' => ['required', 'numeric'],


        ];
    }

    public function editRoi()
    {
        $this->validate(
            [
                'acRoi' => ['required', 'numeric'],
            ],
        );

        $this->user->acRoi = $this->acRoi;
        $this->user->save();
        $this->dispatch('savedRoi');
    }

    public function editPerMonRoi()
    {
        $this->validate(
            [
                'perMonRoi' => ['required', 'numeric'],
            ],
        );

        $this->user->perMonRoi = $this->perMonRoi;
        $this->user->save();
        $this->dispatch('savedPerMonRoi');
    }

    public function editCapital()
    {
        $this->validate(
            [
                'acBal' => ['required', 'numeric'],
            ],
        );

        $this->user->acBal = $this->acBal;
        $this->user->save();
        $this->dispatch('savedCapital');
    }

    public function addProfit()
    {
        $this->validate([
            'plusRoi' => 'required|numeric|integer',
        ], [], [
            'plusRoi' => 'Amount to add',
        ]);

        $this->user->acRoi += $this->plusRoi;
        $this->user->perMonRoi += $this->plusRoi;
        $this->user->save();
        $this->acRoi += $this->plusRoi;
        $this->perMonRoi += $this->plusRoi;
        $this->plusRoi = '';
        $this->dispatch('savedProfit');
    }

    public function editPerPlan($id, $total, $roi)
    {
        $validated = Validator::make([
            'id' => $id,
            'total' => $total,
            'roi' => $roi,
        ], [
            'id' => 'required|exists:plans',
            'total' => 'required|integer|numeric',
            'roi' => 'required|integer|numeric',
        ], [], [
            'id' => 'Plan',
            'total' => 'Capital',
            'roi' => 'R.O.I',
        ])->validate();
        
        $user = User::find($this->user->id);

        $this->user->plans()->updateExistingPivot($id, [
            'total' => $validated['total'],
            'roi' => $validated['roi'],
        ]);
        
    
        $this->user->acRoi = $this->user->plans()->sum('plan_user.roi');
        $this->user->acBal = $this->user->plans()->sum('plan_user.total');
        $this->user->save();

        $this->dispatch('savedEditPerPlan');        
    }

    public function render()
    {
        return view('livewire.admin.user-account', [
            'user' => User::with(['withdrawals', 'deposits', 'userwallets'])->find($this->user->id),
        ]);
    }
}
