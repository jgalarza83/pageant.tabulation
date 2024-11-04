<details class="w-full bg-white border cursor-pointer mb-3">
   <summary class="w-full bg-white text-dark flex justify-between px-4 py-3 after:content-['+']">
      {{ $event }}
   </summary>
       @foreach ($contestants as $contestant => $score)
       <div class="flex justify-between px-4 py-3 w-80 mx-auto">
           <span>{{ ucwords($contestant) }}</span>
           <span>{{ $score }}</span>
        </div>
        @endforeach
</details>
