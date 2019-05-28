<div class="form-group">
    {{ Form::label('attribute', null, ['class' => 'control-label']) }}
    <br/>
    <input type="hidden"  value="1" id="counthidden">
    @if(!empty($data['product']->product_attributes)))
    {{--{{dd($data['product']->product_attributes)}}--}}
    @foreach($data['product']->product_attributes as $attribute)
    <span>
                      <span>
                        {{ Form::hidden('attribute_id[]', $attribute->id) }}

                          {{--<input type="text" name="attribute_name[]" placeholder="Attribute Name"  class=" attribute name" required="" title="Enter attribute name" >--}}
                        {{--<input type="text" name="attribute_value[]" placeholder="Attribute value"  class=" attribute value" required="" title="Enter attribute value" >--}}
                          {{ Form::text('attribute_name[]', $attribute->name, (['placeholder'=>"Attribute Name",'title'=>'Enter attribute name'])) }}
                          {{ Form::text('attribute_value[]', $attribute->value, (['placeholder'=>"Attribute Value",'title'=>'Enter attribute name'])) }}

                      </span>
                        <br>
        @if($errors->has('attribute_name[]|attribute_value[]'))
            <label class="text text-danger"> {{$errors->first('attribute_name[]|attribute_value[]')}}</label>
        @endif
                        <hr/>
                    </span>
    @endforeach

@endif
        <span class="add_attribute clon-row">
                      <span class = "added ">
                        {{--<input type="text" name="attribute_name[]" placeholder="Attribute Name"  class=" attribute name" required="" title="Enter attribute name" >--}}
                          {{--<input type="text" name="attribute_value[]" placeholder="Attribute value"  class=" attribute value" required="" title="Enter attribute value" >--}}
                          {{ Form::text('attribute_name[]', null, (['placeholder'=>"Attribute Name",'title'=>'Enter attribute name'])) }}
                          {{ Form::text('attribute_value[]', null, (['placeholder'=>"Attribute Value",'title'=>'Enter attribute name'])) }}

                      </span>
                        <label class="more_attribute label label-success" id="buttonvalue">Add</label><br>
            @if($errors->has('attribute_name[]|attribute_value[]'))
                <label class="text text-danger"> {{$errors->first('attribute_name[]|attribute_value[]')}}</label>
            @endif
            <hr/>
                    </span>

</div>