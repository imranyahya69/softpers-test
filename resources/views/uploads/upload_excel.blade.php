@extends('layouts.master')
@section('content')
    <div class="mt-5 ml-4 text-lg leading-7 font-semibold">
        <a href="/" class="underline text-gray-900 dark:text-white">Go back to Landing page</a>
    </div>
    <br>
    <form action="{{ route('upload_excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2 ml-4 text-lg leading-7 font-semibold">
            <label href="/" class="text-gray-900 dark:text-white">Add File</label>
            <br>
            <input required type="file" name="file" class="mt-2 underline text-gray-900 dark:text-white">
            <br>
            <button type="submit" class="mt-2">Submit</button>
        </div>
    </form>
@endsection
