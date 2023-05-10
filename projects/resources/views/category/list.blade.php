@extends('layout')
@section('title', 'Kategori')
@section('content')
<div class="">
	<div class="card cardList">
		<div class="card-header headline">
			<div class="row">
				<div class="col-md-4">
					<h2 class="title">Category</h2>
				</div>
				<div class="col-md-8 text-end">
					<button type="button" class="btn btn-primary" data-toggle="basic" data-action="{{ route('category.create') }}">
						<i class="fal fa-plus"></i>
						<span class="d-none d-lg-inline border-start ms-2 ps-2">Kategori Ekle</span>
					</button>
				</div>
			</div>
		</div>
		<div class="card-body">
            <div class="tableOptional table-responsive">
                <table class="table table-sm table-fixed table-side table-bordered table-hover table-scrollable m-0">
                    <thead>
                    <tr class="headline">
                        <th class="text-left">Name</th>
                        <th class="text-center" width="50">Toplam Post</th>
                        <th class="text-center thPass" width="5"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('category.treeview_table',['categories' => $categories])
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
@endsection
