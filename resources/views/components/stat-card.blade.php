
   <div class="rounded-md border border-gray-200 bg-white px-5 py-4 flex items-center gap-4">
    {{-- Bloc label + valeur --}}
    <div>
        {{-- Label : texte petit, majuscules, espacé --}}
        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">{{ $label }}</p>

        {{-- Valeur : grande, colorée selon $color --}}
        <p class="text-2xl font-bold {{ $valueColor }} mt-0.5">{{ $value }}</p>
    </div>

</div>
