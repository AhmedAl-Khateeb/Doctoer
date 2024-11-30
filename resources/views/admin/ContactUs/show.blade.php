@extends('admin.include.master')

@section('content')




<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="h4 mb-0 text-center">Message Details</h3>
        </div>
        <div class="card-body">
            <p style="text-align: left; direction: ltr;"><strong>Name: </strong> {{ $message->name }}</p>
            <p style="text-align: left; direction: ltr;"><strong>Email: </strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
            <p style="text-align: left; direction: ltr;"><strong>Subject: </strong> {{ $message->subject }}</p>
            <p><strong>Message: </strong></p>
            <div class="alert alert-secondary text-center" role="alert" style="text-align: left; direction: ltr;">
                {{ $message->message }}
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('contact.index') }}" class="btn btn-primary">Back to Messages</a>
        </div>
    </div>
</div>





@endsection
