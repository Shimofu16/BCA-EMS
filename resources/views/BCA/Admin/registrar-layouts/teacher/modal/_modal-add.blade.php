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
                <form action="{{ route('registrar.teachers.store') }}" method="POST">
                    {{-- {{ route('add_teacher') }} --}}
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark text-black font-weight-bold">Name</label>
                        <input class="form-control w-75" type="text" name="name" id="name" placeholder="Name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Extname" class="text-dark text-black font-weight-bold">Gender</label>
                        <div>
                            @if (old('gender') == 'Male')
                                <label for="male" class="radio-inline"><input type="radio" name="gender" id="Gender"
                                        value="Male" checked value="{{ old('gender') }}">
                                    Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender" id="Gender"
                                        value="Female" value="{{ old('gender') }}">
                                    Female</label>
                            @elseif (old('gender') == 'Female')
                                <label for="male" class="radio-inline"><input type="radio" name="gender" id="Gender"
                                        value="Male" value="{{ old('gender') }}">
                                    Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender" id="Gender"
                                        checked value="Female" value="{{ old('gender') }}">
                                    Female</label>
                            @endif
                            <label for="male" class="radio-inline"><input type="radio" name="gender" id="male"
                                    value="Male" value="{{ old('gender') }}">
                                Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" id="female"
                                    value="Female" value="{{ old('gender') }}">
                                Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Age" class="text-dark text-black font-weight-bold">Age</label>
                        <input class="form-control w-25" type="number" name="age" id="Age" placeholder="Age"
                            value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <label for="contact" class="text-dark text-black font-weight-bold">Phone No</label>
                        <input class="form-control" type="tel" name="contact" id="contact" placeholder="Phone Number"
                            value="{{ old('contact') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark text-black font-weight-bold">Email</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email"
                            value="{{ old('email') }}">
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
