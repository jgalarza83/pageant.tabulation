<nav class="bg-white border-b border-gray-100">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="shrink-0 flex items-center justify-center h-10">
        {{ session()->has('name') ? 'Welcome '.session('name') : '' }}
      </div>
   </div>
</nav>
