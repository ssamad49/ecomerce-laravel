    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
              <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='storeBrand()'>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Select Category</label>
                    <select  wire:model.defer='category_id' required class="form-control">
                        <option value="">--Select Category</option>
                        @foreach ($categories as $cateItem )
                        <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                        @endforeach

                    </select>
                    @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Brand Name</label>
                    <input type="text" wire:model.defer='name' class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Brand Slug</label>
                    <input type="text" wire:model.defer='slug' class="form-control">
                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <input type="checkbox" wire:model.defer='status'/> Checked=Hidden , Un-Checked= Visible
                    @error('status') <small class="text-danger">{{$message}}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save </button>
            </div>
           </form>
          </div>
        </div>
      </div>

       <!-- Brand update Modal  -->
    <div wire:ignore.self class="modal fade" id="updatebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
              <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-3">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>Loading...
            </div>
            <div wire:loading.remove >
                  <form wire:submit.prevent='updateBrand()'>
                      <div class="modal-body">
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select  wire:model.defer='category_id' required class="form-control">
                                <option value="">--Select Category</option>
                                @foreach ($categories as $cateItem )
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                                @endforeach

                            </select>
                            @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                         </div>
                          <div class=" mb-3">
                              <label>Brand Name</label>
                              <input type="text" wire:model.defer='name' class="form-control">
                              @error('name') <small class="text-danger">{{$message}}</small> @enderror
                          </div>
                          <div class=" mb-3">
                              <label>Brand Slug</label>
                              <input type="text" wire:model.defer='slug' class="form-control">
                              @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                          </div>
                          <div class=" mb-3">
                              <label>Status</label>
                              <input type="checkbox" wire:model.defer='status' style="width: 70px;height=70px;"/> Checked=Hidden , Un-Checked= Visible
                              @error('status') <small class="text-danger">{{$message}}</small> @enderror
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">update </button>
                      </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
       <!-- Brand delete Modal  -->
       <div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">delete Brand</h5>
              <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-3">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>Loading...
            </div>
            <div wire:loading.remove >
                  <form wire:submit.prevent='destroyBrand()'>
                      <div class="modal-body">
                        <h4>Are you sure you wantto delete this data</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes.Delete </button>
                      </div>
                  </form>
            </div>
          </div>
        </div>
      </div>

