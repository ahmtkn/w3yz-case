@extends('layout')
@section('title', 'Post')
@section('content')
<div class="">
	<div class="card cardForm">
		<div class="card-header headline">
			<div class="row">
				<div class="col-md-4">
					<h2 class="title">Post</h2>
				</div>
				<div class="col-md-8 text-end">
					<a role="button" href="{{ route('post.index') }}" title="Post" class="btn btn-secondary">
						<i class="fal fa-reply"></i>
						<span class="d-none d-lg-inline border-start ms-2 ps-2">Geri Dön</span>
					</a>
					<button type="submit" form="form-post_add" title="{{ $button }}" class="btn btn-success">
						<i class="fas fa-save"></i>
						<span class="d-none d-lg-inline border-start ms-2 ps-2">{{ $button }}</span>
					</button>
				</div>
			</div>
		</div>
		<div class="card-body bg-transparent">
			@if ($errors->any())
			<div class="alert alert-dismissible alert-danger mt-0 mb-3">
				<ul class="m-0">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			</div>
			@endif
			<form action="{{ $route }}" method="post" enctype="multipart/form-data" id="form-post_add" novalidate>
				@csrf
				<div class="row">
					<div class="col-md-2">
						<div class="card">
							<div class="card-header">
								<p class="lead m-0">Kategori</p>
							</div>
							<div class="card-body p-3">
							@error('category_id')
							<p class="alert alert-danger rounded-0 mb-0 p-1">{{ $message }}</p>
							@enderror
							@include('category.treeview',['name' => 'category_id', 'display' => 'list', 'type' => 'radio', 'selected' => isset($post->category) ? $post->category_id : 0, 'categories' => $categories])
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card mb-4">
							<div class="card-body">
                                <div class="row required">
                                    <label class="col-sm-12 col-form-label" for="input-title">Tittle</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" value="{{ $post->title ?? "" }}" placeholder="Title" required />
                                        </div>
                                        @error('title')
                                        <p class="alert alert-danger rounded-0 mb-0 p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-12 col-form-label" for="input-text">Text</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <textarea class="form-control @error('text') is-invalid @enderror" rows="2" id="input-text" name="text" placeholder="Text"> {{ $post->text ?? "" }}</textarea>
                                        </div>
                                        @error('text')
                                        <p class="alert alert-danger rounded-0 mb-0 p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="card mb-3">
							<div class="card-header">
								<p class="lead m-0">Görsel</p>
							</div>
							<div class="card-body p-3">
								<div class="row mb-3">
									<div class="col-md-12 d-grid gap-2">
                                        <label class="cursor-pointer droppable">
                                            <div
                                                class="pseudo-input flex items-center justify-center flex-col p-4 text-center opacity-70 hover:opacity-100 rounded border-dashed border-2 dark:border-gray-700">
                                                <span class="text origin-bottom transition-all duration-300 transform">Dosya Seç</span>
                                                <span
                                                    class="icon origin-top transition-all duration-300 transform-gpu h-0 overflow-hidden relative"><ion-icon
                                                        name="cloud-upload-outline" size="large"></ion-icon></span>
                                            </div>
                                            <input class="hidden" type="file" name="heroImage" accept="image/jpeg,image/png">
                                            @error('heroImage')
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                            @enderror
                                            <div class="">
                                                <figure>
                                                    <img src="{{ asset('storage') . '/' . $post->heroImage }}"
                                                         class="w-50 h-50 "/>
                                                </figure>
                                            </div>
                                        </label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

