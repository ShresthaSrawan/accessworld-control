<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::text('name', old('name'), ['class'=>'form-control', 'required']) !!}
                <label>Name</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::text('website', old('website'), ['class'=>'form-control', 'required', 'data-rule-url' => true]) !!}
                <label>Website</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        @if(isset($client) && $client->image)
                            <img src="{{ asset($client->image->path) }}" data-src="{{ asset($client->image->path) }}" class="preview" height="150" width="150">
                        @else
                            <img src="{{ asset(config('paths.placeholder.default')) }}" data-src="{{ asset(config('paths.placeholder.default')) }}" class="preview" height="150" width="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::file('image', ['class' => 'avatar-file', isset($client) ? '':'required', 'accept' => 'image/*', 'data-msg' => 'Please enter a value with a valid image. PNG, JPG or GIF']) !!}
                <label>Image</label>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
    </div>
</div>
