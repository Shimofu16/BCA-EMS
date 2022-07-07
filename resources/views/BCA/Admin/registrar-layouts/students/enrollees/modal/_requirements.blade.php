<div wire:ignore.self class="modal fade" id="requirements" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Requirements</h5>
                <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="fileUpload" method="post" enctype="multipart/form-data" class="px-3">
                    @if ($student->student_type == 'Transferee' || $student->student_type == 'New Student')
                        <div class="form-row mb-2">
                            @if ($hasFilePsa == true)
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <h5><span class="text-dark text-black font-weight-bold">Birth Certificate:</span>
                                        Submitted
                                    </h5>
                                    @if ($psaFile)
                                        <a target="__blank" href="{{ asset($psaFile->filepath) }}"
                                            class="btn btn-primary ml-3">Preview</a>
                                    @else
                                        <a class="btn btn-primary ml-3">Not Available</a>
                                    @endif
                                </div>
                            @else
                                <h5 span class="text-dark text-black font-weight-bold  "> Birth Certificate:</h5>
                                <div class="custom-file d-flex mb-2">
                                    <input type="file" name="psa" id="psa" wire:model='psa'
                                        class="form-control @error('psa') is-invalid @enderror">
                                    @error('psa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    @endif
                    @if ($student->student_type == 'Transferee' || $student->student_type == 'Old Student')
                        <div class="form-row mb-2">
                            @if ($hasFileForm137 == true)
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <h5><span class="text-dark text-black text-center font-weight-bold">Form 138:</span>
                                        Submitted</h5>
                                    @if ($form137File)
                                        <a target="__blank" href="{{ asset($form137File->filepath) }}"
                                            class="btn btn-primary ml-3">Preview</a>
                                    @else
                                        <a class="btn btn-primary ml-3">Not Available</a>
                                    @endif
                                </div>
                            @else
                                @csrf
                                <h5 span class="text-dark text-black font-weight-bold  ">Form 138:</h5>
                                <div class="custom-file d-flex mb-2">
                                    <input type="file" name="form_137" wire:model='form_137' id="form_137"
                                        class="form-control @error('form_137') is-invalid @enderror">
                                    @error('form_137')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    @endif
                    @if ($student->student_type == 'Transferee')
                        <div class="form-row mb-2">
                            @if ($hasFileGoodMoral == true)
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <h5><span class="text-dark text-black font-weight-bold">Good Moral
                                            Certification:</span>
                                        Submitted</h5>
                                    @if ($goodMoral)
                                        <a target="__blank" href="{{ asset($goodMoral->filepath) }}"
                                            class="btn btn-primary ml-3">Preview</a>
                                    @else
                                        <a class="btn btn-primary ml-3">Not Available</a>
                                    @endif
                                </div>
                            @else
                                <h5 span class="text-dark text-black font-weight-bold  "> Good Moral Certification:</h5>
                                <div class="custom-file d-flex mb-2">
                                    <input type="file" name="good_moral" wire:model='good_moral' id="good_moral"
                                        class="form-control  @error('good_moral') is-invalid @enderror">
                                    @error('good_moral')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif

                        </div>
                    @endif
                    @if ($student->student_type == 'Transferee' || $student->student_type == 'New Student')
                        <div class="form-row mb-2">
                            @if ($hasFilePhoto == true)
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <h5 class="mb-0"><span class="text-dark text-black font-weight-bold ">1x1
                                            Photo:</span> Submitted</h5>
                                    @if ($studentPhoto)
                                        <a target="__blank" href="{{ asset($studentPhoto->filepath) }}"
                                            class="btn btn-primary ml-3">Preview</a>
                                    @else
                                        <a class="btn btn-primary ml-3">Not Available</a>
                                    @endif
                                </div>
                            @else
                                <h5 span class="text-dark text-black font-weight-bold  "> 1x1 Photo ID:</h5>
                                <div class="custom-file d-flex mb-2">
                                    <input type="file" name="photo" wire:model='photo' id="photo"
                                        class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="form-row mb-2">
                        <label for="promisory_note">
                            <input type="checkbox" name="promisory_note" wire:model='promisory_note' id="promisory_note"
                                disabled>
                            <span class="ml-2">Promissory Note</span>
                        </label>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($student->student_type == 'Transferee')
                        @if ($hasFilePsa == false || $hasFileForm137 == false || $hasFileGoodMoral == false || $hasFilePhoto == false)
                            <div class="modal-footer pb-0 mb-0 py-1">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                            </div>
                        @endif
                    @endif
                    @if ($student->student_type == 'New Student')
                        @if ($hasFilePsa == false || $hasFilePhoto == false)
                            <div class="modal-footer pb-0 mb-0 py-1">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                            </div>
                        @endif
                    @endif
                    @if ($student->student_type == 'Old Student')
                        @if ($hasFileForm137 == false)
                            <div class="modal-footer pb-0 mb-0 py-1">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                            </div>
                        @endif
                    @endif
                </form>

            </div>

        </div>
    </div>
</div>
