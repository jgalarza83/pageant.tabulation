<a href="{{ $link }}"
   class="border-4 {{'border-'.$color}} shadow-lg rounded-lg relative w-full aspect-square cursor-pointer">
   <img src="{{ $image }}" alt="{{ $name }}" class="relative rounded-md">
   <p class="absolute bottom-0 w-full text-center xl:text-xl xl:bg-transparent lg:text-md lg:bg-white lg:py-2">
      {{ $name }} <br />
      {{ $team }}
   </p>
</a>
