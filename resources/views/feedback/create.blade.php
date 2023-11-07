<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-status class="mb-4" :status="session('message')"  />
            <x-validation-errors class="mb-4" :errors="$errors"  />

            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('feedback.store') }}">
                    @csrf

                    <div>
                        <label for="title" :value="__('Title')" class="form-label">Title</label>
                        <x-text-input id="title" class="block mt-1 w-full form-control" type="title" name="title" :value="old('title')" autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <label for="description" :value="__('Description')" class="form-label">Description</label>
                        <x-text-input id="description" class="block mt-1 w-full form-control" type="description" name="description" :value="old('description')" autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <label data-te-select-label-ref class="mr-10">Category</label>
                        <select data-te-select-init name="category" id="category" class="form-control">
                            <option value="bug">Bug Report</option>
                            <option value="feature">Feature Request</option>
                            <option value="request">General Request</option>
                            <option value="improvement">Improvement Suggestion</option>
                        </select>
                    </div>

                    <x-primary-button type="submit" class="btn btn-primary mt-10">Submit Feedback</x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
