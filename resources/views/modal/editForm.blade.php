<div id="edit-form" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div id="backdrop"
            class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">

                    {{ Form::open(['route' => 'roles.update', 'method' => 'POST', 'id' => 'add-new']) }}
                    <h1 class="text-lg font-bold text-blue-500">Create New Role</h1>
                    <div class="flex items-center my-2">
                        {{ Form::label('name', 'Name:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                        {{ Form::text('name', '', ['placeholder' => 'Sonic', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                    </div>
                    <p id="error-name" class="text-red-500 font-semibold text-sm ml-2"></p>
                    <div class="flex items-center my-2">
                        {{ Form::label('display_name', 'Display Name:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                        {{ Form::text('display_name', '', ['placeholder' => 'Speed O Sonic', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                    </div>
                    <p id="error-display_name" class="text-red-500 font-semibold text-sm ml-2"></p>
                    <div class="flex items-center my-2">
                        {{ Form::label('description', 'Description:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                        {{ Form::text('description', '', ['placeholder' => 'Whats on your mind?', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                    </div>
                    <p id="error-description" class="text-red-500 font-semibold text-sm ml-2"></p>

                    @if (session('success'))
                        <p class="text-green-400 text-xl mb-2">
                            {{ session('success') }}</p>
                    @endif

                    {{ Form::submit('Save', ['class' => 'bg-blue-500 px-4 py-2 rounded-md text-white hover:bg-blue-600 active:scale-95 transition duration-300 my-2']) }}
                    {{ Form::close() }}
                </div>
                <button id="create-close-btn"
                    class="font-bold bg-slate-100 hover:bg-rose-500 hover:text-white hover:scale-105 absolute top-0 right-0 w-8 h-8 p-2 rounded-bl-lg transition duration-200">
                    X
                </button>
            </div>
        </div>
    </div>
</div>