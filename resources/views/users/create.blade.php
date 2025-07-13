<x-layout>
    <div>This is create page for users</div>
    <div>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="formUser">
            @csrf
            @method('POST')

             <div>
                <label id="name" for="name">Name :</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="email">Email </label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Password </label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm </label>
                <input type="password" name="password_confirmation">
            </div>
            <div>
                <label for="role">Role </label>
                <select name="role" id="">
                    <option value="" disabled selected>-- Choisissez un rôle --</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                {{-- <label for="profile"></label> --}}
                <input type="file" name="avatar" id="avatar">
            </div>

            <div>
                <button>Valider</button>
            </div>
        </form>
    </div>
</x-layout>