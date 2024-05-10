<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Paketsaya;
use App\Models\Simpanjawaban;
use App\Models\Togratis;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

class Pembahasan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paketSaya, $totalSteps, $paketId, $status;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($id, $paket_id)
    {
        $admin = User::where('role', 'admin')->get();
        $tangkap_id = array();
        foreach ($admin as $value) {
            $tangkap_id[] = $value->id;
            $tangkap_id[] = auth()->user()->id;
        }

        // dd($tangkap_id);
        $this->paketSaya = Paketsaya::whereIn('user_id', $tangkap_id)
            ->where('paket_id', $paket_id)->first();

        $this->status = $this->paketSaya->status;

        if ($this->status == 3) {
            $this->datas = Togratis::where('kategori_id', $id)->get();
        } else {
            $this->datas = Banksoal::where('kategori_id', $id)->get();
        }

        $this->paketId = $paket_id;
        $this->jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();
        $this->jawabann = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->get();

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
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function previousSteps()
    {
        $this->currentStep--;
        // dd($this->currentStep);
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function setStep($step)
    {
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function getSoal()
    {
        // dd($this->datas[1]);
        // dd($this->currentStep);
        return $this->datas[$this->currentStep - 1];
    }

    public function getPaket()
    {
        return $this->paketSaya;
    }
}
