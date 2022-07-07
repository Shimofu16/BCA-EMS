<div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Grade Level</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="grade_name" class="text-dark text-black font-weight-bold">Grade name:</label>
                        <input class="form-control w-50" type="text" name="grade_name" id="grade_name"
                            placeholder="Ex. Grade - 5">
                    </div>
                    <div class="form-group">
                        <label for="grade_level" class="text-dark text-black font-weight-bold">Grade level:</label>
                        <input class="form-control w-50" type="text" name="grade_level" id="grade_level"
                            placeholder="Ex. 5">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
