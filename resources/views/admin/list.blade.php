@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">{{__('Employees')}}
        <a href="{{route('admin.employee.create')}}" class="btn btn-sm btn-primary">{{__('Add New')}}</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a href="{{route('admin.employee.edit', ['employee' => $item->id])}}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('admin.employee.show', ['employee' => $item->id])}}"
                            class="btn btn-sm btn-success">Show</a>
                        <form action="{{route('admin.employee.destroy', ['employee' => $item->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input onclick="return confirm('Do you really want to delete a record?');"
                                class="btn btn-sm btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer">
            {{$items->links()}}
        </div>
    </div>
</div>
@endsection
