<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Togratis;
use App\Models\Paketsaya;
use App\Models\Tampungsoal;
use Livewire\Attributes\On;
use App\Models\Simpanjawaban;
use App\Models\Simpanjawabansubmit;
use Illuminate\Support\Facades\Request;

class Pembahasan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paketSaya, $totalSteps, $paketId, $status, $kodeSubmit;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($subpaket_id, $paket_id, $kode_submit = null)
    {
        $admin = User::where('role', 'admin')->get();
        $tangkap_id = array();
        foreach ($admin as $value) {
            $tangkap_id[] = $value->id;
            $tangkap_id[] = auth()->user()->id;
        }

        $this->kodeSubmit = $kode_submit;

        // dd($tangkap_id);
        $this->paketSaya = Paketsaya::whereIn('user_id', $tangkap_id)
            ->where('paket_id', $paket_id)->first();

        $this->status = $this->paketSaya->status;

        // if ($this->status == 3) {
        //     $this->datas = Tampungsoal::where('subpaket_id', $subpaket_id)
        //         ->orderBy('banksoal_id', 'asc')
        //         ->get();
        // } else {
        $this->datas = Tampungsoal::where('subpaket_id', $subpaket_id)
            ->orderBy('banksoal_id', 'asc')
            ->get();
        // }

        $this->paketId = $paket_id;

        // if ($this->status == 3) {
        //     $this->jawabann = Simpanjawabansubmit::where('user_id', auth()->user()->id)
        //         ->where('kode_submit', $kode_submit)
        //         ->orderBy('togratis_id')
        //         ->get();
        // } else {
        $this->jawabann = Simpanjawabansubmit::where('user_id', auth()->user()->id)
            ->where('kode_submit', $kode_submit)
            ->orderBy('banksoal_id')
            ->get();
        // }

        // dd($this->jawabann);

        $this->totalSteps = $this->datas->count();
        $this->currentStep;
    }

    public function render()
    {
        return view('livewire.pembahasan');
    }

    public function nextSteps()
    {
        $this->currentStep++;
        $this->dispatch('pageChanged', $this->getPaket()->paket->tampungpaket->subpaket_id, $this->getPaket()->paket_id, $this->kodeSubmitt());
    }

    public function previousSteps()
    {
        $this->currentStep--;
        // dd($this->currentStep);
        $this->dispatch('pageChanged', $this->getPaket()->paket->tampungpaket->subpaket_id, $this->getPaket()->paket_id, $this->kodeSubmitt());
    }

    public function setStep($step)
    {
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->getPaket()->paket->tampungpaket->subpaket_id, $this->getPaket()->paket_id, $this->kodeSubmitt());
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }

    public function getPaket()
    {
        return $this->paketSaya;
    }

    public function kodeSubmitt()
    {
        return $this->kodeSubmit;
    }
}
