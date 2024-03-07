@extends('base')


@section('content')
    <div class="card mt-3">
        <div class="card-header bg-light">
            <h4 class="">Product Create</h4>
        </div>
        <div class="card-body bg-white">
            <form action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
                <div class="col-6 mb-3">
                    {{-- Success Message --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                    @endif

                    {{-- Failed Message --}}
                    @if (Session::has('fail'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
                    @endif
                </div>

                @csrf
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Product name." name="name" value="{{ old('name') }}">
                </div>

                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <span class="text-danger" value="{{ old('image') }}">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" placeholder="Product price." name="price" value="{{ old('price') }}">
                </div>

                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Product quantity." name="quantity" value="{{ old('quantity') }}">
                </div>

                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Published</label><br>
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
                    <label for="">is_publish</label>
                </div>

                <div class="col-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description"
                    placeholder="Write description...">{{ old('description') }}</textarea>
                </div>

                <button class="btn btn-secondary" type="button">Close</button>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
        <div class="card-footer bg-light">
            
        </div>
    </div>
@endsection
