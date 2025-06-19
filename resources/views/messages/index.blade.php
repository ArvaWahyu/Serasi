@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Messages</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('messages.store') }}" method="POST" class="mb-6">
        @csrf
        <textarea name="content" rows="3" class="w-full p-2 border rounded" placeholder="Write a new message..." required></textarea>
        <button type="submit" class="btn-primary mt-2">Post Message</button>
    </form>

    <div>
        @foreach($messages as $message)
            <div class="mb-4 p-4 border rounded bg-white">
                <p>{{ $message->content }}</p>
                <small class="text-gray-500">By User #{{ $message->user_id }} at {{ $message->created_at->format('Y-m-d H:i') }}</small>

                {{-- Replies --}}
                <div class="ml-6 mt-4">
                    @foreach($message->replies as $reply)
                        <div class="mb-2 p-2 border rounded bg-gray-50">
                            <p>{{ $reply->content }}</p>
                            <small class="text-gray-500">By User #{{ $reply->user_id }} at {{ $reply->created_at->format('Y-m-d H:i') }}</small>
                        </div>
                    @endforeach

                    {{-- Reply form --}}
                    <form action="{{ route('messages.store') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $message->id }}">
                        <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Write a reply..." required></textarea>
                        <button type="submit" class="btn-primary mt-1">Reply</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
