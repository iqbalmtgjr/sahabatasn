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

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paketSaya, $paket_saya, $totalSteps, $paketId;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($id, $paket_id)
    {
        $admin = User::where('role', 'admin')->get();
        $tangkap_id = array();
        foreach ($admin as $key => $value) {
            $tangkap_id[] = $value->id;
            $tangkap_id[] = auth()->user()->id;
        }

        // dd($tangkap_id);
        $this->paketSaya = Paketsaya::whereIn('user_id', $tangkap_id)
            ->where('paket_id', $paket_id)->first();

        if ($this->paketSaya->status == 3) {
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
        return view('livewire.kerjakan');
    }

    public function nextStep()
    {
        $this->currentStep++;
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function previousStep()
    {
        $this->currentStep--;
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function setStep($step)
    {
        // dd($step);
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }
    public function getPaket()
    {
        return $this->paketSaya;
    }

    public function simpan($value, $jawaban_id)
    {
        // dd($value, $jawaban_id);
        $datay = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->kategori_id)
            ->first();

        if ($datay) {
            $datay->update([
                'user_id' => auth()->user()->id,
                'paketsaya_id' => $this->getPaket()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        } else {
            Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'paketsaya_id' => $this->getPaket()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        }

        // toastr()->success('Jawaban berhasil disimpan', 'Berhasil');

        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function submit()
    {
        $this->paketSaya->update([
            'submit' => 1,
        ]);
        return redirect('hasil');
    }

    public function delete($id)
    {
        if ($id) {
            Simpanjawaban::find($id)->delete();
            $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->paket_id);
        }
    }
}
