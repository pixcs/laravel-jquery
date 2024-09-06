@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->hasRole('super admin'))
                            <p class="text-center">Welcome, Super Admin!</p>
                        @endif

                        @if (Auth::user()->hasRole('admin'))
                            <p class="text-center">Welcome, Admin!</p>
                        @endif

                        @if (Auth::user()->hasRole('user'))
                            <p class="text-center">Welcome, User!</p>
                        @endif
                        <button id="create-new" class="bg-blue-500 px-4 py-2 rounded-md text-white hover:bg-blue-600 hover:scale-105 transition duration-200">
                            Create New
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @yield('roles-table')
        
    </div>
@endsection


