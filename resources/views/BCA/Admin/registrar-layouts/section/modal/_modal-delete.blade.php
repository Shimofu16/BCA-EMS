<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">WARNING</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($section->students->count() == 0)
                    <h5 class="text-center fw-bold">
                        Are you sure you want to delete {{ $section->section_name }}?
                    </h5>
                @else
                    <h5 class="text-start fw-bold">
                        {{ $section->section_name }} can't be removed. Because this section contains students
                    </h5>
                @endif
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('registrar.section.destroy', $section->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Yes</button>
                </form>

            </div>
        </div>
    </div>
</div>
