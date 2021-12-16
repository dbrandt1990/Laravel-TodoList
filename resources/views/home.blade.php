<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>

<body>
    <h1>Todo List</h1>
    @include('common.errors')
    <form action="{{ url('todo') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="content" placeholder="Add a new todo" />
        <button type="submit" name="add_todo_btn">Add</button>
    </form>
    @if(count($todolist))
    <ul>
        @foreach($todolist as $todo)
        <li>
            <form action="{{ url('todo/'.$todo->id) }}" method="POST">
                {{ $todo -> content }}
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit">X</button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif

</body>

</html>