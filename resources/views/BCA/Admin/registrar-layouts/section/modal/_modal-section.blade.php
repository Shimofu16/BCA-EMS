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
                <form action="{{ route('registrar.section.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="section_name" class="text-dark text-black font-weight-bold">Section name</label>
                        <input class="form-control w-50" type="text" name="section_name" id="section_name"
                            placeholder="Section name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="adviser" class="text-dark text-black font-weight-bold">Grade Level</label>
                        <select class="custom-select" id="inputGroupSelect01" name="grade_level_id" required>
                            <option selected>-- Select Grade Level --</option>
                            @foreach ($gradeLevels as $gradeLevel)
                                <option value="{{ $gradeLevel->id }}">{{ $gradeLevel->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="teacher_id" class="text-dark text-black font-weight-bold">Adviser</label>
                        <select class="custom-select" id="teacher_id" name="teacher_id">
                            <option selected>-- Select Adviser --</option>
                            @foreach ($teachers as $teacher)
                                @if ($teacher->sections->count() == 0)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
