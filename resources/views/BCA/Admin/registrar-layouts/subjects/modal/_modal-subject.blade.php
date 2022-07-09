<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Section</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrar.subject.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Subject" class="text-dark text-black font-weight-bold">Subject:</label>
                        <input class="form-control w-50" type="text" name="subject" id="Subject"
                            placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="grade_level_id" class="text-dark text-black font-weight-bold">Grade level:</label>
                        <select name="grade_level_id" id="grade_level_id" class="form-control w-75" required>
                            <option selected value="">--- Select grade level ---</option>
                            @foreach ($gradeLevels as $gl)
                                <option value="{{ $gl->id }}">{{ $gl->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
