<x-layout>
    <div>This is Edit page for users</div>
    <div>
        <x-form action="{{ route('users.update', $user->id ) }}" :isPost="false" :enctype="true" id="formUser" class=" max-w-3xl flex flex-col mx-auto mt-8">
                <div class="mb-4">
                    <input type="file" name="avatar" id="avatar">
                    <x-input-error for="avatar" />
                </div>
                <div class="columns-2">
                    <div class="flex flex-col">
                        <x-label for="name">Name </x-label>
                        <x-input name="name" value="{{ $user->name}}" class="input-custom" />
                        <x-input-error for="name" />
                    </div>
                    <div class="flex flex-col">
                        <x-label for="email">Email </x-label>
                        <x-input type="email" name="email" value="{{ $user->email}}" class="input-custom" />
                        <x-input-error for="email" />
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <x-label for="password">Password </x-label>
                    <x-input type="password" name="password" class="input-custom" />
                    <x-input-error for="password" />
                </div>
                <div class="flex flex-col">
                    <x-label for="password_confirmation">Confirm </x-label>
                    <x-input type="password" name="password_confirmation" class="input-custom" />
                    <x-input-error for="password_confirmation" />
                </div>
                <div class="flex flex-col">
                    <x-label for="role">Role </x-label>
                    <select name="role" id="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm input-custom">
                        <option value="" disabled selected>-- Choisissez un rôle --</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <x-input-error for="role" />
                </div>
                <div class="flex flex-col">
                    <button class=" primary-button bg-purple-500">Valider</button>
                </div>
        </x-form>
    </div>
</x-layout>