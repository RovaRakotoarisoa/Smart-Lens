<x-layout>
    <x-ui.sidebar />
    <x-container>
        <div class="">This is create page for users</div>
        <div>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="formUser" class=" max-w-3xl flex flex-col mx-auto mt-8">
                @csrf
                @method('POST')
                
                <div class="mb-4">
                    {{-- <label for="profile"></label> --}}
                    <input type="file" name="avatar" id="avatar">
                </div>
                <div class="columns-2">
                    <div class="flex flex-col">
                        <label id="name" for="name">Name :</label>
                        <input type="text" name="name" class="input-custom">
                    </div>
                    <div class="flex flex-col">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="input-custom">
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <label for="password">Password </label>
                    <input type="password" name="password" class="input-custom">
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation">Confirm </label>
                    <input type="password" name="password_confirmation" class="input-custom">
                </div>
                <div class="flex flex-col">
                    <label for="role">Role </label>
                    <select name="role" id="" class="input-custom">
                        <option value="" disabled selected>-- Choisissez un rôle --</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <button>Valider</button>
                </div>
            </form>
        </div>
    </x-container>
</x-layout>