<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            To Do List
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <ul class="todo-list">
            @foreach($todos as $todo)
            <li {{$todo->completed ? 'class=done' : ''}}>
                <!-- checkbox -->
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" {{$todo->completed ? 'checked="checked"' : ''}} wire:click="updateTodoComplete({{$todo->id}})" id="todoCheck{{$todo->id}}">
                    <label for="todoCheck{{$todo->id}}"></label>
                </div>
                <!-- todo text -->
                <span class="text">{{$todo->task_name}}</span>
                @if($todo->completed)
                    <small class="badge badge-success"><i class="fas fa-check"></i> Complete</small>
                @else
                    <small class="badge badge-warning"><i class="fas fa-clock"></i> Scheduled</small>
                @endif
                <!-- General tools such as edit or delete-->
                <div class="tools">
                    <i wire:click="setCurrentTodo({{$todo->id}})" class="fas fa-edit"></i>
                    <i wire:click="deleteTodo({{$todo->id}})" class="fas fa-trash"></i>
                </div>

                @if($current_todo && $current_todo->id == $todo->id)
                    <form wire:submit.prevent="update">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" wire:model="current_todo.task_name" id="current_todo_name_{{$todo->id}}" placeholder="Enter task name">
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </div>
                    </form>
                @endif
            </li>
            @endforeach
        </ul>
        @if($todoForm)
            <form wire:submit.prevent="save">
                <div class="form-group mt-3">
                    <label for="name">Task Name</label>
                    <input type="text" class="form-control" wire:model="todo_task_name" id="name" placeholder="Enter task name">
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        @endif
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        @if(!$todoForm)
        <button type="button" class="btn btn-primary float-right" wire:click="toggleTodoForm"><i class="fas fa-plus"></i> Add item</button>
        @endif
    </div>
</div>
