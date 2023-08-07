		<!--start page wrapper -->
		<div>
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary" wire:click.prevent="addNewUser"> Add Users</button>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SL</th>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Create Time</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @php
                                        $sl=1;
                                    @endphp
                                    @foreach ($users as $user)
									<tr>
										<td>{{ $sl++ }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>@if($user->status) Active @else Dective @endif </td>
										<td>{{ $user->created_at->diffForHumans() }}</td>
										<td>
                                            <a type="button" wire:click.prevent="edit({{ $user }})" class="btn btn-primary btn-sm"><i class="bx bx-edit-alt me-0"></i></a>
                                            <a wire:click.prevent="delete({{ $user->id }})" type="button" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt me-0"></i>
											</a>
                                        </td>
									</tr>
                                    @endforeach
								</tbody>
								{{-- <tfoot>
									<tr>
										<th>SL</th>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Create Time</th>
										<th>Action</th>
									</tr>
								</tfoot> --}}
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- Modal -->
   <div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="exampleModalLabel"  wire:ignore.self>
        <div class="modal-dialog">
            <form class="row g-3" autocomplete="off" wire:submit.prevent="{{ $showModal ? 'create' : 'update' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@if($showModal) Add Users @else Edit Users @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Name</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="input15" placeholder="Name">
                                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                  </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input16" class="form-label">Email</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" wire:model.defer="state.email" class="form-control  @error('email') is-invalid @enderror" id="input16" placeholder="Email">
                                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                  </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input17" class="form-label">Password</label>
                                            <div class="position-relative input-icon">
                                                <input type="password" wire:model.defer="state.password" class="form-control  @error('password') is-invalid @enderror" id="input17" placeholder="Password">
                                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-lock-alt'></i></span>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                  </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 py-3">
                                            <div class="form-check form-switch form-check-success">
                                                <input class="form-check-input" wire:model.defer="state.status" type="checkbox"role="switch" id="flexSwitchCheckSuccess" checked="">
                                                <label class="form-check-label" for="flexSwitchCheckSuccess"> Status Switch</label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">@if($showModal) Save @else Save changes @endif</button>
                </div>
             </form>
            </div>
        </div>
    </div>
