<div wire:poll.keep-alive>
    <!-- User-List Starts -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
            </tr>
            </thead>
            <tbody>
                @foreach($this->users as $user)
                    @include('livewire.includes.user-card')
                @endforeach
            <!-- more rows -->
            </tbody>
        </table>
        <!-- Using Computed Method To Pass Data -->
            {{$this->users->links()}}
    </div>
    <!-- User-List Ends -->
</div>
