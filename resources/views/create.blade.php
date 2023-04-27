@extends('layouts.app')

@section('content')
    <h1>Add Free Gift</h1>

    <form action="{{ route('free-gift.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="data">Data:</label>
            <input type="file" id="data" name="data">
            @error('data')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Add Free Gift</button>
    </form>

    <a href="{{ route('free-gift.index') }}">Back to Free Gifts</a>
@endsection
