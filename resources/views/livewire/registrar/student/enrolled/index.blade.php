<div>
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">Enrolled Students</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <button class="btn mr-2" wire:click='resetFilters'>
                    Reset Filters
                </button>
                <div class="dropdown mr-2">
                    <button class="btn btn-bca-outline" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Grade Level <i class="fa-solid fa-filter"></i>
                    </button>
                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                        @foreach ($gradeLevels as $gradeLevel)
                            <button type="button"
                                class="dropdown-item {{ $grade_name == $gradeLevel->grade_name ? 'active' : '' }}"
                                wire:click="filterByGradeLevel({{ $gradeLevel->id }})">{{ $gradeLevel->grade_name }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-bca-outline" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Section <i class="fa-solid fa-filter"></i>
                    </button>
                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                        @forelse ($sections as $section)
                            <button type="button"
                                class="dropdown-item {{ $section_name == $section->section_name ? 'active' : '' }}"
                                wire:click="filterBySection({{ $section->id }})">{{ $section->section_name }}
                            </button>
                        @empty
                            @foreach ($defaulSections as $section)
                                <button type="button"
                                    class="dropdown-item {{ $section_name == $section->section_name ? 'active' : '' }}"
                                    wire:click="filterBySection({{ $section->id }})">{{ $section->section_name }}
                                </button>
                            @endforeach
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($default)

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student LRN</th>
                                <th scope="col">Student Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Section</th>
                                <th scope="col">Year level</th>
                                <th scope="col" class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student_lrn }}</td>
                                    <td>{{ $student->student_id }}</td>
                                    <td>
                                        <div class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $student->first_name }}
                                                {{ $student->middle_name }},
                                                {{ $student->last_name }}
                                            </h5>
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $student->email }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->section->section_name }}</td>
                                    <td>{{ $student->gradeLevel->grade_name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary btn-sm mr-1"
                                                data-toggle="modal"
                                                data-target="#edit{{ $student->id }}">Edit</button>
                                            @include('BCA.Admin.registrar-layouts.students.enrolled.modal._modal-edit')
                                            <a href="{{ route('registrar.enrolled.show', $student->id) }}"
                                                class="btn btn-sm btn-outline-info">More Details</a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    @endif
    @if ($byGrade)
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student lrn</th>
                                <th scope="col">Student id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Section</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->student_lrn }}</td>
                                    <td>{{ $student->student_id }}</td>
                                    <td>
                                        <div class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $student->first_name }}
                                                {{ $student->middle_name }},
                                                {{ $student->last_name }}
                                            </h5>
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $student->email }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->section->section_name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary btn-sm mr-1"
                                                data-toggle="modal"
                                                data-target="#edit{{ $student->id }}">Edit</button>
                                            @include('BCA.Admin.registrar-layouts.students.enrolled.modal._modal-edit')
                                            <a href="{{ route('registrar.enrolled.show', $student->id) }}"
                                                class="btn btn-sm btn-outline-info">More Details</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd ">
                                    <td valign="top" colspan="7" class="text-center dataTables_empty">No data
                                        available
                                        in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($bySection)
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student lrn</th>
                                <th scope="col">Student id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Grade Level</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->student_lrn }}</td>
                                    <td>{{ $student->student_id }}</td>
                                    <td>
                                        <div class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $student->first_name }}
                                                {{ $student->middle_name }},
                                                {{ $student->last_name }}
                                            </h5>
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $student->email }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gradeLevel->grade_name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary btn-sm mr-1"
                                                data-toggle="modal"
                                                data-target="#edit{{ $student->id }}">Edit</button>
                                            @include('BCA.Admin.registrar-layouts.students.enrolled.modal._modal-edit')
                                            <a href="{{ route('registrar.enrolled.show', $student->id) }}"
                                                class="btn btn-sm btn-outline-info">More Details</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd ">
                                    <td valign="top" colspan="7" class="text-center dataTables_empty">No data
                                        available
                                        in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>


