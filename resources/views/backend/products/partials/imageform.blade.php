<div class="form-group">
    {{ Form::label('tag', null, ['class' => 'control-label']) }}
    <br/>
    <input type="hidden"  value="1" id="hiddencount">
    <span class="add_img cloned-row">
          <span class = "subadd ">
                  {{ Form::file('file[]') }}

              {{--<input type="file" name="file[]" placeholder="Quantity"  class=" file" required="" title="Select Image" >--}}

          </span>
            <label class="add_more label label-success" id="buttonvalue">Add</label>
        <hr/>
    </span>

</div>

