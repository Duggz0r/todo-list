<div class="nav nav-pills flex-column flex-md-row mb-3">
    <ul class="nav nav-pills flex-column flex-md-row">
        <li class="nav-link{{ request()->routeIs('welcome') ? ' active': '' }}">
            <a href="{{ route('welcome') }}">Home</a>
        </li>
        <li class="nav-link{{ request()->routeIs('current-tasks*') ? ' active': '' }}">
            <a href="{{ route('current-tasks') }}">Current Tasks</a>
        </li>
        <li class="nav-item mr-3 nav-link{{ request()->routeIs('archived-tasks') ? ' active': '' }}">
            <a href="{{ route('archived-tasks') }}">Archived Tasks</a>
        </li>

        <li class="nav-item mr-3 nav-link{{ request()->routeIs('create') ? ' active': '' }}">
            <a href="{{ route('create') }}">Create Task</a>
        </li>
    </ul>
</div>
