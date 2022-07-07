<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white" id="exampleModalLongTitle">Add Teacher</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="text-dark text-black font-weight-bold">Title:</label>
                        <input class="form-control w-75" type="text" name="title" id="title" placeholder="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="image" class="text-dark text-black font-weight-bold">Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date" class="text-dark text-black font-weight-bold">Date:</label>
                        <input class="form-control w-50" type="date" name="date" id="date" placeholder="date"
                            value="{{ old('date') }}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
