@extends('layout')
@section('content')
<div class="card mt-5">
    <h2 class="card-header"> CRUD Blog</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('create') }}"><i class="fa fa-plus"></i> Create New Blog</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $i = 0; @endphp
                @forelse ($blogs as $blog)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>
                            <form action="{{ route('destroy',$blog->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('show',$blog->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('edit',$blog->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>  

@endsection