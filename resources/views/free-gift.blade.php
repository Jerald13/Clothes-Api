@extends('layouts.app')

@section('content')
    <h1>Free Gifts</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mime Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($freeGifts as $freeGift)
                <tr>
                    <td>{{ $freeGift->id }}</td>
                    <td>{{ $freeGift->name }}</td>
                    <td>{{ $freeGift->mime }}</td>
                    <td>
                        <a href="{{ route('free-gift.edit', $freeGift->id) }}">Edit</a>
                        <form action="{{ route('free-gift.destroy', $freeGift->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('free-gift.create') }}">Add Free Gift</a>
@endsection
