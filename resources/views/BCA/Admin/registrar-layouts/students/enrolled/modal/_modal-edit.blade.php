<div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Students information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registrar.enrolled.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="student_lrn" class="text-dark text-black font-weight-bold">Student
                                LRN</label>
                            <input class="form-control " type="text" name="student_lrn" id="student_lrn"
                                value="{{ $student->student_lrn }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="first_name" class="text-dark text-black font-weight-bold">First name</label>
                            <input class="form-control " type="text" name="first_name" id="first_name"
                                value="{{ $student->first_name }}">
                        </div>
                        <div class="col-md-4">
                            <label for="middle_name" class="text-dark text-black font-weight-bold">Middle name</label>
                            <input class="form-control " type="text" name="middle_name" id="middle_name"
                                value="{{ $student->middle_name }}">
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="text-dark text-black font-weight-bold">Last name</label>
                            <input class="form-control " type="text" name="last_name" id="last_name"
                                value="{{ $student->last_name }}">
                        </div>
                        @if ($student->ext_name !== null)
                            <div class="col-md-4">
                                <label for="ext_name" class="text-dark text-black font-weight-bold">Ext. name</label>
                                <input class="form-control " type="text" name="ext_name" id="ext_name"
                                    value="{{ $student->ext_name }}">
                            </div>
                        @endif
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="gender" class="text-dark text-black font-weight-bold">Gender</label>
                            <div>
                                @if ($student->gender == 'Male')
                                    <label for="male" class="radio-inline mr-1"><input type="radio" name="gender"
                                            id="male" value="Male" checked>
                                        Male</label>
                                    <label for="female" class="radio-inline"><input type="radio" name="gender"
                                            id="female" value="Female">
                                        Female</label>
                                @elseif ($student->gender == 'Female')
                                    <label for="male" class="radio-inline mr-1"><input type="radio" name="gender"
                                            id="male" value="Male">
                                        Male</label>
                                    <label for="female" class="radio-inline"><input type="radio" name="gender"
                                            id="female" value="Female" checked>
                                        Female</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="email" class="text-dark text-black font-weight-bold">Email</label>
                            <input class="form-control " type="text" name="email" id="email"
                                value="{{ $student->email }}">
                        </div>
                        <div class="col-md-3">
                            <label for="birthdate" class="text-dark text-black font-weight-bold">Birthdate</label>
                            <input class="form-control " type="date" name="birthdate" id="birthdate"
                                value="{{ $student->birthdate }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="birthplace" class="text-dark text-black font-weight-bold">Birthplace</label>
                            <input class="form-control " type="text" name="birthplace" id="birthplace"
                                value="{{ $student->birthplace }}">
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="text-dark text-black font-weight-bold">Address</label>
                            <input class="form-control " type="text" name="address" id="address"
                                value="{{ $student->address }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-4">
                            <label for="section_id" class="text-dark text-black font-weight-bold">Section</label>
                            <select name="section_id" id="section_id" class="form-control">
                                <option selected value="{{ $student->section_id }}">
                                    {{ $student->section->section_name }}</option>
                                @php
                                    $sections = DB::table('sections')
                                        ->where('grade_level_id', $student->grade_level_id)
                                        ->get();
                                @endphp
                                @forelse  ($sections as $section)
                                    @if ($student->section->section_name != $section->section_name)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endif
                                @empty
                                    <option disabled> No section available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="grade_level" class="text-dark text-black font-weight-bold">Grade
                                level</label>
                            <select name="grade_level_id" id="grade_level_id" class="form-control">
                                <option selected value="{{ $student->grade_level_id }}">
                                    {{ $student->gradeLevel->grade_name }}</option>
                                @foreach ($gradeLevels as $gl)
                                    @if ($student->gradeLevel->grade_name != $gl->grade_name)
                                        <option value="{{ $gl->id }}">{{ $gl->grade_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer pb-0">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
