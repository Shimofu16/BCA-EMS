<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="user-name" class="text-dark text-black font-weight-bold">Name:</label>
                        <input class="form-control w-50" type="text" name="name" id="user-name"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control w-50" type="text" name="email" id="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-dark text-black font-weight-bold">Password:</label>
                        <input class="form-control w-50" type="text" name="password" id="password"
                            placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section:</label>
                        <select name="role_id" id="section" class="form-control w-50">
                           <option value="Registrar">Registrar</option>
                           <option value="Teacher">Teacher</option>
                           <option value="Student">Student</option>
                        </select>
                    </div>
                   {{--  <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> --}}
                    <button class="btn btn-primary" type="submit">Add Student</button>
                </form>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}

            </div>
        </div>
    </div>
</div>

