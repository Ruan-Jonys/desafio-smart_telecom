<?php

// namespace App\Http\Livewire\Plan;

// use Livewire\Component;
// use App\Models\Plan;

// class Form extends Component
// {
//     public $plan;
//     public $nome, $descricao, $velocidade, $preco;
//     public $isEdit = false;

//     protected $rules = [
//         'nome' => 'required|string|max:255',
//         'descricao' => 'nullable|string',
//         'velocidade' => 'required|string',
//         'preco' => 'required|numeric|min:0',
//     ];  

//     protected $listeners = ['editPlan' => 'edit', 'createPlan' => 'create'];

//     public function create()
//     {
//         $this->reset(['nome', 'descricao', 'velocidade', 'preco']);
//         $this->isEdit = false;
//         $this->dispatchBrowserEvent('openModal');
//     }

//     public function edit(Plan $plan)
//     {
//         $this->plan = $plan;
//         $this->nome = $plan->nome;
//         $this->descricao = $plan->descricao;
//         $this->velocidade = $plan->velocidade;
//         $this->preco = $plan->preco;
//         $this->isEdit = true;
//         $this->dispatchBrowserEvent('openModal');
//     }

//     public function save()
//     {
//         $this->validate();

//         if ($this->isEdit) {
//             $this->plan->update($this->only(['nome', 'descricao', 'velocidade', 'preco']));
//         } else {
//             Plan::create([
//                 'team_id' => auth()->user()->currentTeam->id,
//                 'user_id' => auth()->id(),
//                 'nome' => $this->nome,
//                 'descricao' => $this->descricao,
//                 'velocidade' => $this->velocidade,
//                 'preco' => $this->preco,
//             ]);
//         }

//         $this->emit('planUpdated');
//         $this->dispatchBrowserEvent('closeModal');
//     }

//     public function render()
//     {
//         return view('livewire.plan.form');
//     }
// }

// namespace App\Http\Livewire\Plan;

// use Livewire\Component;
// use App\Models\Plan;
// use Illuminate\Support\Facades\Auth;

// class Form extends Component
// {
//     public $planId;
//     public $nome, $descricao, $velocidade, $preco;
//     public $isEdit = false;

//     protected $rules = [
//         'nome' => 'required|string|max:255',
//         'descricao' => 'nullable|string',
//         'velocidade' => 'required|integer|min:1',
//         'preco' => 'required|numeric|min:0',
//     ];

//     // Define os eventos que o componente escutará
//     protected $listeners = ['createPlan', 'editPlan'];

//     public function createPlan()
//     {
//         $this->resetInputFields();
//         $this->isEdit = false;
//         $this->dispatchBrowserEvent('openModal');
//     }

//     public function editPlan($id)
//     {
//         $this->planId = $id;
//         $plan = Plan::findOrFail($id);

//         $this->nome = $plan->nome;
//         $this->descricao = $plan->descricao;
//         $this->velocidade = $plan->velocidade;
//         $this->preco = $plan->preco;

//         $this->isEdit = true;
//         $this->dispatchBrowserEvent('openModal');
//     }

//     public function save()
//     {
//         $this->validate();

//         if ($this->isEdit) {
//             $plan = Plan::findOrFail($this->planId);
//             $plan->update([
//                 'nome' => $this->nome,
//                 'descricao' => $this->descricao,
//                 'velocidade' => $this->velocidade,
//                 'preco' => $this->preco,
//             ]);
//             session()->flash('message', 'Plano atualizado!');
//         } else {
//             Plan::create([
//                 'user_id' => Auth::id(),
//                 'team_id' => Auth::user()->currentTeam->id,
//                 'nome' => $this->nome,
//                 'descricao' => $this->descricao,
//                 'velocidade' => $this->velocidade,
//                 'preco' => $this->preco,
//             ]);
//             session()->flash('message', 'Plano criado!');
//         }

//         $this->dispatchBrowserEvent('closeModal');
//         $this->emit('planUpdated'); // Avisar que a lista deve ser atualizada
//         $this->resetInputFields();
//     }

//     private function resetInputFields()
//     {
//         $this->planId = null;
//         $this->nome = '';
//         $this->descricao = '';
//         $this->velocidade = '';
//         $this->preco = '';
//     }

//     public function render()
//     {
//         return view('livewire.plan.form');
//     }
// }
