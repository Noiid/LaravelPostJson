<div class="list-group">
    <a href="/company" class="list-group-item list-group-item-action {{ Request::is('company') ? 'active' : '' }}">
        Manage Employees
    </a>
    @if(auth()->user()->id_user_level==1)
    <a href="/employee/create" class="list-group-item list-group-item-action {{ Request::is('employee/create') ? 'active' : '' }}">Add Employees</a>
    @endif
    <a href="/module/create" class="list-group-item list-group-item-action {{ Request::is('module/create') ? 'active' : '' }}">Purchase Units</a>
    <a href="/employee" class="list-group-item list-group-item-action {{ Request::is('employee') ? 'active' : '' }}">Usage Summary</a>
    @if(auth()->user()->id_user_level==1)
    <a href="/users" class="list-group-item list-group-item-action {{ Request::is('users') ? 'active' : '' }}">Manage Users</a>
    @endif
</div>
