<nav class="bg-white border-b border-gray-100">
   <div class="mx-24 flex justify-end items-baseline h-10 pt-2 gap-x-5">
      @if (session()->has('name'))
         <p>Welcome {{ session('name') }}</p>
         <x-nav-link href="{{ route('auth.index') }}" class="underline">Logout</x-nav-link>
      @endif
   </div>
</nav>
