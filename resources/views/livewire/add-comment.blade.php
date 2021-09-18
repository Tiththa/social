<div>
    <div class="form-group">
        <textarea
            wire:model.lazy="comment"
            id="comment"
            rows="5"
            class="form-control @error('comment') is-invalid @enderror"
            placeholder="Add a comment to tell what you think about.."
        ></textarea>
        @error('comment')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <button type="button" wire:click="addComment" class="btn btn-outline-dark mt-3">Add Comment</button>
    </div>
</div>
