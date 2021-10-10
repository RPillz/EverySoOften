<div style="display: @if($modalDisplay) block @else none @endif;">
    <x-overlay.dark>
        <div class="bg-white rounded-lg {{ $modalWidth }} shadow-lg">
            <div class="flex p-2 bg-gray-100 rounded-t-lg">
                <div class="flex-grow px-2 font-semibold text-gray-400 uppercase">
                    {{ $modalTitle }}
                </div>
                <div class="w-5 text-gray-300 hover:text-red-600 cursor-pointer" wire:click="hideModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="p-5 overflow-y-auto" style="max-height: 90vh;">
                @if($modalView)
                    @includeIf('dashboard/'.$modalView)
                @else 
                    <div class="text-gray-300 italic text-center p-5">Undefined Modal Section</div>
                @endif
            </div>
        </div>
    </x-overlay.dark>
</div>