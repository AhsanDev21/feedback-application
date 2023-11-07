<!-- resources/views/create-comment.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-status class="mb-4" :status="session('message')" />
            <x-validation-errors class="mb-4" :errors="$errors" />
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
                    <div class="form-group">
                        <textarea name="content" id="comment-content" class="form-control" placeholder="Add a comment"></textarea>
                        <button type="button" id="emoji-picker-button">😀</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Initialize SimpleMDE -->
<script>
    var simplemde = new SimpleMDE({ element: document.getElementById("comment-content") });

    $(document).ready(function () {
        // Initialize the EmojiPicker and connect it to the textarea
        $(".emojionearea").emojioneArea();

        // Initialize the emoji picker when the emoji icon/button is clicked
        $("#emoji-picker-button").click(function () {
            $(".emojionearea").emojioneArea('toggle');
        });
    });
</script>

