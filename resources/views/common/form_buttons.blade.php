<div class="form-group">
    <div class="col-md-3 pull-right">
        {{ Form::submit($model->id ? 'Update' : 'Create', [
                'id'=>'btnSubmit', 'class'=>'btn btn-primary waves-effect waves-light']) }}
        {{ Form::reset('Reset', ['class'=>'btn btn-warning waves-effect waves-light']) }}
    </div>
</div>