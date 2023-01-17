@extends('layout')
@section('content')
	 <h1>{{ $title }}</h1>
	 @if ($errors->any())
		<div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
	 @endif
	 
	 <form method="post" action="{{ $categories->exists ? '/categories/patch/' . $categories->id : '/categories/put' }}">
		@csrf
		<div class="mb-3">
			<label for="categories-name" class="form-label">Kategorija</label>
			<input 
				 type="text"
				 class="form-control @error('name') is-invalid @enderror"
				 id="categories-name"
				 name="name"
				 value="{{ old('name', $categories->name) }}">
			@error('name')
				<p class="invalid-feedback">{{ $errors->first('name') }}</p>
			@enderror
		 </div>
		 <button type="submit" class="btn btn-primary">Pievienot</button>
	 </form>
@endsection