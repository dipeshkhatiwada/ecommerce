@extends('backend.layouts.app')
@section('css')
    <style>
        #tag_id{
            width: 100%;
        }
    </style>
    @endsection
@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data['page_title']}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>


{{--            @include('backend.includes.errors')--}}
                {!! Form::open(['route' => 'backend.product.store', 'method' => 'post','files'=>true]) !!}

                <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                        <li><a href="#images" data-toggle="tab">Images</a></li>
                        <li><a href="#tags" data-toggle="tab">Tags</a></li>
                        <li><a href="#attributes" data-toggle="tab">Attributes</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="basic">
                            @include('backend.products.partials.mainform')


                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="images">
                            <!-- The timeline -->
                            @include('backend.products.partials.imageform')

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="tags">
                            @include('backend.products.partials.tagform')

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="attributes">
                            @include('backend.products.partials.attributeform')

                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Create',['class'=>'btn btn-success']) !!}
                    </div>
                    <!-- /.box-footer-->
                {!! Form::close() !!}
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->

@endsection
@section('js')
    @include('backend.includes.slug')


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {


                $('#category_id').change(function () {
//                    alert('sa');
                    var category_id = $(this).val();
                    var url = "{{URL::route('backend.subcategory.getDataByCategory_id')}}";
//               alert(url);
                    $.ajax({
                        url:url,
                        data:{'category_id':category_id, '_token': $('meta[name="csrf_token"]').attr('content')},
                        method:'post',
                        success:function (resp) {
                        console.log(resp);
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append(resp);
                        }
                    });
                });

            // var count=0;
            $(document).on("click", ".add_more", function () {

                var c=$('#hiddencount').val();
                c= parseInt(c) +1;
                $('#hiddencount').val(c);
                var $clone = $('.cloned-row:eq(0)').clone(true);
                //alert("Clone number" + clone);

                $clone.find('.add_more').after("&nbsp;<label class='remove1 label label-danger' id='buttonless'>Remove</label>")
                $clone.attr('id', "added"+(++c));
                $(this).parents('.add_img').after($clone);
            });
            // removing cloned part
            $(document).on('click', ".remove1", function (){
                var len = $('.cloned-row').length;
                if(len=>1){
                    var qid=$(this).parents('.add_img').attr('id');//added+'n'
                    // var n='total'+(parseFloat(qid.substr(5))-1);
                    // alert(n);
                    $(this).parents('.add_img').remove();
                }
            });


            $(document).on("click", ".more_tag", function () {
                var c=$('#hiddencount_tag').val();
                c= parseInt(c) +1;
                $('#hiddencount_tag').val(c);
                var $clone = $('.cloned-rows:eq(0)').clone(true);
                //alert("Clone number" + clone);

                $clone.find('.more_tag').after("&nbsp;<label class='remove_tag1 label label-danger' id='buttonlesr'>Remove</label>")
                $clone.attr('id', "added"+(++c));
                $(this).parents('.add_tag').after($clone);
            });
            // removing cloned part
            $(document).on('click', ".remove_tag1", function (){
                var len = $('.cloned-row').length;
                if(len=>1){
                    var qid=$(this).parents('.add_tag').attr('id');//added+'n'
                    // var n='total'+(parseFloat(qid.substr(5))-1);
                    // alert(n);
                    $(this).parents('.add_tag').remove();
                }
            });

            $(document).on("click", ".more_attribute", function () {
                var c=$('#counthidden').val();
                c= parseInt(c) +1;
                $('#counthidden').val(c);
                var $clone = $('.clon-row:eq(0)').clone(true);
                //alert("Clone number" + clone);

                $clone.find('.more_attribute').after("&nbsp;<label class='remove_attribute1 label label-danger' id='buttonless'>Remove</label>")
                $clone.attr('id', "added"+(++c));
                $(this).parents('.add_attribute').after($clone);
            });
            // removing cloned part
            $(document).on('click', ".remove_attribute1", function (){
                var len = $('.clon-row').length;
                if(len=>1){
                    var qid=$(this).parents('.add_attribute').attr('id');//added+'n'
                    // var n='total'+(parseFloat(qid.substr(5))-1);
                    // alert(n);
                    $(this).parents('.add_attribute').remove();
                }
            });
                // select 2 work.........

            $('.js-example-basic-multiple').select2({
                placeholder: 'Select an option'
            });

        });
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()


        })
    </script>
@endsection