<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $todos;
    public $todoForm = false;
    public $todo_task_name;
    public ?Todo $current_todo = null;

    public $rules = [
        'todo_task_name' => ['required'],
        'current_todo.task_name' => ['nullable'],
    ];

    public function mount()
    {
        $this->setTodos();
    }

    private function setTodos()
    {
        $this->todos = Todo::latest()->orderBy('completed')->get();
    }

    public function toggleTodoForm()
    {
        $this->todoForm = !$this->todoForm;
    }

    public function save()
    {
        $this->validate();
        Todo::create([
            'task_name' => $this->todo_task_name,
            'completed' => false,
        ]);

        $this->todoForm = false;

        $this->setTodos();
    }

    public function update()
    {
        if ($this->current_todo->task_name) {
            $this->current_todo->update();
        }

        $this->current_todo = null;
        $this->setTodos();
    }

    public function setCurrentTodo(Todo $todo)
    {
        $this->current_todo = $todo;
    }

    public function updateTodoComplete(Todo $todo)
    {
        $todo->update([
            'completed' => !$todo->completed,
        ]);

        $this->setTodos();
    }

    public function deleteTodo(Todo $todo)
    {
        $todo->delete();

        $this->setTodos();
    }

    public function render()
    {
        return view('livewire.dashboard.todos');
    }
}
