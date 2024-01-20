@extends('layouts.app')
@section('main')

<div class="row py-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
            <form action="{{ url('testing') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <input type="text" name="description" class="form-control" id="">
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" class="btn btn-info">Add now </button>
                    <a href="{{ url('testing') }}">Go Back</a>
                </div>
        
            </form> 
        </div>
      </div>
    </div>
</div>

@endsection