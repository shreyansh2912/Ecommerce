@extends('admin.dashboard')

@section('admin')
<div class="table-responsive pt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Name
          </th>
          <th>
            Email
          </th>
          <th>
            Username
          </th>
          <th>
            Role_as
          </th>
          <th>
            Created At
          </th>
        </tr>
      </thead>
      <tbody>
@foreach ($users as $value)
        <tr class="table-primary">
          <td>
            {{$value->id}}
          </td>
          <td>
            {{$value->name}}
          </td>
          <td>
            {{$value->email}}
          </td>
          <td>
            {{$value->username}}
          </td>
          <td>
            {{$value->role_as}}
          </td>
          <td>
            {{$value->created_at}}
          </td>
        </tr>
@endforeach
</tbody>
</table>
</div>
<div class="page" style="margin-top: 10px">
    {{$users->links()}}
</div>
    
@endsection