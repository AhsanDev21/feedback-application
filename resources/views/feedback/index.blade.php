<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback Listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-status class="mb-4" :status="session('message')"  />
            <x-validation-errors class="mb-4" :errors="$errors"  />
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Title</th>
                            <th scope="col" class="px-6 py-4">Category</th>
                            <th scope="col" class="px-6 py-4">Submitted by</th>
                            <th scope="col" class="px-6 py-4">Vote Count</th>
                            <th scope="col" class="px-6 py-4">Submitted</th>
                            <th scope="col" class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedback as $item)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->title }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->category }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($item->user)
                                    {{ $item->user->name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->votes }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if (Auth::check())
                                            <a href="{{ route('comments.create', $item->id) }}" class="btn btn-outline-primary">Add Comment</a>
                                            <form method="post" action="{{ route('feedback.vote', $item->id) }}">
                                                @csrf
                                                <button class="btn btn-primary" type="submit">Vote it!</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-10">
                    {{ $feedback->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

