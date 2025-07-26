<side class="w-64 bg-purple-300 fixed left-0 top-[5.5rem] h-full p-4 text-white">
    {{-- Logo de l'app --}}
    {{-- <h2 class="text-xl text-white font-bold mb-4 pb-4 border-b-2 border-gray-300/30">GESTION USER</h2> --}}

    <div class="flex flex-col">
        <x-a-link href="{{ route('dashboard') }}"  class="flex items-center gap-2">
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 0 0 2 4.25v11.5A2.25 2.25 0 0 0 4.25 18h11.5A2.25 2.25 0 0 0 18 15.75V4.25A2.25 2.25 0 0 0 15.75 2H4.25ZM3.5 8v7.75c0 .414.336.75.75.75h11.5a.75.75 0 0 0 .75-.75V8h-13ZM5 4.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V5a.75.75 0 0 0-.75-.75H5ZM7.25 5A.75.75 0 0 1 8 4.25h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H8a.75.75 0 0 1-.75-.75V5ZM11 4.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V5a.75.75 0 0 0-.75-.75H11Z" clip-rule="evenodd"/>
            </svg>
            <div>
                Dashboard
            </div>
        </x-a-link>
        <x-a-link href="{{ route('lunettes.index') }}" class="flex items-center gap-2">
            <svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Monture lunettes -->
                <circle cx="14" cy="24" r="6" stroke="#4B5563" stroke-width="2"/>
                <circle cx="30" cy="24" r="6" stroke="#4B5563" stroke-width="2"/>
                <line x1="20" y1="24" x2="24" y2="24" stroke="#4B5563" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <div>
                Lunette
            </div>
        </x-a-link>
        <x-a-link href="{{ route('colors.index') }}" class="flex items-center gap-2">
            <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.02 2 11c0 4.97 4.03 9 9 9h1c1.1 0 2-.9 2-2s-.9-2-2-2H9.5c-.83 0-1.5-.67-1.5-1.5S8.67 13 9.5 13H13c3.31 0 6-2.69 6-6S15.31 2 12 2z" fill="#555"/>
                <circle cx="6.5" cy="11.5" r="1.5" fill="#FF5252"/>
                <circle cx="9.5" cy="7.5" r="1.5" fill="#FFA726"/>
                <circle cx="14.5" cy="6.5" r="1.5" fill="#66BB6A"/>
                <circle cx="17.5" cy="10.5" r="1.5" fill="#42A5F5"/>
            </svg>
            <div>
                Color
            </div>
        </x-a-link>
        <x-a-link href="{{ route('types.index') }}" class="flex items-center gap-2">
            <svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Monture lunettes -->
                <circle cx="14" cy="24" r="6" stroke="#4B5563" stroke-width="2"/>
                <circle cx="30" cy="24" r="6" stroke="#4B5563" stroke-width="2"/>
                <line x1="20" y1="24" x2="24" y2="24" stroke="#4B5563" stroke-width="2" stroke-linecap="round"/>

                <!-- Tag représentant le "type" -->
                <path d="M34 16h6a2 2 0 0 1 2 2v6l-4 4-6-6v-4a2 2 0 0 1 2-2z" fill="#6366F1"/>
                <circle cx="37" cy="19" r="1.5" fill="white"/>
            </svg>

            <div>
                Type
            </div>
        </x-a-link>
        <x-a-link href="{{ route('users.index') }}" class="flex items-center gap-2">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 
            2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM12.5 7.5C12.5 8.88071 11.3807 10 
            10 10C8.61929 10 7.5 8.88071 7.5 7.5C7.5 6.11929 8.61929 5 10 5C11.3807 5 12.5 6.11929 12.5 
            7.5ZM10 12C8.04133 12 6.30187 12.9385 5.20679 14.3904C6.39509 15.687 8.1026 16.5 10 16.5C11.8974 
            16.5 13.6049 15.687 14.7932 14.3904C13.6981 12.9385 11.9587 12 10 12Z" fill="white"/>
            </svg>
            <div>
                User
            </div>
        </x-a-link>
    </div>

    {{-- <ul class="space-y-6">
        <li class="mb-2">
            <a href="{{ url('home') }}" class="flex items-center text-white">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Lists utilisateurs
            </a>
        </li>
    </ul> --}}
</side>