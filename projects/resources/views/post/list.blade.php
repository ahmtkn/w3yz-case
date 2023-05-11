@extends('layout')
@section('title', 'Post')
@section('content')
<div class="">
	<div class="card cardList">
		<div class="card-header headline">
			<div class="row">
				<div class="col-md-4">
					<h2 class="title">Post</h2>
				</div>
				<div class="col-md-8 text-end">
					<a role="button" class="btn btn-primary" href="{{ route('post.create') }}">
						<i class="fal fa-plus"></i>
						<span class="d-none d-lg-inline border-start ms-2 ps-2">Post Ekle</span>
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">

            <div class="tableOptional table-responsive1">
                <table class="table table-sm table-fixed table-side table-bordered table-hover table-scrollable m-0">
                    <thead>
                    <tr class="headline">
                        <th class="text-start">Title</th>
                        <th class="text-start">Text</th>
                        <th class="text-end" width="220">Tarih</th>
                        <th class="text-center" width="50">Kategori</th>
                        <th class="text-center thPass" width="5"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td class="text-start">
                                <p class="fs-6 fw-bold">{{ $post->title }}</p>
                            </td>
                            <td class="text-start">
                                <p class="fs-6 fw-bold">{{ $post->text ?? "" }}</p>
                            </td>
                            <td class="text-start">
                                <p class="fs-6 border-bottom">Oluşturulma: <span class="fw-bold float-end">{{ date('d/m/Y', strtotime($post->created_at)) }}</span></p>
                                <p class="fs-6">Düzenleme: <span class="fw-bold float-end">{{ date('d/m/Y', strtotime($post->deleted_at)) }}</span></p>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn w-100 h-100 btn-secondary">{{ $post->category->name}}</button>
                            </td>
                            <td class="text-center">
                                <a class="dropdown-item" role="button" href="{{ route('post.edit', $post) }}">
                                    <i class="fa-fw fa-1x fal fa-pencil"></i>
                                    <span class="border-start ms-2 ps-2">Düzenle</span>
                                </a>
                                <a role="button"  href="{{ route('post.destroy', $post) }}">
                                    <i class="fa-fw fa-1x fal fa-trash"></i>
                                    <span class="border-start ms-2 ps-2">Sil</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="13">
                                Veri Yok
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
		</div>
		<div class="card-footer">

		</div>
	</div>
</div>
@endsection
