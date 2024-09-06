@extends('home')

@section('roles-table')
    <div class="container max-w-screen-lg mt-10 shadow-md">
        <table id="myTable" class="max-w-screen-lg">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($roles as $role)
                    <tr class="table-row">
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td colspan="2" id="{{ $role->id }}" class="action-col">
                            <button class="edit-btn text-white bg-blue-500 hover:bg-blue-300 p-2 rounded-md transition duration-300">Edit</button>
                            <button class="delete-btn text-white bg-red-500 hover:bg-red-300 p-2 rounded-md transition duration-300">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
