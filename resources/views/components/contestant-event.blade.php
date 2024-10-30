<a href="{{ $link }}"
   class="border-4 {{'border-'.$color}} shadow-lg rounded-lg relative w-full aspect-square cursor-pointer">
   <img src="{{ $image }}" alt="{{ $name }}" class="relative rounded-md">
   <p class="absolute top-10 w-full text-center text-xl">
      {{ $name }} <br />
      {{ $team }}
   </p>
</a>
