<?php

namespace App\Http\Livewire\Plan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $planId;
    public $nome, $descricao, $velocidade, $preco;
    public $isEdit = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'velocidade' => 'required|integer|min:1',
        'preco' => 'required|numeric|min:0',
    ];

    public function create()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        $this->planId = $id;
        $this->nome = $plan->nome;
        $this->descricao = $plan->descricao;
        $this->velocidade = $plan->velocidade;
        $this->preco = $plan->preco;

        $this->isEdit = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $plan = Plan::findOrFail($this->planId);
            $plan->update([
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'velocidade' => $this->velocidade,
                'preco' => $this->preco,
            ]);
            session()->flash('message', 'Plano atualizado!');
        } else {
            Plan::create([
                'user_id' => Auth::id(),
                'team_id' => Auth::user()->currentTeam->id,
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'velocidade' => $this->velocidade,
                'preco' => $this->preco,
            ]);
            session()->flash('message', 'Plano criado!');
        }

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Plan::findOrFail($id)->delete();
        session()->flash('message', 'Plano deletado com sucesso!');
    }

    private function resetInputFields()
    {
        $this->planId = null;
        $this->nome = '';
        $this->descricao = '';
        $this->velocidade = '';
        $this->preco = '';
    }

    public function render()
    {
        $plans = Plan::where('user_id', Auth::id())
            ->where('team_id', Auth::user()->currentTeam->id)
            ->paginate(10);

        return view('livewire.plan.index', compact('plans'));
    }
}
