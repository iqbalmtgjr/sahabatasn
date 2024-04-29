<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Simpanjawaban;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawaban_1, $jawaban_2, $jawaban_3, $jawaban_4, $jawaban_5;
    public $currentStep = 1;
    public $totalSteps;
    public $subkategoriId;
    public $selectedAnswers = [];

    // #[On('pageChanged')]
    public function mount($id)
    {
        $this->subkategoriId = $id;
        $this->datas = Banksoal::where('subkategori_id', $id)->get();
        $this->totalSteps = $this->datas->count();
        $this->currentStep;
        $this->jawaban = Simpanjawaban::where('subkategori_id', $id)->first()->jawaban;
        $this->jawabann = Simpanjawaban::where('subkategori_id', $id)->first();
    }

    public function render()
    {
        return view('livewire.kerjakan');
    }

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function goToStep($step, $subkategori_id)
    {
        $this->selectedAnswers[$step] = request()->input('jawaban');
        $this->currentStep = $step;
        // $this->dispatch('pageChanged', $subkategori_id);
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }

    public function simpan($value)
    {
        // dd($this->pilihan_1);
        $datay = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();

        if ($datay) {
            $simpan = $datay->update([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban' => $value,
            ]);
            // $this->dispatch('pageChanged', $this->getSoal()->subkategori_id);
        } else {
            $simpan = Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban' => $value,
            ]);
            // $this->dispatch('pageChanged', $this->getSoal()->subkategori_id);
        }
    }

    // public $data, $nomor, $kelas, $datas, $jawabans = [];

    // public function mount($id)
    // {
    //     $this->datas = Banksoal::where('subkategori_id', $id)->get();
    //     $this->data = Banksoal::where('subkategori_id', $id)->first();
    // }

    // public function render()
    // {
    //     return view('livewire.kerjakan');
    // }

    // public function submit()
    // {
    // }

    // public function changeQuestion($id, $key)
    // {
    //     $this->datas = Banksoal::where('subkategori_id', $id)->get();
    //     // $this->data = Banksoal::where('subkategori_id', $id)->skip($key - 1)->first();
    //     $this->nomor = $key - 1;

    //     if ($key) {
    //         $this->kelas = $key;
    //     }

    //     $this->data = $this->datas[$key - 1];
    //     // dd($this->data);
    // }
}
