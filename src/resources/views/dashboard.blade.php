@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p style="color: #666; margin-top: 5px;">Email: {{ Auth::user()->email }}</p>
    <p style="color: #666;">Member since: {{ Auth::user()->created_at->format('M d, Y') }}</p>
</div>

<div class="card">
    <h3 style="margin-bottom: 15px;">Add New Note</h3>
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
</div>

<div class="card">
    <h3 style="margin-bottom: 15px;">Your Notes ({{ $notes->count() }})</h3>

    @forelse($notes as $note)
        <div class="note-item">
            <h4>{{ $note->title }}</h4>
            <p>{{ $note->content }}</p>
            <small style="color: #999;">Created: {{ $note->created_at->format('M d, Y H:i') }}</small>

            <div class="note-actions">
                <form method="POST" action="{{ route('notes.destroy', $note) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this note?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p style="color: #999; text-align: center;">No notes yet. Create your first note above!</p>
    @endforelse
</div>
@endsection
