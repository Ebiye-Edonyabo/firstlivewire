<?php

namespace App\Livewire;

use Exception;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;

// #[Layout('layout.app')]
class TodoList extends Component
{
    use WithPagination;

 
    // Validation
    #[Rule('required|min:3|max:50')]
    // Declaring Public Variables
    public $name;
    public $search;
    public $editingTodoID;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    // public function mount($search) {
    //     $this->search = $search;
    // }

    public function create() {
        // Validate
        $validated = $this->validateOnly('name');
        // Create the Todo
        Todo::create($validated);
        // Clear the input
        $this->reset('name');
        // Send Flash Message
        request()->session()->flash('success', 'Todo Successfully Created');
        $this->resetPage();
    }

    public function delete($todoID) {
        try{
            Todo::findorFail($todoID)->delete();
        }catch(Exception $e){
            session()->flash('error','failed tp delete todo!');
        }
    }

    public function toggle($todoID) {
        $todo = Todo::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function render()
    {
        // To Pass The Variable To The View
        return view('livewire.todo-list', 
        ['todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(3)]);
    }

    public function edit ($todoID) {
        // Alternative One: To pass ( Todo $todo )as argument
        // $this->editingTodoID = $todo->id;
        // $this->editingTodoName = $todo->name;

        $this->editingTodoID = $todoID;
        $this->editingTodoName = Todo::find($todoID)->name;
    }

    public function cancelEdit() {
        $this->reset('editingTodoID', 'editingTodoName');

    }

    public function update() {
        // Validate
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoID)->update([
            'name' => $this->editingTodoName
        ]);
        $this->cancelEdit();
    }

    public function placeholder() {
        return view('livewire.includes.placeholder');
    }

  
}
