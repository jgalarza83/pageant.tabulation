<details class="w-full bg-white border cursor-pointer mb-3">
   <summary class="w-full bg-white text-dark flex justify-between px-4 py-3 after:content-['+']">
      {{ $label }}
   </summary>
   @foreach ($array as $label => $judges)
      <div class="grid grid-cols-2 justify-between px-2 py-3 w-full text-gray-600">
         <span class="font-bold text-sm">{{ ucwords($label) }}</span>
         @php $total = 0 @endphp
         <div class="grid grid-cols-7 md:gap-x-0">

            @foreach ($judges as $score)
               <span class="text-center text-gray-400">{{ $score }}</span>
               @php $total += $score @endphp
            @endforeach

            <span class="text-center">|</span>
            <span class="font-bold text-center">{{ $total }}</span>
         </div>
      </div>
   @endforeach
</details>
