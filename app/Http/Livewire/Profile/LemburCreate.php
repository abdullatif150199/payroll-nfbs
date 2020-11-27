<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Lembur;

class LemburCreate extends Component
{
    public $jumlah_jam;
    public $day;
    public $month;
    public $year;
    public $type;
    public $keterangan;

    public function render()
    {
        return view('livewire.profile.lembur-create');
    }

    public function create()
    {
        $validated = $this->validate([
            'jumlah_jam' => 'required|max:2',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'type' => 'required'
        ]);

        $validated['bulan'] = $this->year .'-'. $this->month;
        $validated['date'] = $this->year .'-'. $this->month .'-'. $this->day;
        $validated['karyawan_id'] = auth()->user()->karyawan->id;

        Lembur::create($validated);

        session()->flash('success', 'Berhasil mengajukan lembur.');
        $this->reset();

        $this->emit('hideModal'); // emmit to JS to close modal
    }
}
