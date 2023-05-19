<div>
      @include('livewire.admin.brand.modal-from')
     <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header py-3">
                    <h4>
                        Brand @livewireStyles
                        <a href="#" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addbrandModal" >Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Catrgory</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand )
                                  <tr>
                                      <td>{{$brand->id}}</td>
                                      <td>{{$brand->name}}</td>
                                      <td>{{$brand->category->name}}</td>
                                      <td>{{$brand->slug}}</td>
                                      <td>{{$brand->status == '1' ? 'Heddin': 'Visibel'}}</td>
                                      <td>
                                        <a href="#" data-bs-toggle="modal" wire:click="editBarnd({{$brand->id}})" data-bs-target="#updatebrandModal"  class="btn btn-sm btn-outline-success">Edit</a>
                                        <a href="" data-bs-toggle="modal" wire:click="deleteBarnd({{$brand->id}})" data-bs-target="#deletebrandModal" class="btn btn-sm btn-outline-danger">Delete</a>
                                      </td>
                                  </tr>
                            @empty
                             <td colspan="5">No Brand Found</td>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
@push('script')
 <script>
    window.addEventListener('close-modal' , event => {
         $('#addbrandModal').modal('hide');
         $('#updatebrandModal').modal('hide');
         $('#deletebrandModal').modal('hide');
    });
 </script>
@endpush
