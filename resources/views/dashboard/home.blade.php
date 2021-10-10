<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">

                @if($viewTask)

                    @include('dashboard.task.view')

                @else

                    @include('dashboard.task.category')

                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                        <x-card title="New Task">

                            @include('dashboard.forms.new-task')
                        
                            <x-slot name="footer">
                        
                                <div class="flex justify-between items-center">
                        
                                    {{-- <x-button label="Delete" flat negative /> --}}
                        
                                    <x-button wire:click="newTask" label="Create Task" primary />
                        
                                </div>
                        
                            </x-slot>
                        
                        </x-card>


                        @forelse($myTasks as $task)

                            @include('dashboard.task.card')

                        @empty 

                            <div class="md:col-span-2 lg:col-span-3 text-gray-400 pt-20">

                                <x-icon name="emoji-happy" class="w-12 h-12 mx-auto" />

                                <p class="text-lg text-center mt-8">
                                    @if($category)
                                        No tasks in <span class="uppercase font-medium">{{ $category }}</span> category.
                                    @else
                                        You've got no tasks. That sounds nice!
                                    @endif
                                </p>

                            </div>

                        @endforelse
                    </div>

                @endif
                
            </div>
        </div>

        @include('dashboard.elements.show-modal')

    </div>
