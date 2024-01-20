@extends('layouts.app')
@section('main')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-lg-12">
            <div class="text-center mt-3">
                @php
                    $class = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning'];
                @endphp

                @forelse ($categories as $index => $category)
                    <button type="button" class="btn {{ $class[$index % count($class)] }}" data-id={{ $category }}>
                        {{ $category }}
                    </button>
                @empty
                    <p class="text-muted text-center">N/a</p>
                @endforelse

            </div>
        </div>
    </div>

    <div class="row py-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                @forelse ($products as $key => $p )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td>{{ $p->category }}</td>
                                        <td>
                                            <a href="#" class="status-icon-link" data-id="{{ $p->id }}">
                                                @if ($p->status === 1)
                                                    <i class="bi bi-eye" style="font-size: 25px; color:green"></i>
                                                @else
                                                    <i class="bi bi-eye-slash" style="font-size: 25px; color:red"></i>
                                                @endif
                                            </a>
                                                                                   
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-muted text-center">
                                        No data found!
                                    </p>
                                @endforelse
                            </tbody>
                            <tbody id="new-data"></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <script>
        $('.status-icon-link').on('click', function () {
            var id = $(this).attr('data-id');
            alert(id);

            $.ajax({
                type: "GET",
                url: "/post/status/"+ id,
                success: function (response) {
                   console.log(response); 
                }
            });
        });

      $(document).ready(function() {
        $('.btn').on('click', function(e) {
            e.preventDefault();
            var value = $(this).attr('data-id');
            var currentURL = window.location.href;

            // Remove any existing 'filter' parameter from the URL
            var newURL = currentURL.split('?')[0]; // Get the base URL without query params
            
            // Add the new 'filter' parameter
            newURL += '?filter=' + value;
            
            window.location.href = newURL;
        });
    });




            //     $.ajax({
            //         type: "GET",
            //         url: "{{ route('posts.filter', ['value' => ':value']) }}".replace(':value', value),
            //         success: function (data) {
            //             if (data.length > 0) {
            //                 for (var i = 0; i < data.length; i++) {
            //                     // Assuming 'data' has properties like 'title', 'description', etc.
            //                     var row = "<tr>" +
            //                         "<td>" + data[i].id + "</td>" +
            //                         "<td>" + data[i].title + "</td>" +
            //                         "<td>" + data[i].category + "</td>" +
            //                         "</tr>";
                                
            //                     // Append the row to the table body
            //                     $('#data').html('');
            //                     $('#new-data').append(row);
            //                 }
            //             }
            //         }
            //     });




            // });

    </script>
@endsection
