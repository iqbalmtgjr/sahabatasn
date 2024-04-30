<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Simpanjawaban;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan;
    public $currentStep = 1;
    public $totalSteps;
    public $subkategoriId;
    public $selectedAnswers;
    public $warna = "btn-secondary";

    #[On('pageChanged')]
    public function mount($id)
    {
        $this->datas = Banksoal::where('subkategori_id', $id)->get();
        $this->jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();
        $this->jawabann = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->get();
        $this->totalSteps = $this->datas->count();
        $this->currentStep;
    }

    public function render()
    {
        return view('livewire.kerjakan2');
    }

    public function nextStep()
    {
        $this->currentStep++;
        // dd($this->currentStep++);
        // $this->dispatch('pageChanged', $this->getSoal()->subkategori_id);
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    // public function goToStep($step, $subkategori_id)
    public function goToStep($step)
    {
        // dd($step);
        $this->selectedAnswers[$step] = request()->input('jawaban');
        $this->currentStep = $step;

        // Perbarui status jawabanTersimpan
        $this->jawabanTersimpan[$step] = true;
        // $this->dispatch('pageChanged', $subkategori_id);
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }

    public function simpan($value, $jawaban_id)
    {
        // dd($value, $jawaban_id);
        $datay = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();

        if ($datay) {
            $simpan = $datay->update([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        } else {
            $simpan = Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        }

        $this->changeColor($value, $jawaban_id);

        // $this->dispatch('pageChanged', $this->getSoal()->subkategori_id);
    }

    public function changeColor($value, $jawaban_id)
    {
        // dd($value, $jawaban_id);
        $query = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();
        // dd($query);

        if ($query->jawab === $value) {
            $this->warna = "btn-primary";
        } else {
            $this->warna = "btn-secondary";
        }
        $this->dispatch('pageChanged', $query->subkategori_id);
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
