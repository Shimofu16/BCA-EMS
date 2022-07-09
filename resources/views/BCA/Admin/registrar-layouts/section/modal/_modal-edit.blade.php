<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Section</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrar.section.update', $section->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section name</label>
                        <input class="form-control w-50" type="text" name="section_name" id="section"
                            placeholder="Section name" value="{{ $section->section_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="teacher_id" class="text-dark text-black font-weight-bold">Adviser</label>
                        <select name="teacher_id" class="custom-select" id="teacher_id">
                            <option selected value="{{ $section->teacher_id }}">
                                {{ $section->teacher_id == null ? '-- Select Adviser --' : $section->teacher->name }}
                            </option>
                            @foreach ($teachers as $teacher)
                                @if ($teacher->sections->count() == 0)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->name }}</option>
                                @endif
                            @endforeach
                            @if ($section->teacher_id != null)
                                <option value="delete">Delete Adviser</option>
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
