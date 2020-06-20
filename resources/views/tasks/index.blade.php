@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Current Tasks</h3>
        </div>
    </div>

    <div class="row">
        @if($categories)
            @foreach($categories as $category)
                <div class="col-md-4">
                    <h5>{{ $category->title }}</h5>
                    @if($currentTasks)
                        @foreach($currentTasks as $currentTask)
                            @if($currentTask->category_id == $category->id)
                                <a href="{{ route('edit', $currentTask->id) }}">
                                    <div class="card {{ $now > $currentTask->due_date ? 'overdue' : ''}}">
                                        <div class="card-body">
                                            <h5>{{ $currentTask->title }}</h5>
                                            <p><em>{{ $currentTask->description }}</em></p>
                                            <p>Due Date: {{ $currentTask->due_date }}</p>
                                            @if($now > $currentTask->due_date)
                                                <p><strong>OVERDUE</strong></p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach
        @endif
    </div>

@endsection
