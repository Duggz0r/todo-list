@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Archived Tasks</h3>
        </div>
    </div>

    <div class="row">
        @if($categories)
            @foreach($categories as $category)
                <div class="col-md-4">
                    <h5>{{ $category->title }}</h5>
                    @if($archivedTasks)
                        @foreach($archivedTasks as $archivedTask)
                            @if($archivedTask->category_id == $category->id)
                                <a href="{{ route('edit', $archivedTask->id) }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>{{ $archivedTask->title }}</h5>
                                            <p><em>{{ $archivedTask->description }}</em></p>
                                            <p>Due Date: {{ $archivedTask->due_date }}</p>
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
