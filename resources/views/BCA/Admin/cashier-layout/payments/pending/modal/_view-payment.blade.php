<div class="modal fade" id="payment{{ $payment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">Payment</h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('cashier.payment.pending.update',$payment->id) }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="amount">Payment</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                      </div>
                    <div class="modal-footer pb-0">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" type="submit">Accept</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
