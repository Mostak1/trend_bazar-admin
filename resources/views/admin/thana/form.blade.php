        <div class="form-group">
            <label class="form-label">Board</label>
            <input class="form-control" type="text" value="{{ $board->name ?? '' }}" name="name" id="name">
        </div>
        <div class="form-group">
            <label class="form-label">Website</label>
            <input class="form-control" type="text" value="{{ $board->url ?? '' }}" name="url" id="url">
        </div>
